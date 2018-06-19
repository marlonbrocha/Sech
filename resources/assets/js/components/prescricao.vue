<script language= "text/javascript">
    var array = new Array();
    var sub1 = new Array();
    var sub2 = new Array();
    var consequencia = new Array();
    var classific;
    var direita = new Array();
    var codigos = new Array();
    var posicoes = new Array();   
    var idinter = '';
    export default{

        props: ['data', 'medico','medicamentosss'],

        data(){
            return { 
                value: '', 
                paciente: '',
                quantidade:'',
                diagInfe: '',
                prontuario: '',
                posologia:'',
                obs:'',
                iniTrata:'',
                medInfe:'',
                duracao:'',
                meds: [],
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
        },
        methods: {
            addMed(){

                if(classific == 2 && this.iniTrata == '' || classific == 2 && this.diagInfe == '' 
                    || classific ==  2 && this.duracao == '' || classific == 2 && this.quantidade == ''
                    ){
                        swal({
                            title: "Campos vazios",
                            text: 'Preencha todos os campos do relatório antimicrobiano', 
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
                            if(cod == direita[i]){  //comparação do codigo inserido com o vetor existente 
                                for(j = 0; j < codigos.length ; j++){  
                                    if(direita[i] == codigos[j]){ //verifica se o codigo comparado ainda existe na lista de medicamentos prescritos                                  
                                        verifica = true;
                                    }
                                }
                                if(verifica == true && codigos.length > 1){
                                    let pos = posicoes[i];
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
                            direita.push(sub2[i]);
                            posicoes.push(i);
                        }
                    }

                    for (i = 0; i < sub2.length ; i++){
                        if(cod == sub2[i]){
                            direita.push(sub1[i]);
                            posicoes.push(i);
                        }
                    }               

                var id = $("#idmed").val();
                
                this.$http.post('../simpas', {id: id}).then(response => {
                    var codigo = $("#codigo").val();
                    var med = $("#med").val();
                    var dose = $("#dose").val();
                    var administracao = $("#administracao").val();
                    var estabilidade = $("#estabilidade").val();
                    var diluicao = $("#diluicao").val();
                    var qtd = $("#qtd").val();
                    

                    this.prescricao.relatorioAntimicro.push({  
                        idmedicamento: id,
                        medInfe: med,
                        duracao: this.duracao,
                        quantidade: this.quantidade,
                        leito: document.getElementById("leito_a").value,
                        paciente: document.getElementById("nome_a").value,
                        dataadmissao: document.getElementById("admissao_a").value,
                        iniTrata: this.iniTrata,
                        clinica: document.getElementById("clinica_a").value,
                        diagInfe: this.diagInfe
                    });

                    this.prescricao.prescricaomedicamento.push({
                        codigo: codigo,
                        simpas: response.data,
                        idmedicamento: id,
                        qtd: qtd,
                        med: med,
                        obs: this.obs,
                        posologia: this.posologia,
                        administracao: administracao,
                        dose: dose,
                        diluicao: diluicao,
                        estabilidade: estabilidade,
                        classificacao: classific
                    });

                    this.simpas = '-';
                    $("#med").val("");
                    $('.med').removeClass("col-xs-11 col-sm-11 col-md-11");
                    $('.med').addClass("col-xs-12 col-sm-12 col-md-12");
                    }).catch(response => {
                         console.log('erro');
                    });
                }
            },
            removeMed(med) {
                var index = this.prescricao.prescricaomedicamento.indexOf(med)
                if(index > -1){
                    codigos.splice(index,1);
                    this.prescricao.prescricaomedicamento.splice(index, 1);                  
                    this.prescricao.relatorioAntimicro.splice(index, 1);              
                }
            },
            adicionar_medicamento(med){
                var index = this.meds.indexOf(med);
                document.getElementById("med").value = this.meds[index].value;
                document.getElementById("codigo").value = this.meds[index].codigo;
                document.getElementById("idmed").value = this.meds[index].id;
                document.getElementById("doseR").value = this.meds[index].dose;
                document.getElementById("diluicaoR").value = this.meds[index].diluicaoR;
                document.getElementById("administracaoR").value = this.meds[index].administracaoR;
                document.getElementById("estabilidadeR").value = this.meds[index].estabilidadeR;
                document.getElementById("med").value = this.meds[index].value;

                var medic = this.meds[index].value;
                
                if(this.meds[index].classificacao == 2){
                    classific = this.meds[index].classificacao;
                    $(document).ready(function() {
                        $("#relatorio").modal('show');
                        $("#medInfe").val(medic); // pega o nome do medicamento
                    });
                }else{
                    classific = 7;
                }

                $.ajax({
                    type: 'get',
                    url: '../../../medicamento/contraindicacao',
                    data: {
                        'id': this.meds[index].id,
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
                
            },
            adicionar(){
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
                    console.log('Erro:' + response);
                });
            },
            buscarnome(){
                var nome = $("#nome").val();
                this.$http.post('../buscapaciente', {nome: nome}).then(response => {
                   
                    $("#buscar").modal('hide')
                    this.paciente = response.data[0].nomecompleto;  
                    this.clinica = response.data[0].nome;
                    this.numeroprontuario = response.data[0].numeroprontuario;
                    this.leito = response.data[0].leito;
                    this.diag = response.data[0].descricao;
                    this.admissao = response.data[0].dataadmissao;
                    this.prescricao.idinternacao = response.data[0].id; 
          
                }).catch(response => {
                   console.log(response);
                     $("#buscar").modal('hide')
                    swal({
                        title: "Erro!",
                        text: "Não existe esse registro na base de dados",
                        type: "error"
                   });
                });
            },

            buscarprontuario(){
                var prontuario = $("#prontuario").val();
                this.$http.post('../buscapaciente', {prontuario: prontuario}).then(response => {
                    $("#buscar").modal('hide')

                  document.getElementById("nome").value =  response.data[0].value;
                  document.getElementById("clinica").value =  response.data[0].clinica;
                  document.getElementById("numeroprontuario").value =  response.data[0].numeroprontuario;
                  document.getElementById("leito").value =  response.data[0].leito;
                  document.getElementById("diag").value =  response.data[0].descricao;
                  document.getElementById("admissao").value =  response.data[0].dataadmissao;

                  document.getElementById("clinica_a").value =  response.data[0].clinica;
                  document.getElementById("nome_a").value =  response.data[0].value;
                  document.getElementById("leito_a").value =  response.data[0].leito;
                  document.getElementById("admissao_a").value =  response.data[0].dataadmissao;

                    idinter = response.data[0].id; 
          
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
                var all_medicamentos = new Array();

                var i;
                var obj = jQuery.parseJSON(this.medicamentosss);
                console.log( obj);
                
                for (i = 0; i < obj.length ; i++){
                    this.meds.push(obj[i]);
                }

	            var aux = new Array();

                this.$http.get('/prescricao/interacoesmedicamentosas').then(response => {
	                  
                	aux = response.data;

                	var i;
	            
	            for (i = 0; i < aux.length ; i++){
	            	sub1.push(aux[i].idsubstanciaativa1);
	            }

	            for (i = 0; i < aux.length ; i++){
	            	sub2.push(aux[i].idsubstanciaativa2);
	            }

	            for (i = 0; i < aux.length ; i++){
	            	consequencia.push(aux[i].consequencia);
	            }

	      		}).catch(response => {
	                   console.log(response);
	                    swal({
	                        title: "Erro!",
	                        text: "Não existem interações na base de dados",
	                        type: "error"
	                   });
	            });

	   }
    }

    
    jQuery(function ($) {
        $("#rg").mask("99.999.999-99");
    });
    


    $(document).ready(function(){
        var a;
        $('#nome').autocomplete({
            source: '/autocomplete2',
            minlength: 1,
            autoFocus:true,
            select: function(event, ui){
                $("#clinica").val(ui.item.clinica);
                $("#numeroprontuario").val(ui.item.numeroprontuario);
                $("#leito").val(ui.item.leito);
                $("#diag").val(ui.item.descricao);
                $("#admissao").val(ui.item.dataadmissao);

                $("#clinica_a").val(ui.item.clinica);
                $("#nome_a").val(ui.item.value);
                $("#leito_a").val(ui.item.leito);
                $("#admissao_a").val(ui.item.dataadmissao);

                idinter = ui.item.id; 
                //$("#nome").val(ui.item.value);
                $('.nome').removeClass("col-xs-12 col-sm-12 col-md-12");
                $('.nome').addClass("col-xs-11 col-sm-11 col-md-11");
            },
            change: function(event, ui){   
                    $('.nome').removeClass("col-xs-11 col-sm-11 col-md-11");
                    $('.nome').addClass("col-xs-12 col-sm-12 col-md-12");
            }
        });
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
                    <div class="col-xs-10 col-sm-10 col-md-10">
                        <div class="form-group">
                            <label for="paciente">Paciente:</label>
                            <div class="input-group input-group-sm">
                                <input id="nome" type="text" name="nome" class="form-control">
                                
                                <span class="input-group-btn">
                                  <button type="button" data-toggle="tooltip" title="Buscar paciente por prontuário" class="btn btn-primary btn-flat buscar"><i class="fa fa-search"></i></button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="numeroprontuario">Nº Prontuário:</label>
                            <input id="numeroprontuario" type="text" name="numeroprontuario" class="form-control" readonly="readonly">
                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-5 col-md-5">
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
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label for="diag">Diagnóstico:</label>
                            <input id="diag" type="text" name="diag" class="form-control" readonly="readonly">
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
                            <label for="evol">Evolução:</label>
                            <textarea id="evol" type="text" name="evol" class="form-control" v-model="prescricao.evolucao"></textarea>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="med">Medicamento/Outros:</label>
                            <input id="med" type="text" name="med" class="form-control" placeholder="Pesquise pela substância ativa..." >
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="form-group">
                            <div class="table-responsive col-md-12" style="margin-bottom: 20px;border-style: solid;border-color: #d2d6de;border-width: 1px;padding: 2;overflow-x: hidden;">
                                        <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                                <tr>
                                                    <th>Medicamentos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                            <tr v-for="med in meds">
                                <td><a href="#!" @click="adicionar_medicamento(med)">{{ med.value }}</a></td>
                            </tr>
                        </tbody>
                        </table>
                        </div>
                    </div>
                </div>

                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="dose">Dose por administração: 
                            	<button style="font-size: 6px" type="button" data-toggle="tooltip" title="Dose" class="btn btn-primary btn-flat doseM"><i class="fa fa-search"></i></button></label>
                            <textarea id="dose" type="text" name="dose" class="form-control"></textarea>
                        </div>
                    </div>
                    
                    
                    <input id="idmed" type="hidden">
                    <input id="codigo" type="hidden">
                    
                    <div class="col-xs-1 col-sm-1 col-md-1" >
                        <div class="form-group">
                            <label for="qtd">Quantidade:</label>
                            <input id="qtd" type="text" name="qtd" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="administracao">Administração:
                            	<button style="font-size: 6px" type="button" data-toggle="tooltip" title="Administração" class="btn btn-primary btn-flat administracaoM"><i class="fa fa-search"></i></button></label>
                            <input id="administracao" type="text" name="administracao" class="form-control">
                        </div>
                    </div>

                    
                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="diluicao">Diluição:
                            	<button style="font-size: 6px" type="button" data-toggle="tooltip" title="Diluição" class="btn btn-primary btn-flat diluicaoM"><i class="fa fa-search"></i></button></label>
                            <input id="diluicao" type="text" name="diluicao" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 ">
                        <div class="form-group">
                            <label for="estabilidade">Estabilidade:
                            	<button style="font-size: 6px" type="button" data-toggle="tooltip" title="Estabilidade" class="btn btn-primary btn-flat estabilidadeM"><i class="fa fa-search"></i></button></label>
                            <input id="estabilidade" type="text" name="estabilidade" class="form-control">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 obs">
                        <div class="form-group">
                            <label for="posologia">Posologia:</label>
                            <input id="posologia" type="text" name="posologia" class="form-control" v-model="posologia" placeholder="">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 obs">
                        <div class="form-group">
                            <label for="obs">Tempo de Tratamento:</label>
                            <input id="obs" type="text" name="obs" class="form-control" v-model="obs" placeholder="">
                        </div>
                    </div>

                    <div class="row" style="margin-left: 65%;">
                        <div class="col-sm-12 text-center"> 
                            <button data-toggle="tooltip" style="display: inline-block; vertical-align: top;" type="button" class="btn btn-primary btn-md center-block relatorio">Relatório Antibioticoterapia</button>
                            <button style="display: inline-block; vertical-align: top;" type="button" class="btn btn-primary btn-md center-block" @click="addMed">Adicionar</button>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <br>
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <h4><center><b>Descrição da prescrição</b></center></h4>
                                <div class="box-body">
                                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                                        <table id="table" class="table table-condensed table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">SIMPAS</th>
                                                    <th width="2%" class="text-center">Quantidade</th>
                                                    <th class="text-center">Medicamento</th>
                                                    <th class="text-center">Posologia</th>
                                                    <th class="text-center">Tempo de Tratamento</th>
                                                    <th class="text-center">Dose</th>
                                                    <th class="text-center">Administração</th>
                                                    <th class="text-center">Diluição</th>
                                                    

                                                    <th width="3%" class="text-center">Opções</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="medicamento in prescricao.prescricaomedicamento">
                                                    <td>{{medicamento.simpas}}</td>
                                                    <td>{{medicamento.qtd}}</td>
                                                    <td>{{medicamento.med}}</td>
                                                    <td>{{medicamento.posologia}}</td>
                                                    <td>{{medicamento.obs}}</td>
                                                    <td>{{medicamento.dose}}</td>
                                                    <td>{{medicamento.administracao}}</td>
                                                    <td>{{medicamento.diluicao}}</td>
                                                    
                                                    <td>             
                                                        <center>
                                                        <a class="btn btn-default"  @click="removeMed(medicamento)"><i class="fa fa-trash"></i></a>
                                                        </center>
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
                        <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Salvar" @click="adicionar"><i class="fa fa-save"></i></button>
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


        <div class="modal fade" id="relatorio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                        <label for="paciente">NOME:</label>
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

                                <div class="col-xs-5 col-sm-5 col-md-5">
                                    <div class="form-group">
                                        <label for="clinica">CLÍNICA:</label>
                                        <input id="clinica_a" type="text" name="clinica_a" class="form-control" readonly="readonly">
                                    </div>  
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 obs">
                                    <div class="form-group">
                                        <label for="diagInfe">DIAGNÓSTICO INFECCIOSO:</label>
                                        <input id="diagInfe" type="text" name="diagInfe" class="form-control" v-model="diagInfe">
                                     </div>
                                 </div>

                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="duracao">QUANTIDADE:</label>
                                        <input id="quantidade" type="number" min="1" name="quantidade" class="form-control" v-model="quantidade">
                                     </div>
                                 </div>

                                <div class="col-xs-5 col-sm-5 col-md-5">
                                    <div class="form-group">
                                        <label for="duracao">DURAÇÃO DO TRATAMENTO:</label>
                                        <select id="duracao" type="text" name="duracao" class="form-control" v-model="duracao">
                                            <option>Dia(s)</option>
                                            <option>Semana(s)</option>
                                            <option>Mês(es)</option>
                                        </select>        
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
