<script language= "text/javascript">
    var obj =''; 
    export default{
        
        props: ['pa', 'le', 'cli','ci'],
        
        data(){
            return {
                paciente: {
                    idpaciente: '',
                    idclinica: '',
                    idleito: '',
                    cids: [],        
                },
                idcid10:'',
                leitos: [],
                leito_all:[],
                clinicas: [],
                cid_all: [],
            }
        },
        
        mounted(){
            obj = JSON.parse(this.pa);
            this.leito_all = JSON.parse(this.le);
            this.clinicas = JSON.parse(this.cli);
            this.cid_all = JSON.parse(this.ci);;                
        },
        methods: {
            addCid(){
                this.paciente.cids.push({
                    idcid10: this.idcid10,
                 });

                $.notify(
                      "Diagnóstico adicionado", 
                      { globalPosition:"top center",
                        className: 'success'}
                    );  
            },
            removeCid(cid) {
               var index = this.paciente.cids.indexOf(cid);
                if(index > -1){
                    this.paciente.cids.splice(index, 1);                  
                }
            },
            clinica(clinica){
                this.leitos = [];
                var i;
                for(i = 0; i < this.leito_all.length; i++ ){
                    if(this.leito_all[i].idclinica == clinica ){
                        this.leitos.push(this.leito_all[i]);
                    }
                }
            },
            adicionar(){
                if($("#idPaciente").val() == ''){
                    swal({
                            title: "Erro!",
                            text: "Selecione um paciente!",
                            confirmButtonColor: "#66BB6A",
                            type: "warning"
                        }); 
                        return;   
                }
                if(this.paciente.cids == ''){
                    swal({
                            title: "Erro!",
                            text: "Insira o diagnóstico do paciente!",
                            confirmButtonColor: "#66BB6A",
                            type: "warning"
                        });    
                }else{
                    this.paciente.idpaciente = $("#idPaciente").val();
                    document.getElementById('salvar').setAttribute('disabled',"true");
                    this.$http.post('/internacao/create', this.paciente).then(response => {
                        if(response.body == 'error'){
                            document.getElementById('salvar').removeAttribute('disabled');
                            swal({
                                title: "Erro!",
                                text: "Paciente já se encontra internado!",
                                confirmButtonColor: "#66BB6A",
                                type: "warning"
                            });    
                        }else{
                            swal({
                                title: "Salvo!",
                                text: "Paciente internado com sucesso!",
                                confirmButtonColor: "#66BB6A",
                                type: "success"
                           },
                           function(){
                                location.href = "create";
                           }); 
                        }
                    }).catch(response => {
                        document.getElementById('salvar').removeAttribute('disabled');

                            swal({
                                title: "Ocorreu algum problema!",
                                text: "Verifique todos os campos e tente novamente!",
                                confirmButtonColor: "#66BB6A",
                                type: "warning"
                            });    
                    });
                }
            }
        }
    }

    $(function ($) {
        $("#table").on("click", "td", function() {
            var m =  $( this ).text();
            
            var i;
            for (i = 0; i < obj.length ; i++){
                if(m == obj[i].nomecompleto){

                    $.notify(
                      "paciente selecionado", 
                      { globalPosition:"top center",
                        className: 'info'}
                    );  

                    document.getElementById("paciente").value = obj[i].nomecompleto;
                    document.getElementById("idPaciente").value = obj[i].id;
                }
            }
        });
    });

</script>

<template>
    <div>
        <div class="row">
            <div class="box-body">   
                <div class="col-xs-11 col-sm-11 col-md-11">
                <div class="form-group">
                    <strong>Paciente:</strong>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <input  name="paciente" class="form-control" id="paciente" readonly="">
                    </div>
                </div>
            </div>
            <div class="col-xs-1 col-sm-1 col-md-1">
                <div class="form-group">
                    <br>
                    <a class="btn btn-primary"  data-toggle="modal" data-target="#pacientemodal" title="Adicionar paciente" style="color: #fff;"><i class="fa fa-plus"></i></a>
                </div>
            </div>

            <div class="col-md-12 ">
                        <div class="form-group">
                            <div class="table-responsive col-md-12" style="margin-bottom: 20px;border-style: solid;border-color: #d2d6de;border-width: 1px;padding: 2;overflow-x: hidden;">
                                        <table id="table" class="table table-bordered table-hover dataTable" role="grid">
                                            <thead>
                                                <tr>
                                                    <th>Pacientes</th>
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
            <input id="idPaciente" type="hidden">
            <div class="col-xs-9 col-sm-9 col-md-9">
                <div class="form-group">
                    <strong>Clínica:</strong>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-hospital-o"></i>
                        </span>
                        <select v-on:input="clinica($event.target.value)" id="idclinica" name="idclinica" class="form-control" v-model="paciente.idclinica">
                            <option>Selecione...</option> 
                            <option  v-for = "clinica in clinicas"  v-bind:value=clinica.id>{{clinica.nome}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-xs-3 col-sm-3 col-md-3">
                <div class="form-group">
                    <strong>Leito:</strong>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fa fa-hotel"></i>
                        </span>
                        <select id="idleito" name="idleito" class="form-control" v-model="paciente.idleito">
                            <option>Selecione...</option> 
                            <option v-for = "leito in leitos" v-bind:value=leito.id>{{leito.leito}}</option>
                        </select>
                    </div>
                </div>
            </div>    

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Total de diagnóstico:</strong>
                        {{paciente.cids.length}}
                        <a class="btn btn-default" style="border-radius: 45%; margin-left: 2%;" data-toggle="modal" data-target="#substancia" title="Adicionar cids"><i class="fa fa-plus"></i></a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <br>
                <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                    <h4><center><b>Diagnóstico(s)</b></center></h4>
                        <div class="box-body">
                            <div class="table-responsive col-lg-12 col-md-12 col-sm-12">
                                <table id="table" class="table table-condensed table-bordered table-hover dataTable" role="grid">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Diagnóstico</th>
                                            <th width="3%" class="text-center">Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for = "cid in paciente.cids">
                                        
                                            <td>
                                                <div v-for="ci in cid_all" v-if="(cid.idcid10 === ci.id)">
                                                    {{ci.descricao}}
                                                </div>                            
                                            </td>
                                            
                                            <td>             
                                                <center>
                                                <a class="btn btn-default"  @click="removeCid(cid)"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div> 
                </div>
                <div class="pull-right" style="margin-right: 1%;">
                    <button id="salvar" type="submit" class="btn btn-success"  data-toggle="tooltip" data-placement="top" @click="adicionar">Salvar</button>
                </div>
                <div class="pull-right" style="margin-right: 1%;">
                    <a class="btn btn-default" data-toggle="tooltip"  onclick="window.history.go(-1);"> 
                        Voltar
                    </a>
                </div>
            </div>
        
        
        <div class="modal fade" id="substancia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel"><strong>Adicionar diagnóstico</strong></h4>
                    </div>
                    <div class="modal-body">
                        <div class="box box-primary" style="margin-left: 2%; margin-right: 2%; width: 96%;">
                            <div class="row">
                                <div class="box-body">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>DIAGNÓSTICOS:</strong>
                                             <select v-model="idcid10" id="cid10" name="cid10" class="form-control">
                                                <option v-for = "cid in cid_all" v-bind:value=cid.id>{{cid.descricao}}</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    </div>    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary" @click="addCid">Adicionar</button>
                    </div>
                    </div>
                    
                </div>
            </div>

            
        </div>
</template>

<style scoped=""></style>