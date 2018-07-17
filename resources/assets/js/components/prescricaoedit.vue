<script language= "text/javascript">
   var array = new Array();
   var sub1 = new Array();
   var sub2 = new Array();

   var consequencia = new Array();
   var classific;
   var direita = new Array();
   var codigos = new Array();
   var posicoes = new Array();   
   var idinter = '',obj='';

    export default{

        props: ['data', 'medico', 'medicamentos', 'pacient','admissa','prontua','leit','clinic', 'evolu','idinter','idprescricao', 'medicamentosss','di','ale','interacao_all'],
        data(){
            return {
                cid_all: '',
                cids: [],
                verifica_relatorio: false,
            	evol:'',
            	ind: '',
                ind_rela:'',
            	nomeEdit:'',
                quantidadeEdit: '',
                posologiaEdit:'',
                intervalo_posologiaEdit:'',
                doseEdit:'',
                administracaoEdit:'',
                diluicaoEdit:'',
                obsEdit:'',
                paciente: '',
                alergia:'',
                numeroprontuario: '',
                clinica: '',   
                leito: '',
                diagInfe: '',
                cultura: '',
                admissao: '',
                prontuario: '',
                qtd:'',
                nome:'',
                posologia:'',
                intervalo_posologia: 'Selecione...',
                meds:[],
                obs:'',
                iniTrata:'',
                medInfe:'',
                duracao:'',
                prescricao: {
                    idinternacao: '',
                    dataprescricao: '',
                    historicoatual: '',
                    evolucao: '',
                    dataprescricao: '',
                    observacoesmedicas: '',
                    prescricaomedicamento: [],
                    relatorioAntimicro: [],
                },
            }
        },
        mounted(){
            this.prescricao.dataprescricao = this.data;
            this.cid_all = JSON.parse(this.di);
            obj = jQuery.parseJSON(this.medicamentosss);
            
            var i;
            for (i = 0; i < this.cid_all.length ; i++){
                this.cids.push(this.cid_all[i].descricao);
            }
        },
        methods: {
	            	addMed(){ 
                    $('input[type=search]').val('').change(); 
                    var administracao = $("#administracao").val();
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
                            var codigo = $("#codigo").val();
    	                    var dose = $("#dose").val();
    	                    var estabilidade = $("#estabilidade").val();
    	                    var diluicao = $("#diluicao").val();

    	                    this.prescricao.relatorioAntimicro.push({
    	                        idmedicamento: id,
    	                        medInfe: med,
    	                        duracao: this.duracao,
    	                        leito: this.leito,
    	                        paciente: this.paciente,
    	                        dataadmissao: this.admissao,
    	                        iniTrata: this.iniTrata,
    	                        clinica: this.clinica,
    	                        diagInfe: this.diagInfe,
                                cultura: this.cultura
    	                    });

                            this.duracao = '';
                            this.iniTrata = '';
                            this.diagInfe = '';
                            this.cultura = '';
                            document.getElementById('div_cultura').style.display = 'none';
                            document.getElementById("medInfe").value = '';
                            $("#solicitado").val("Não");


    	                    this.prescricao.prescricaomedicamento.push({
    	                        codigo: codigo,
    	                        simpas: simpas,
    	                        idmedicamento: id,
    	                        qtd: this.qtd,
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
                            
                            this.posologia = '';
                            this.obs = '';	                  
                            this.intervalo_posologia = 'Selecione...';

                            if(classific != 9){
                               $.notify(
                                  "Medicamento adicionado", 
                                  { globalPosition:"top center",
                                    className: 'success'}
                                );  
                            }else{
                                $.notify(
                                  "Campo adicionado", 
                                  { globalPosition:"top center",
                                    className: 'success'}
                                );  
                            }     
                        
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
                disable(){
                    classific = 9;
                    document.getElementById('med').removeAttribute('readonly');
                    document.getElementById("med").value = '';
                    document.getElementById("codigo").value = '';
                    document.getElementById("idmed").value = '';
                    document.getElementById("doseR").value = '';
                    document.getElementById("diluicaoR").value = '';
                    document.getElementById("administracaoR").value = '';
                    document.getElementById("estabilidadeR").value = '';
                },
              adicionarRelatorio(med) {
                    var index = this.prescricao.prescricaomedicamento.indexOf(med)
                    this.ind_rela = index;

                    if(this.prescricao.prescricaomedicamento[index].classificacao == 2){
                        this.verifica_relatorio = true;
                        classific = this.prescricao.prescricaomedicamento[index].classificacao;
                        document.getElementById("medInfe").value =  this.prescricao.prescricaomedicamento[index].med;
                        $(document).ready(function() {
                            $("#relatorio").modal('show');
                        });
                    }

                },
                salveRelatorio() {
                    this.verifica_relatorio = false;
                    this.prescricao.relatorioAntimicro[this.ind_rela].idmedicamento = this.prescricao.prescricaomedicamento[this.ind_rela].idmedicamento;
                    this.prescricao.relatorioAntimicro[this.ind_rela].medInfe =   this.prescricao.prescricaomedicamento[this.ind_rela].med;
                    this.prescricao.relatorioAntimicro[this.ind_rela].quantidade = this.quantidade;
                    this.prescricao.relatorioAntimicro[this.ind_rela].duracao = this.duracao;
                    this.prescricao.relatorioAntimicro[this.ind_rela].leito = this.leito;
                    this.prescricao.relatorioAntimicro[this.ind_rela].paciente = this.paciente;
                    this.prescricao.relatorioAntimicro[this.ind_rela].dataadmissao = this.admissao;
                    this.prescricao.relatorioAntimicro[this.ind_rela].iniTrata = this.iniTrata;
                    this.prescricao.relatorioAntimicro[this.ind_rela].clinica = this.clinica;
                    this.prescricao.relatorioAntimicro[this.ind_rela].diagInfe = this.diagInfe;   
                    $.notify(
                      "Relatório salvo", 
                      { globalPosition:"top center",
                        className: 'success'}
                    );  
                    $("#relatorio").modal('hide');
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
                    document.getElementById('salvar').setAttribute('disabled',"true");
	                this.$http.post('/prescricao/create', this.prescricao).then(response => {
                        if(response.status == 202){
                            this.verifica_relatorio = true;
                            var i;
                            var t = response.data.length;
                            //for( i = 0 ; i < t ; i++){
                                
                                swal({
                                    title: "Erro",
                                    text: 'É necessário um novo relatório antimicrobiano para: '+response.data,
                                    confirmButtonColor: "#66BB6A",
                                    type: "error",
                                    showLoaderOnConfirm: false
                               }); 
                          // }    
                        }else{
                            swal({
    	                        title: "Salvooo!",
    	                        text: "Prescrição cadastrada com sucesso!",
    	                        confirmButtonColor: "#66BB6A",
    	                        type: "success",
    	                        showLoaderOnConfirm: true
    	                   },
    	                   function(){
    	                        location.href = "../../";
    	                   }); 
                        }
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

        			this.evol = this.evolu;
                    this.prescricao.evolucao = this.evolu;
        			this.prescricao.idprescricaopai = this.idprescricao;
        			this.prescricao.idinternacao = this.idinter;
        			this.clinica = this.clinic;
        			this.leito = this.leit;
        			this.numeroprontuario = this.prontua;
        			this.paciente = this.pacient;
					this.admissao = this.admissa;		 
                    this.alergia = this.ale;
	                var med_array = new Array();

	                this.$http.get('/prescricao/buscar/medicamentos/'+this.idprescricao).then(response => {

	                  med_array =  response.data;

	                var i =0;
	                var nomeunidade = '';
	                var conteudo = '';
	                var uc = '';
                  	for (i = 0; i < med_array.length ; i++){
	                        switch (med_array[i]['unidadedose']) {
                                case 0:
                                    nomeunidade = 'mcg';
                                    break;
                                case 1:
                                    nomeunidade = 'mg';
                                    break;
                                case 2:
                                    nomeunidade = 'g';
                                    break;
                                case 3:
                                    nomeunidade = 'UI';
                                    break;
                                case 4:
                                    nomeunidade = 'unidades';
                                    break;
                                case 5:
                                    nomeunidade = 'mg/g';
                                    break;
                                case 6:
                                    nomeunidade = 'UI/g';
                                    break;
                                case 7:
                                    nomeunidade = 'mEq/mL';
                                    break;
                                case 8:
                                    nomeunidade = 'mg/gota';
                                    break;
                                case 9:
                                    nomeunidade = 'mcg/mL';
                                    break;
                                case 10:
                                    nomeunidade = 'UI/mL';
                                    break;
                                case 11:
                                    nomeunidade = 'mEq';
                                    break;
                                case 12:
                                    nomeunidade = 'mg/mL';
                                    break;
                                case 13:
                                	nomeunidade = 'mL';
                             		break;
                                case 14:
                                    nomeunidade = 'Seringa Pré-enchida';
                                    break;
                                case 15:
                                    nomeunidade = 'Kcal/L';
                                    break;  
                            }

                            switch (med_array[i]['nomeconteudo']) {
                                case 0:
                                    conteudo = 'Frasco';
                                    break;
                                case 1:
                                    conteudo = 'FA (frasco ampola)';
                                    break;
                                case 2:
                                    conteudo = 'AMP (ampola)';
                                    break;
                                case 3:
                                    conteudo = 'Caixa';
                                    break;
                                case 4:
                                    conteudo = 'Envelope';
                                    break;
                                case 5:
                                    conteudo = 'Tubo';
                                    break;
                                case 6:
                                    conteudo = 'Bolsa';
                                    break;
                                case 7:
                                    conteudo = 'Pote';
                                    break;   
                            }

                            switch (med_array[i]['unidadeconteudo']) {
                                case 0:
                                    uc = 'mcg';
                                    break;
                                case 1:
                                    uc = 'mg';
                                    break;
                                case 2:
                                    uc = 'g';
                                    break;
                                case 3:
                                    uc = 'UI';
                                    break;
                                case 4:
                                    uc = 'unidades';
                                    break;
                                case 5:
                                    uc = 'mg/g';
                                    break;
                                case 6:
                                    uc = 'UI/g';
                                    break;
                                case 7:
                                    uc = 'mEq/mL';
                                    break;
                                case 8:
                                    uc = 'mg/gota';
                                    break;
                                case 9:
                                    uc = 'mcg/mL';
                                    break;
                                case 10:
                                    uc = 'UI/mL';
                                    break;
                                case 11:
                                    uc = 'mEq';
                                    break;
                                case 12:
                                    uc = 'mg/mL';
                                    break;
                                case 13:
                                    uc = 'mL';
                                    break;             
                            }
                        
                        if(med_array[i]['outros'] != ''){
                            this.prescricao.prescricaomedicamento.push({
                                codigo: med_array[i]['codigo'],
                                simpas: '-',
                                idmedicamento: med_array[i]['idmedicamento'],
                                qtd: med_array[i]['qtdpedida'],
                                med: med_array[i]['outros'],
                                obs: med_array[i]['obs'],
                                posologia: med_array[i]['posologia'],
                                intervalo_posologia: med_array[i]['intervalo_posologia'],
                                administracao: med_array[i]['administracao'],
                                dose: med_array[i]['dosemed'],
                                diluicao: med_array[i]['diluicao'],
                                estabilidade: med_array[i]['estabilidade'],
                                classificacao: med_array[i]['classificacao']
                            });    
                        }else{
                            codigos.push(med_array[i]['codigo']);

                            this.prescricao.prescricaomedicamento.push({
                                codigo: med_array[i]['codigo'],
                                simpas: med_array[i]['codigosimpas'],
                                idmedicamento: med_array[i]['idmedicamento'],
                                qtd: med_array[i]['qtdpedida'],
                                med: med_array[i]['nomesubstancia'] + med_array[i]['quantidadedose'] + ' ' + nomeunidade +', '+  med_array[i]['nomeforma'] + ' ' +conteudo + 'com ' + med_array[i]['quantidadeconteudo'] + uc,
                                obs: med_array[i]['obs'],
                                posologia: med_array[i]['posologia'],
                                intervalo_posologia: med_array[i]['intervalo_posologia'],
                                administracao: med_array[i]['administracao'],
                                dose: med_array[i]['dosemed'],
                                diluicao: med_array[i]['diluicao'],
                                estabilidade: med_array[i]['estabilidade'],
                                classificacao: med_array[i]['classificacao']
                            });
                        }

                        var cod,f,z,y;

                        cod = med_array[i]['codigo']; 

                        for (f = 0; f < sub1.length ; f++){
                            if(cod == sub1[f]){
                                direita.push({sub: sub2[f], id: cod});
                                posicoes.push({pos: f, id: cod});
                            }
                        }                        

                        for (z = 0; z < sub2.length ; z++){
                            if(cod == sub2[z]){
                                direita.push({sub: sub1[z], id: cod});
                                posicoes.push({pos: z, id: cod});
                            }
                        }

                        
                        this.prescricao.relatorioAntimicro.push({
	                        idmedicamento: '',
	                        medInfe: '',
	                        duracao: '',
	                        leito: '',
	                        paciente: '',
	                        dataadmissao: '',
	                        iniTrata: '',
	                        clinica: '',
	                        diagInfe: ''
	                    });

                    }

	                 
	                    
	                }).catch(response => {
	                   console.log(response);
	                     //$("#buscar").modal('hide')
	                    swal({
	                        title: "Erro!",
	                        text: "Ocorreu algum problema! Recarregue a operação",
	                        type: "error"
	                   });
	                });
            }
		 

    }

    $(function ($) {
        $("#table").on("click", "td", function() {
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
                      "Dieta selecionada", 
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

    window.onload=function(){
        document.getElementById('solicitado').addEventListener('change', function () {
            var style = this.value == 'Sim' ? 'block' : 'none';           
            if(style == 'block'){
                document.getElementById('div_cultura').style.display = style;    
            }else{
                document.getElementById('div_cultura').style.display = style;    
            }

        });
    }

</script>

<template>
    <div>
        <div class="row">         
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="box-body pad table-responsive">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="pull-left"><small><strong>Médico: </strong>{{this.medico}}</small></div> 
                        <div class="pull-right"><small><strong>Data da prescrição:</strong>{{this.data}}</small></div>
                        <br><br>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="paciente">Paciente:</label>
                            
                                <input id="paciente" type="text" name="paciente" class="form-control" readonly="readonly" v-model="paciente">
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="numeroprontuario">Nº Prontuário:</label>
                            <input id="numeroprontuario" type="text" name="numeroprontuario" class="form-control" readonly="readonly" v-model="numeroprontuario">
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <label for="clinica">Clínica:</label>
                            <input id="clinica" type="text" name="clinica" class="form-control" readonly="readonly" v-model="clinica">
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="leito">Leito:</label>
                            <input id="leito" type="text" name="leito" class="form-control" readonly="readonly" v-model="leito">
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1">
                        <div class="form-group">
                            <label for="diag">Diagnóstico:</label>
                            <br>
                            <button style="font-size: 20px" type="button" data-toggle="tooltip" title="Diagnóstico" class="btn btn-primary diagnostico"><i class="fa fa-search"></i></button>
                        </div>
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2">
                        <div class="form-group">
                            <label for="admissao">Data de admissão:</label>
                            <input id="admissao" type="text" name="admissao" class="form-control" readonly="readonly" v-model="admissao">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="evol">Alergia(s):</label>
                            <textarea readonly="" id="alergia" type="text" name="alergia" class="form-control" rows="1" v-model="alergia" ></textarea>
                        </div>
                    </div>
                    

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="evol">Evolução:</label>
                            <input id="evol" type="text" name="evol" class="form-control" v-model="prescricao.evolucao">
                            
                        </div>
                    </div>

                    <div class="col-xs-10 col-sm-10 col-md-10 ">
                        <div class="form-group">
                            <label for="med">MEDICAMENTOS NÃO PADRONIZADOS/PROCEDIMENTOS/EXAMES E OUTROS:</label>
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
                            <input id="qtd" type="number" min="1" name="qtd" class="form-control" v-model="qtd">
                        </div>
                    </div>

                    <div class="col-md-12 ">
                        <div class="form-group">
                                <div class="table-responsive col-md-12" style="margin-bottom: 20px;border-style: solid;border-color: #d2d6de;border-width: 1px;padding: 2;overflow-x: hidden;">
                                            <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                                                <thead>
                                                    <tr>
                                                        <th>Medicamentos/dietas</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                <tr>
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
                            <input id="dose" type="text" name="dose" class="form-control">
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
                                <option>Subcutânea</option>
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

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <br>
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <h4><center><b>Descrição da prescrição</b></center></h4>
                                <div class="box-body">
                                    <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
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
                        <button id="salvar" type="submit" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Salvar" @click="adicionar">Salvar prescrição</button>
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
                                              <label for="paciente">Nome:</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="nome" id="nome" class="form-control" v-model="nome">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-10 col-sm-10 col-md-10">
                                        <div class="form-group">
                                            <label for="paciente">Prontuário:</label>
                                            <div class="input-group input-group-sm">
                                                <input type="text" name="prontuario" id="prontuario" class="form-control" v-model="prontuario">
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


        <div class="modal fade" id="relatorio" data-keyboard="false" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                        <input id="posologia" v-model="paciente" type="text" name="posologia" class="form-control"  readonly="">
                                     </div>
                                 </div>

                                 <div class="col-xs-2 col-sm-2 col-md-2">
                                    <div class="form-group">
                                        <label for="leito">LEITO:</label>
                                        <input id="leito" type="text" name="leito" class="form-control" readonly="readonly" v-model="leito">
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label for="admissao">DATA DE ADMISSÃO:</label>
                                        <input id="admissao" type="text" name="admissao" class="form-control" readonly="readonly" v-model="admissao">
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
                                        <input id="clinica" type="text" name="clinica" class="form-control" readonly="readonly" v-model="clinica">
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label for="duracao">DURAÇÃO DO TRATAMENTO - DIA(S):</label>
                                        <input id="duracao"  min="1"  type="number" name="duracao" class="form-control" v-model="duracao">
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

                                <div class="col-xs-12 col-sm-12 col-md-12 med">
                                    <div class="form-group">
                                        <label>SOLICITADO CULTURA:</label>
                                        <select id="solicitado"  class="form-control">
                                            <option>Não</option>
                                            <option>Sim</option>
                                        </select>
                                        <div id="div_cultura" style="display: none; margin-top: 10px">
                                        <input v-model="cultura" id="cultura" name="cultura" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                </div>
                         </div>
                        </div>  
                    </div>
                    <div class="modal-footer">
                        <button v-if="verifica_relatorio" @click="salveRelatorio()" type="button" class="btn btn-default" data-dismiss="modal">Salvar</button>                                                    
                        <button v-if="!verifica_relatorio" type="button" class="btn btn-default" @click="salvarAntimicrobiano()">Guardar</button>
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
