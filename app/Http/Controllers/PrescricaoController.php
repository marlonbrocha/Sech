<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Prescricao;
use App\PrescricaoMedicamento;
use App\User;
use App\RelatorioAntimicrobiano;
use DB;        
class PrescricaoController extends Controller {

    public function index(Request $request) {
        $idusuario = Auth::user()->id;
        $prescricoesNatendidas = Prescricao::where('prescricaos.status', 0)
                ->orderBy('id', 'DESC')
                ->where('prescricaos.idusuario', $idusuario)
                ->get();
        $prescricoesAtendidas = Prescricao::where('prescricaos.status', 1)
                ->orderBy('id', 'DESC')
                ->where('prescricaos.idusuario', $idusuario)
                ->get();
        //dd($prescricoesNatendidas[0]->medicamentos[0]->medicamento);
        return view('prescricao.index', compact('prescricoesNatendidas', 'prescricoesAtendidas'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function teste(){
        $prescricao = Prescricao::find(81);
 
        $medicamentos = PrescricaoMedicamento::where('idprescricao', $prescricao->id)
                ->join('medicamentos', 'medicamentos.id', '=', 'prescricao_medicamentos.idmedicamento')
                ->leftjoin('relatorio_antimicrobianos', 'relatorio_antimicrobianos.idprescricao_medicamento', '=', 'prescricao_medicamentos.id')
                ->join('medicamentosubstancias' ,'medicamentosubstancias.idmedicamento','=','medicamentos.id')
                ->join('substanciaativas' ,'substanciaativas.id','=','medicamentosubstancias.idsubstanciaativa')
                ->join('formafarmaceuticas' ,'formafarmaceuticas.id','=','medicamentos.idformafarmaceutica')
                ->where('medicamentos.id', '!=', null)
                ->select('substanciaativas.classificacao' ,'medicamentosubstancias.unidadedose','formafarmaceuticas.nome as nomeforma', 'medicamentos.nomeconteudo','substanciaativas.nome as nomesubstancia','medicamentosubstancias.quantidadedose','substanciaativas.codigo','prescricao_medicamentos.obs','prescricao_medicamentos.administracao','prescricao_medicamentos.estabilidade','prescricao_medicamentos.diluicao','prescricao_medicamentos.dose as dosemed',

                 'medicamentos.quantidadeconteudo', 'medicamentos.unidadeconteudo', 'medicamentos.codigosimpas', 'prescricao_medicamentos.id as idprescmed', 'prescricao_medicamentos.idprescricao', 'prescricao_medicamentos.idmedicamento', 'prescricao_medicamentos.qtdpedida', 'prescricao_medicamentos.qtdatendida', 'prescricao_medicamentos.posologia','relatorio_antimicrobianos.diagnostico_infeccioso', 'relatorio_antimicrobianos.id as idrelatorio'
                   ,'relatorio_antimicrobianos.nome','relatorio_antimicrobianos.leito','relatorio_antimicrobianos.data_admissao','relatorio_antimicrobianos.inicio_tratamento','relatorio_antimicrobianos.clinica','relatorio_antimicrobianos.duracao_tratamento','relatorio_antimicrobianos.antimicrobiano')
                ->get();

            return response()->json($medicamentos);
           
    }

    public function create() {
        $prescricao = Prescricao::find(81);
        
        $dataprescricao = date("d/m/Y H:i:s");
        $id = Auth::user()->id;
        $medico = User::find($id)->name;

        $medicamentos = PrescricaoMedicamento::where('idprescricao', $prescricao->id)
                ->join('medicamentos', 'medicamentos.id', '=', 'prescricao_medicamentos.idmedicamento')
                ->leftjoin('relatorio_antimicrobianos', 'relatorio_antimicrobianos.idprescricao_medicamento', '=', 'prescricao_medicamentos.id')
                ->where('idmedicamento', '!=', null)
                ->select('medicamentos.id', 'medicamentos.idformafarmaceutica', 'medicamentos.nomeconteudo', 'medicamentos.quantidadeconteudo', 'medicamentos.unidadeconteudo', 'medicamentos.codigosimpas', 'prescricao_medicamentos.id as idprescmed', 'prescricao_medicamentos.idprescricao', 'prescricao_medicamentos.idmedicamento', 'prescricao_medicamentos.qtdpedida', 'prescricao_medicamentos.qtdatendida', 'prescricao_medicamentos.posologia','relatorio_antimicrobianos.diagnostico_infeccioso', 'relatorio_antimicrobianos.id as idrelatorio'
                   ,'relatorio_antimicrobianos.nome','relatorio_antimicrobianos.leito','relatorio_antimicrobianos.data_admissao','relatorio_antimicrobianos.inicio_tratamento','relatorio_antimicrobianos.clinica','relatorio_antimicrobianos.duracao_tratamento','relatorio_antimicrobianos.antimicrobiano')
                //->where('prescricao_medicamentos.qtdatendida', 0)
                ->get();
         
        return view('prescricao.create', compact('prescricao.create','prescricao', 'medicamentos','dataprescricao', 'medico'));


        /*
        $dataprescricao = date("d/m/Y H:i:s");
        $id = Auth::user()->id;
        $medico = User::find($id)->name;
        return view('prescricao.create', compact('dataprescricao', 'medico'));*/
    }

    public function store(Request $request) {

        $prescricao = new Prescricao();
        $prescricao->idusuario = Auth::user()->id;
        $prescricao->idinternacao = $request->get('idinternacao');
        $prescricao->dataprescricao = $request->get('dataprescricao');
        $prescricao->evolucao = $request->get('evolucao');
        $prescricao->observacoesmedicas = $request->get('observacoesmedicas');
        $prescricao->save();

        $idprescricao = $prescricao->id;

        //$medicamentos = $request->get('relatorioAntimicro');
        $relatorio = $request->get('relatorioAntimicro');
        //for ($i = 0; $i < sizeof($medicamentos); $i++) {
            
        //}

        $medicamentos = $request->get('prescricaomedicamento');
        $j = 0;
        for ($i = 0; $i < sizeof($medicamentos); $i++) {
            $prescricaomedicamento = new PrescricaoMedicamento();
            $prescricaomedicamento->idprescricao = $idprescricao;

            if ($medicamentos[$i]['idmedicamento'] == '') {

                $prescricaomedicamento->qtdpedida = 0;
                $prescricaomedicamento->posologia = $medicamentos[$i]['posologia'];
                $prescricaomedicamento->obs = $medicamentos[$i]['obs'];
                $prescricaomedicamento->outros = $medicamentos[$i]['med'];
                $prescricaomedicamento->dose = $medicamentos[$i]['dose'];
                $prescricaomedicamento->diluicao = $medicamentos[$i]['diluicao'];
                $prescricaomedicamento->administracao = $medicamentos[$i]['administracao'];
                $prescricaomedicamento->estabilidade = $medicamentos[$i]['estabilidade'];
                $prescricaomedicamento->simpas = $medicamentos[$i]['simpas'];
            } else {
                $prescricaomedicamento->idprescricao = $idprescricao;              
                $prescricaomedicamento->qtdatendida = 0;
                $prescricaomedicamento->outros = '';
                $prescricaomedicamento->idmedicamento = $medicamentos[$i]['idmedicamento'];
                $prescricaomedicamento->qtdpedida = $medicamentos[$i]['qtd'];
                $prescricaomedicamento->posologia = $medicamentos[$i]['posologia'];
                $prescricaomedicamento->obs = $medicamentos[$i]['classificacao'];
                $prescricaomedicamento->dose = $medicamentos[$i]['dose'];
                $prescricaomedicamento->diluicao = $medicamentos[$i]['diluicao'];
                $prescricaomedicamento->administracao = $medicamentos[$i]['administracao'];
                $prescricaomedicamento->estabilidade = $medicamentos[$i]['estabilidade'];
                $prescricaomedicamento->simpas = $medicamentos[$i]['simpas'];
            }

            $prescricaomedicamento->save();

            if($medicamentos[$i]['classificacao'] == 2){

                $RelatorioAntimicrobiano = new RelatorioAntimicrobiano();
                $RelatorioAntimicrobiano->idprescricao_medicamento = $prescricaomedicamento->id;
                $RelatorioAntimicrobiano->nome = $relatorio[$i]['paciente'];
                $RelatorioAntimicrobiano->leito = $relatorio[$i]['leito'];
                $RelatorioAntimicrobiano->data_admissao = $relatorio[$i]['dataadmissao'];
                $RelatorioAntimicrobiano->inicio_tratamento = $relatorio[$i]['iniTrata'];
                $RelatorioAntimicrobiano->clinica = $relatorio[$i]['clinica'];
                $RelatorioAntimicrobiano->diagnostico_infeccioso = $relatorio[$i]['diagInfe'];
                $RelatorioAntimicrobiano->duracao_tratamento = $relatorio[$i]['duracao'];
                $RelatorioAntimicrobiano->antimicrobiano = $relatorio[$i]['medInfe'];
                
                $RelatorioAntimicrobiano->save();
            }
        }

        

        return redirect()->route('internacao.index')
                        ->with('success', 'Paciente internado com sucesso!');

//        $this->validate($request, [
//            'nome' => 'required',
//            'descricao' => 'required',
//        ]);
//        return redirect()->route('clinica.index')
//                        ->with('success','Clínica cadastrada com sucesso!');

    }

    public function edit($id) {
        $prescricao = Prescricao::find($id);
        
        $medicamentos = PrescricaoMedicamento::where('idprescricao', $prescricao->id)
                ->join('medicamentos', 'medicamentos.id', '=', 'prescricao_medicamentos.idmedicamento')
                ->leftjoin('relatorio_antimicrobianos', 'relatorio_antimicrobianos.idprescricao_medicamento', '=', 'prescricao_medicamentos.id')
                ->where('idmedicamento', '!=', null)
                ->select('medicamentos.id', 'medicamentos.idformafarmaceutica', 'medicamentos.nomeconteudo', 'medicamentos.quantidadeconteudo', 'medicamentos.unidadeconteudo', 'medicamentos.codigosimpas', 'prescricao_medicamentos.id as idprescmed', 'prescricao_medicamentos.idprescricao', 'prescricao_medicamentos.idmedicamento', 'prescricao_medicamentos.qtdpedida', 'prescricao_medicamentos.qtdatendida', 'prescricao_medicamentos.posologia','relatorio_antimicrobianos.diagnostico_infeccioso', 'relatorio_antimicrobianos.id as idrelatorio'
                   ,'relatorio_antimicrobianos.nome','relatorio_antimicrobianos.leito','relatorio_antimicrobianos.data_admissao','relatorio_antimicrobianos.inicio_tratamento','relatorio_antimicrobianos.clinica','relatorio_antimicrobianos.duracao_tratamento','relatorio_antimicrobianos.antimicrobiano')
                //->where('prescricao_medicamentos.qtdatendida', 0)
                ->get();
         
        return view('prescricao.edit', compact('prescricao', 'medicamentos'));
    }

    public function update(Request $request, $id) {
        //dd($id) and die();
//        $this->validate($request, [
//            'nome' => 'required',
//            'descricao' => 'required',
//        ]);
        
        $prescricao = Prescricao::find($id);
        $prescricao->status = 1;
        $prescricao->save();

        return redirect()->route('prescricao.index')
                        ->with('success', 'Prescrição resolvida com sucesso!');
    }


}
