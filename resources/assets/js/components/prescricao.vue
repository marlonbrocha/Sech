<script language= "text/javascript">
    var array = new Array();
    var sub1 = new Array();
    var sub2 = new Array();
    var consequencia = new Array();
    var direita = new Array();
    var codigos = new Array();
    var posicoes = new Array();   
    var cids = new Array();   
    var classific, idinter = '', obj='', obj_paciente='', cid_all;
    export default{

        props: ['data', 'medico','medicamentosss','paciente_all','di','interacao_all'],

        data(){
            return {
                quantidadeEdit: '', 
                posologiaEdit: '', 
                intervalo_posologiaEdit: '', 
                nomeEdit: '',
                administracaoEdit: '', 
                diluicaoEdit: '', 
                obsEdit: '', 
                doseEdit: '', 
                cids: [],
                value: '', 
                paciente: '',
                diagInfe: '',
                prontuario: '',
                posologia:'',
                intervalo_posologia: 'Selecione...',
                obs:'',
                iniTrata:'',
                medInfe:'',
                duracao:'',
                meds: [],
                pacientes: [],
                prescricao: {
                    idinternacao: '',
                    dataprescricao: '',
                    historicoatual: '',
                    evolucao: '',
                    dataprescricao: '',
                    observacoesmedicas: '',
                    prescricaomedicamento: [],
                    relatorioAntimicro: [],
                    medicamentos_all: []
                },
            }
        },
        mounted(){            
            this.prescricao.dataprescricao = this.data;
            cid_all = JSON.parse(this.di);

            obj = jQuery.parseJSON(this.medicamentosss);
            obj_paciente = jQuery.parseJSON(this.paciente_all);

            console.log(cid_all);
        },
        methods: {
            addMed(){
                var administracao = $("#administracao").val();
                $('input[type=search]').val('').change();                
                if(classific == 9){
                    this.intervalo_posologia = '';
                    administracao = '';
                }    
                if(classific != 9){               
                    if($("#posologia").val() == ''){
                        swal({
                                title: "Campos vazios",
                                text: 'O campo quantidade é obrigatório', 
                                type: "warning",
                                html: true,
                            });  
                        return;
                    }

                    if($("#administracao").val() == 'Selecione...'){
                        swal({
                                title: "Campos vazios",
                                text: 'O campo via de administração é obrigatório', 
                                type: "warning",
                                html: true,
                            });  
                        return;
                    }

                    if($("#intervalo_posologia").val() == 'Selecione...'){
                        swal({
                                title: "Campos vazios",
                                text: 'O campo intervalo é obrigatório', 
                                type: "warning",
                                html: true,
                            });  
                        return;
                    }

                    if($("#obs").val() == ''){
                        swal({
                                title: "Campos vazios",
                                text: 'O campo tempo de tratamento é obrigatório', 
                                type: "warning",
                                html: true,
                            });  
                        return;
                    }
                }

                var med = $("#med").val();
                    if(med == ''){
                      swal({
                            title: "Campos vazios",
                            text: 'O campo medicamento é obrigatório', 
                            type: "warning",
                            html: true,
                        });  
                    }else{
                        
                        var cod = $("#codigo").val();
                        var i;
                        var j;
                        var verifica = false;
                        codigos.push(cod);

                        if(direita.length > 0){ //vefifica se ja tem interacaoes inseridas
                            for (i = 0; i < direita.length ; i++){ 
                                if(cod == direita[i].sub){  //comparação do codigo inserido com o vetor existente 
                                    for(j = 0; j < codigos.length ; j++){  
                                        if(direita[i].sub == codigos[j]){ //verifica se o codigo comparado ainda existe na lista de medicamentos prescritos                                  
                                            verifica = true;
                                        }
                                    }
                                    if(verifica == true && codigos.length > 1){
                                        let pos = posicoes[i].pos;
                                        swal({
                                            title: "Interação Medicamentosa",
                                            text: consequencia[pos], 
                                            type: "warning",
                                            html: true,
                                        });    
                                    }    
                                }
                            }
                        }                    

                        for (i = 0; i < sub1.length ; i++){
                            if(cod == sub1[i]){
                                direita.push({sub: sub2[i], id: cod});
                                posicoes.push({pos: i, id: cod});
                            }
                        }

                        for (i = 0; i < sub2.length ; i++){
                            if(cod == sub2[i]){
                                direita.push({sub: sub1[i], id: cod});
                                posicoes.push({pos: i, id: cod});
                            }
                        }               

                        var id = $("#idmed").val();
                    
                        var codigo = $("#codigo").val();
                        var simpas = $("#simpas").val();
                        var dose = $("#dose").val();
                        var estabilidade = $("#estabilidade").val();
                        var diluicao = $("#diluicao").val();
                        var qtd = $("#qtd").val();
                        

                        this.prescricao.relatorioAntimicro.push({  
                            idmedicamento: id,
                            medInfe: med,
                            duracao: this.duracao,
                            leito: document.getElementById("leito_a").value,
                            paciente: document.getElementById("nome_a").value,
                            dataadmissao: document.getElementById("admissao_a").value,
                            iniTrata: this.iniTrata,
                            clinica: document.getElementById("clinica_a").value,
                            diagInfe: this.diagInfe
                        });

                        this.duracao = '';
                        this.iniTrata = '';
                        this.diagInfe = '';
                        document.getElementById("medInfe").value = '';

                        this.prescricao.prescricaomedicamento.push({
                            codigo: codigo,
                            simpas: simpas,
                            idmedicamento: id,
                            qtd: qtd,
                            med: med,
                            obs: this.obs,
                            posologia: this.posologia,
                            intervalo_posologia: this.intervalo_posologia,
                            administracao: administracao,
                            dose: dose,
                            diluicao: diluicao,
                            estabilidade: estabilidade,
                            classificacao: classific
                        });

                        this.simpas = '-';
                        $("#med").val("");
                        $("#dose").val("");
                        $("#diluicao").val("");
                        $("#estabilidade").val("");
                        $("#administracao").val("Selecione...");
                        $("#qtd").val("");
                        $("#simpas").val("");
                        $("#codigo").val("");

                        if(classific != 9){
                           $.notify(
                              "Medicamento adicionado", 
                              { globalPosition:"top center",
                                className: 'success'}
                            );  
                        }else{
                            $.notify(
                              "Dieta adicionada", 
                              { globalPosition:"top center",
                                className: 'success'}
                            );  
                        }
                        
                        this.posologia = '';
                        this.obs = '';
                        this.intervalo_posologia = 'Selecione...';
                }
            },
            salvarAntimicrobiano(){
                if($("#medInfe").val() == ''){
                    $("#relatorio").modal('hide');
                    return;
                }

                if(this.diagInfe == '' ){
                    swal({
                        title: "Campos vazios",
                        text: 'O campo diagnóstico infeccioso é obrigatório', 
                        type: "warning",
                        html: true,
                    });
                }
                if(this.duracao == ''){
                    swal({
                        title: "Campos vazios",
                        text: 'O campo duração do tratamento é obrigatório', 
                        type: "warning",
                        html: true,
                    });
                }
                if(this.iniTrata == '' ){
                    swal({
                        title: "Campos vazios",
                        text: 'O campo início do tratamento é obrigatório', 
                        type: "warning",
                        html: true,
                    });
                }

                if(this.iniTrata != '' && this.duracao != '' && this.diagInfe != ''){
                    $("#relatorio").modal('hide');
                    $.notify(
                      "Relatório salvo", 
                      { globalPosition:"top center",
                        className: 'success'}
                    );
                }

            },
            removeMed(med) {
                    console.log(direita);
                    var index = this.prescricao.prescricaomedicamento.indexOf(med);
                    var i,j;
                    if(index > -1){
                        this.prescricao.prescricaomedicamento.splice(index, 1);                  
                        this.prescricao.relatorioAntimicro.splice(index, 1);              
                        
                        codigos.splice(index, 1);                             
                        
                        for (i = 0; i < direita.length ; i++){ 
                            if(med.codigo == direita[i].id){
                                direita.splice(i, 1);              
                            }
                        }

                        for (j = 0; j < posicoes.length ; j++){ 
                            if(med.codigo == posicoes[j].id){
                                posicoes.splice(j, 1);              
                            }
                        }
                    }
            },
            abreEditMed(med) {
                    var b = $("#teste").val();
        
                    var index = this.prescricao.prescricaomedicamento.indexOf(med)
          
                    if(index > -1){ 
                        this.ind = index;
                        this.quantidadeEdit = this.prescricao.prescricaomedicamento[index].qtd;    
                        this.posologiaEdit = this.prescricao.prescricaomedicamento[index].posologia;    
                        this.intervalo_posologiaEdit = this.prescricao.prescricaomedicamento[index].intervalo_posologia;    
                        this.nomeEdit = this.prescricao.prescricaomedicamento[index].med;    
                        this.administracaoEdit = this.prescricao.prescricaomedicamento[index].administracao;    
                        this.diluicaoEdit = this.prescricao.prescricaomedicamento[index].diluicao;    
                        this.obsEdit = this.prescricao.prescricaomedicamento[index].obs;    
                        this.doseEdit = this.prescricao.prescricaomedicamento[index].dose;    

                        $("#editmed").modal('show');
                    }
                },
                editMed() {
                    this.prescricao.prescricaomedicamento[this.ind].posologia = this.posologiaEdit;    
                    this.prescricao.prescricaomedicamento[this.ind].intervalo_posologia = this.intervalo_posologiaEdit;    
                    this.prescricao.prescricaomedicamento[this.ind].qtd = this.quantidadeEdit;    
                    this.nomeEdit = this.prescricao.prescricaomedicamento[this.ind].med;    
                    this.prescricao.prescricaomedicamento[this.ind].administracao = this.administracaoEdit;
                    this.prescricao.prescricaomedicamento[this.ind].diluicao = this.diluicaoEdit;    
                    this.prescricao.prescricaomedicamento[this.ind].obs = this.obsEdit;    
                    this.prescricao.prescricaomedicamento[this.ind].dose = this.doseEdit;

                    $.notify(
                      "Alteração realizada com sucesso!", 
                      { globalPosition:"top center",
                        className: 'success'}
                    );     
                },
            adicionar(){
                if($("#nome").val() == ''){
                    swal({
                            title: "Campos vazios",
                            text: 'Selecione um paciente', 
                            type: "warning",
                            html: true,
                        });  
                    return;
                }
                document.getElementById('salvar').setAttribute('disabled',"true");
                this.prescricao.idinternacao = idinter;
                this.$http.post('/prescricao/create', this.prescricao).then(response => {
                    swal({
                        title: "Salvo!",
                        text: "Prescrição cadastrada com sucesso!",
                        confirmButtonColor: "#66BB6A",
                        type: "success",
                        showLoaderOnConfirm: true
                   },
                   function(){
                        location.href = "../../prescricao";
                   }); 
                }).catch(response => {
                    document.getElementById('salvar').removeAttribute('disabled');
                    swal({
                        title: "Ocorreu algum problema!",
                        text: "Verifique todos os campos e tente novamente",
                        confirmButtonColor: "#66BB6A",
                        type: "warning",
                        showLoaderOnConfirm: true
                   });
                });
            },
            add_cids(){
                this.cids = cids;
                
            },
            disable(){
                document.getElementById('med').removeAttribute('readonly');
                document.getElementById("med").value = '';
                document.getElementById("codigo").value = '';
                document.getElementById("idmed").value = '';
                document.getElementById("doseR").value = '';
                document.getElementById("diluicaoR").value = '';
                document.getElementById("administracaoR").value = '';
                document.getElementById("estabilidadeR").value = '';
            },
            buscarprontuario(){
                var prontuario = $("#prontuario").val();
                this.$http.post('../buscapaciente', {prontuario: prontuario}).then(response => {
                    $("#buscar").modal('hide')
                  document.getElementById("nome").value =  response.data[0].value;
                  document.getElementById("clinica").value =  response.data[0].clinica;
                  document.getElementById("numeroprontuario").value =  response.data[0].numeroprontuario;
                  document.getElementById("leito").value =  response.data[0].leito;
                  let data;
                  data = response.data[0].dataadmissao.replace(/(\d{4})\-(\d{2})\-(\d{2}).*/, '$3-$2-$1');
                  document.getElementById("admissao").value =  data;
                  document.getElementById("clinica_a").value =  response.data[0].clinica;
                  document.getElementById("nome_a").value =  response.data[0].value;
                  document.getElementById("leito_a").value =  response.data[0].leito;
                  document.getElementById("alergia").value =  response.data[0].alergia;

                  let data2;
                  data2 = response.data[0].dataadmissao.replace(/(\d{4})\-(\d{2})\-(\d{2}).*/, '$3-$2-$1');
                  $("#admissao_a").val(data2);

                    idinter = response.data[0].id; 
                    var i;

                    cids = [];
                    for (i = 0; i < cid_all.length ; i++){
                        if(cid_all[i].id == idinter){
                            cids.push(cid_all[i].descricao);
                        }    
                    } 

                    $.notify(
                      "Paciente selecionado", 
                      { globalPosition:"top center",
                        className: 'info'}
                    );  
          
                }).catch(response => {
                   console.log(response);
                     $("#buscar").modal('hide')
                    swal({
                        title: "Erro!",
                        text: "Não existe esse registro na base de dados",
                        type: "error"
                   });
                });
            }

        },
        beforeMount(){

	            var aux = new Array();
            	var aux = jQuery.parseJSON(this.interacao_all);
            	var i;
	            
	            for (i = 0; i < aux.length ; i++){
	            	sub1.push(aux[i].idsubstanciaativa1);
                    sub2.push(aux[i].idsubstanciaativa2);
                    consequencia.push(aux[i].consequencia);
	            }	      
	   }
    }

    $(function ($) {
        $("#table").on("click", "td", function() {
            var p =  $( this ).text();
            var i;
            
            for (i = 0; i < obj_paciente.length ; i++){
                if(p == obj_paciente[i].nomecompleto){

                    $.notify(
                      "Paciente selecionado", 
                      { globalPosition:"top center",
                        className: 'info'}
                    );

                    document.getElementById("nome_a").value =  obj_paciente[i].nomecompleto;
                    document.getElementById("nome").value =  obj_paciente[i].nomecompleto;
                    document.getElementById("clinica").value =  obj_paciente[i].nome;
                    document.getElementById("numeroprontuario").value =  obj_paciente[i].numeroprontuario;
                    document.getElementById("leito").value =  obj_paciente[i].leito;
                    document.getElementById("clinica_a").value =  obj_paciente[i].nome;
                    document.getElementById("leito_a").value =  obj_paciente[i].leito;
                    document.getElementById("alergia").value =  obj_paciente[i].alergia;
                      
                    var data;
                    data = obj_paciente[i].dataadmissao.replace(/(\d{4})\-(\d{2})\-(\d{2}).*/, '$3-$2-$1');
                    document.getElementById("admissao").value =  data;
                    
                    var data2;
                    data2 = obj_paciente[i].dataadmissao.replace(/(\d{4})\-(\d{2})\-(\d{2}).*/, '$3-$2-$1');
                    $("#admissao_a").val(data2);
                    console.log(obj_paciente[i].id);
                    idinter = obj_paciente[i].id; 

                    var i;

                    cids = [];
                    for (i = 0; i < cid_all.length ; i++){
                        if(cid_all[i].id == idinter){
                            cids.push(cid_all[i].descricao);
                        }    
                    }    
                }
            }
        });
    });

    $(function ($) {
        $("#table2").on("click", "td", function() {
            var m =  $( this ).text();
            
            var i;
            for (i = 0; i < obj.length ; i++){
                if(m == obj[i].value){

               if(obj[i].classificacao != 9){
                   $.notify(
                      "Medicamento selecionado", 
                      { globalPosition:"top center",
                        className: 'info'}
                    );  
               }else{
                    $.notify(
                      "Dieta selecionado", 
                      { globalPosition:"top center",
                        className: 'info'}
                    );  
                }


                document.getElementById('med').setAttribute('readonly',true);
                document.getElementById("med").value = obj[i].value;
                document.getElementById("codigo").value = obj[i].codigo;
                document.getElementById("simpas").value = obj[i].simpas;
                document.getElementById("idmed").value = obj[i].id;
                document.getElementById("doseR").value = obj[i].dose;
                document.getElementById("diluicaoR").value = diluicao;
                document.getElementById("administracaoR").value = obj[i].administracao;
                document.getElementById("estabilidadeR").value = obj[i].estabilidade;

                var medic = obj[i].value;
                
                if(obj[i].classificacao == 2){
                    classific = obj[i].classificacao;
                    $(document).ready(function() {
                        $("#relatorio").modal('show');
                        $("#medInfe").val(medic); // pega o nome do medicamento
                    });
                }else{
                    $("#medInfe").val('');
                    classific = obj[i].classificacao;
                }

                if(obj[i].classificacao != 9){
                    $.ajax({
                        type: 'get',
                        url: '../../../medicamento/contraindicacao',
                        data: {
                            'id': obj[i].id,
                        },
                        success: function (data){
                            if(data != ''){
                            swal({ 
                                title: "Contraindicação",
                                text: data, 
                                type: "warning",
                                html: true,
                            });
                        }
                        },
                    });
                }

                }
            }

        });
    });
    
    jQuery(function ($) {
        $("#rg").mask("99.999.999-99");
    });

    function Trim(str){
        return str.replace(/^\s+|\s+$/g,"");
    }

    $(document).on('click', '.buscar', function (){
        $("#buscar").modal('show');
    });

    $(document).on('click', '.relatorio', function (){
        $("#relatorio").modal('show');
    });
				
    $(document).on('click', '.diluicaoM', function (){
        $("#diluicaoM").modal('show');
    });

    $(document).on('click', '.doseM', function (){
        $("#doseM").modal('show');
    });

    $(document).on('click', '.administracaoM', function (){
        $("#administracaoM").modal('show');
    });

    $(document).on('click', '.estabilidadeM', function (){
        $("#estabilidadeM").modal('show');
    });
    $(document).on('click', '.diagnostico', function (){
        $("#diagnostico").modal('show');
    });

    $(document).on('click', '.editmed', function (){
        $("#editmed").modal('show');
    });

</script>

<template>
    <div>
        <div class="row">         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="box-body pad table-responsive">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="pull-left"><small><strong>Médico: </strong>{{this.medico}}</small></div> 
                        <div class="pull-right"><small><strong>Data da prescrição: </strong>{{this.data}}</small></div>
                        <br><br>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="paciente">Paciente:</label>
                            <div class="input-group input-group-sm">
                                <input readonly="" id="nome" type="text" name="nome" class="form-control">
                                
                                <span class="input-group-btn">
                                  <button type="button" data-toggle="tooltip" title="Buscar paciente por prontuário" class="btn btn-primary btn-flat buscar"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 ">
                        <div class="form-group">
                            <div class="table-responsive col-md-12" style="margin-bottom: 20px;border-style: solid;border-color: #d2d6de;border-width: 1px;padding: 2;overflow-x: hidden;">
                                        <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                                <tr>
                                                    <th>Pacientes internados</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <tr class="selecionar">
                                <td></td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="numeroprontuario">Nº Prontuário:</label>
                            <input id="numeroprontuario" type="text" name="numeroprontuario" class="form-control" readonly="readonly">
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="clinica">Clínica:</label>
                            <input id="clinica" type="text" name="clinica" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="leito">Leito:</label>
                            <input id="leito" type="text" name="leito" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="diag">Diagnóstico:</label>
                            <br>
                            <button style="font-size: 20px" type="button" data-toggle="tooltip" title="Diagnóstico" class="btn btn-primary diagnostico" @click="add_cids()"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="admissao">Data de admissão:</label>
                            <input id="admissao" type="text" name="admissao" class="form-control" readonly="readonly" >
                        </div>
                    </div>
                    
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="evol">Alergia(s):</label>
                            <textarea readonly="" id="alergia" type="text" name="alergia" class="form-control" rows="1" ></textarea>
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="evol">Evolução:</label>
                            <input id="evol" type="text" name="evol" class="form-control" v-model="prescricao.evolucao">
                        </div>
                    </div>                    

                    <div class="col-xs-10 col-sm-10 col-md-10 ">
                        <div class="form-group">
                            <label for="med">Medicamento/Outros:</label>
                            <div class="input-group input-group-sm">
                            <input id="med" readonly="" type="text" name="med" class="form-control">
                            <span class="input-group-btn">
                                  <button title="Prescrever um medicamento"  @click="disable()" type="button" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-2 col-sm-2 col-md-2" >
                        <div class="form-group">
                            <label for="qtd">Quantidade/dia:</label>
                            <input id="qtd" type="number" min="1" name="qtd" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="form-group">
                            <div class="table-responsive col-md-12" style="margin-bottom: 20px;border-style: solid;border-color: #d2d6de;border-width: 1px;padding: 2;overflow-x: hidden;">
                                        <table id="table2" class="table table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                                <tr>
                                                    <th>Medicamentos/dietas</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <tr class="selecionar">
                                <td></td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="dose">Dose por administração: 
                            	<button style="font-size: 6px" type="button" data-toggle="tooltip" title="Dose" class="btn btn-primary doseM"><i class="fa fa-search"></i></button></label>
                            <input id="dose" type="text" name="dose" class="form-control form-control-danger">
                        </div>
                    </div>
                    
                    <input id="idmed" type="hidden">
                    <input id="codigo" type="hidden">
                    <input id="simpas" type="hidden">

                    <div class="col-xs-3 col-sm-3 col-md-3 ">
                        <div class="form-group">
                            <label for="administracao">Via de Administração:
                            	<button style="font-size: 6px" type="button" data-toggle="tooltip" title="Administração" class="btn btn-primary administracaoM"><i class="fa fa-search"></i></button></label>
                            <select id="administracao" name="administracao" class="form-control">
                                <option>Selecione...</option>
                                <option>Endovenosa</option>
                                <option>Intramuscular</option>
                                <option>Oral</option>
                                <option>Tópico</option>
                                <option>Ocular</option>
                                <option>Nasal</option>
                                <option>Retal</option>
                                <option>Intravaginal</option>
                                <option>Sublingual</option>
                                <option>Otológica</option>
                            </select>                            
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3 ">
                        <div class="form-group">
                            <label for="estabilidade">Estabilidade:
                                <button style="font-size: 6px" type="button" data-toggle="tooltip" title="Estabilidade" class="btn btn-primary estabilidadeM"><i class="fa fa-search"></i></button></label>
                            <input id="estabilidade" type="text" name="estabilidade" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="obs">Tempo de Tratamento:</label>
                            <input id="obs" type="text" name="obs" class="form-control" v-model="obs" placeholder="">
                        </div>
                    </div>

                    

                    

                    <div class="col-xs-6 col-sm-6 col-md-6 ">
                        <div class="form-group">
                            <label for="diluicao">Diluição/Obervação:
                                <button style="font-size: 6px" type="button" data-toggle="tooltip" title="Diluição" class="btn btn-primary diluicaoM"><i class="fa fa-search"></i></button></label>
                            <input id="diluicao" type="text" name="diluicao" class="form-control">
                        </div>
                    </div>

                    <div class="col-md-2" style="margin-top: 18px; margin-right: -70px;  ">
                        <label>Intervalo de administração:</label>
                    </div>
                        <div class="col-xs-2 col-sm-2 col-md-2" style="">
                            <label for="posologia">Quantidade:</label>
                            <div class="form-group">
                                <input id="posologia" type="number" min="1" name="posologia" class="form-control" v-model ="posologia" placeholder="" style="width:128px;">
                            </div>
                        </div>
                        <div class="col-xs-2 col-sm-2 col-md-2">
                            <label for="posologia" style="margin-left: -15px">Intervalo:</label>
                            <div class="form-group">
                            <select id="intervalo_posologia" name="intervalo_posologia" v-model="intervalo_posologia" class="form-control" style="width:230px; margin-left: -15px">
                                <option>Selecione...</option>
                                <option>Minutos</option>
                                <option>Horas</option>
                                <option>Dias</option>
                                <option>Semanas</option>
                            </select>                            
                            </div>
                        </div>
                    

                    <div class="row" style="margin-left: 65%;">
                        <div class="col-sm-12 text-center"> 
                            <button data-toggle="tooltip" style="display: inline-block; vertical-align: top;" type="button" class="btn btn-primary btn-md center-block relatorio">Relatório Antibioticoterapia</button>
                            <button id="adicionar" style="display: inline-block; vertical-align: top;" type="button" class="btn btn-primary btn-md center-block" @click="addMed">Adicionar</button>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <br>
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <h4><center><b>Descrição da prescrição</b></center></h4>
                                <div class="box-body">
                                    <div class="table-responsive col-md-12">
                                        <table class="table table-condensed table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">SIMPAS</th>
                                                    <th width="2%" class="text-center">Qtd/dia</th>
                                                    <th class="text-center">Medicamento</th>
                                                    <th class="text-center">Qtd</th>
                                                    <th class="text-center">Intervalo</th>
                                                    <th class="text-center">Tempo de Tratamento</th>
                                                    <th class="text-center">Dose</th>
                                                    <th class="text-center">Via de Administração</th>
                                                    <th class="text-center">Diluição/obs</th>
                                                    <th width="3%" class="text-center">Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="medicamento in prescricao.prescricaomedicamento">
                                                    <td>{{medicamento.simpas}}</td>
                                                    <td>{{medicamento.qtd}}</td>
                                                    <td>{{medicamento.med}}</td>
                                                    <td>{{medicamento.posologia}}</td>
                                                    <td>{{medicamento.intervalo_posologia}}</td>
                                                    <td>{{medicamento.obs}}</td>
                                                    <td>{{medicamento.dose}}</td>
                                                    <td>{{medicamento.administracao}}</td>
                                                    <td>{{medicamento.diluicao}}</td>
                                                    
                                                    <td width="14.5%">             
                                                        <a class="btn btn-default"  @click="removeMed(medicamento)"><i class="fa fa-trash"></i></a>
                                                        <a class="btn btn-default"  @click="abreEditMed(medicamento)"><i class="fa fa-pencil"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div> 
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="obsmed">Observações médicas:</label>
                            <textarea id="obsmed" type="text" name="obsmed" class="form-control" rows="5" v-model="prescricao.observacoesmedicas"></textarea>
                        </div>
                    </div>
                    <div class="pull-right" style="margin-right: 1%;">
                        <button id="salvar" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Salvar" @click="adicionar">Salvar prescrição</i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="buscar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Buscar paciente</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <div class="form-group">
                                            <label for="paciente">Prontuário:</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="prontuario" id="prontuario" class="form-control" v-model="prontuario">
                                                
                                                <span class="input-group-btn">
                                                  <button type="submit" class="btn btn-primary" @click="buscarprontuario" data-toggle="tooltip" title="Digite o prontuário do paciente" class="btn btn-primary btn-flat buscar"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="editmed" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Editar Medicamento</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">

                                 <div class="col-xs-10 col-sm-10 col-md-10">
                                    <div class="form-group">
                                        <label for="medicamento">Medicamento:</label>
                                        <input id="nomeEdit" v-model="nomeEdit" type="text" name="nomeEdit" class="form-control" readonly="" >
                                     </div>
                                 </div>

                                 <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label>Qtd/dia:</label>
                                        <input id="quantidadeEdit" v-model="quantidadeEdit" type="text" name="quantidadeEdit" class="form-control" >
                                     </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label>Quantidade:</label>
                                        <input id="posologiaEdit" v-model="posologiaEdit" type="text" name="posologiaEdit" class="form-control" >
                                     </div>
                                 </div>
                                 <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="medicamento">Intervalo:</label>
                                        <input id="intervalo_posologiaEdit" v-model="intervalo_posologiaEdit" type="text" name="intervalo_posologiaEdit" class="form-control" >
                                     </div>
                                 </div>
                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="medicamento">Tempo de Tratamento:</label>
                                        <input id="obsEdit" v-model="obsEdit" type="text" name="obsEdit" class="form-control" >
                                     </div>
                                 </div>
                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="medicamento">Dose:</label>
                                        <input id="doseEdit" v-model="doseEdit" type="text" name="doseEdit" class="form-control" >
                                     </div>
                                 </div>
                                 <div class="col-xs-3 col-sm-3 col-md-3 3">
                                    <div class="form-group">
                                        <label for="medicamento">Via de administração:</label>
                                        <input id="administracaoEdit" v-model="administracaoEdit" type="text" name="administracaoEdit" class="form-control" >
                                     </div>
                                 </div>
                                 <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="medicamento">Diluição/observação:</label>
                                        <input id="diluicaoEdit" v-model="diluicaoEdit" type="text" name="diluicaoEdit" class="form-control" >
                                     </div>
                                 </div>
                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="button" @click="editMed()"  class="btn btn-primary" data-dismiss="modal">Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="relatorio" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Relatório</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">

                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <label for="paciente">PACIENTE:</label>
                                        <input id="nome_a"  type="text" name="nome_a" class="form-control"  readonly="">
                                     </div>
                                 </div>

                                 <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label for="leito">LEITO:</label>
                                        <input id="leito_a" type="text" name="leito_a" class="form-control" readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="admissao">DATA DE ADMISSÃO:</label>
                                        <input id="admissao_a" type="text" name="admissao_a" class="form-control" readonly="readonly">
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="iniTrata">INÍCIO DO TRATAMENTO:</label>
                                        <input id="iniTrata" type="date" name="iniTrata" class="form-control" v-model="iniTrata">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="clinica">CLÍNICA:</label>
                                        <input id="clinica_a" type="text" name="clinica_a" class="form-control" readonly="readonly">
                                    </div>  
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="duracao">DURAÇÃO DO TRATAMENTO - DIA(S):</label>
                                        <input id="duracao" type="number" min="1" name="duracao" class="form-control" v-model="duracao">
                                     </div>
                                 </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <label for="diagInfe">DIAGNÓSTICO INFECCIOSO:</label>
                                        <input id="diagInfe" type="text" name="diagInfe" class="form-control" v-model="diagInfe">
                                     </div>
                                 </div>

                                 <div class="col-xs-12 col-sm-12 col-md-12 med">
                                    <div class="form-group">
                                        <label for="medInfe">IDENTIFICAÇÃO DO ANTIMICROBIANO:</label>
                                        <input id="medInfe" type="text" name="medInfe" class="form-control" readonly="" >
                                    </div>
                                </div>

                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" @click="salvarAntimicrobiano()" >Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="diagnostico" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Diagnóstico</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <p v-for="cid in cids">
                                            {{cid}}
                                        </p>
                                        
                                     </div>
                                 </div>
                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="doseM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Dose</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <textarea id="doseR" name="doseR" type="text" class="form-control" rows="8"></textarea>
                                        
                                     </div>
                                 </div>
                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

         <div class="modal fade" id="administracaoM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Administração</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <textarea id="administracaoR" name="administracaoR" type="text" class="form-control" rows="8"></textarea>
                                        
                                     </div>
                                 </div>
                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="estabilidadeM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Estabilidade</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <textarea id="estabilidadeR" name="estabilidadeR" type="text" class="form-control" rows="8"></textarea>
                                        
                                     </div>
                                 </div>
                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="diluicaoM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Diluição</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                 <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <textarea id="diluicaoR" name="diluicaoR" type="text" class="form-control" rows="8"></textarea>
                                        
                                     </div>
                                 </div>
                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>


    </div>
</template>

<style scoped=""></style>
