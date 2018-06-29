<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Internacao;
use App\Paciente;
use App\Clinica;
use App\Cid10;
use App\Leito;
use App\InternacaoCid;
use DB;
class InternacaoController extends Controller {

    public function index(Request $request) {
        $internacoes = Internacao::orderBy('id', 'DESC')->paginate(500);
        return view('internacao.index', compact('internacoes'))
                        ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create() {

        $pacientes = Paciente::orderBy('id', 'DESC')->select('id', 'nomecompleto', 'numeroprontuario')->get();
        //dd($pacientes);
        $clinicas = Clinica::all();
        $cid10s = Cid10::all();
        $leitos = Leito::all();
        $dataadmissao = date("d-m-Y");
        return view('internacao.create', compact('pacientes', 'clinicas', 'cid10s', 'dataadmissao', 'leitos'));
    }

    public function store(Request $request) {
        $inter = DB::table('internacaos')->where('idpaciente', '=',$request->get('idpaciente'))->get();
        

        if($inter != []){
        
            $tam = count($inter);
            
            //return response()->json($inter[0]->saida);
            
            if($inter[$tam-1]->saida == ''){
                return response()->json('error');
            }    
        }
        $this->validate($request, [
            'idpaciente' => 'required',
            'idclinica' => 'required',
            'idleito' => 'required',    
        ]);

        $data = date('Y-m-d');
        $internacao = new Internacao();
        $internacao->idpaciente = $request->get('idpaciente');
        $internacao->idclinica = $request->get('idclinica');
        $internacao->idleito = $request->get('idleito');
        //$internacao->idcid10 = 4;
        $internacao->dataadmissao = $data;
        $internacao->save();
        $idInternacao = $internacao->id;
        $cids = $request->get('cids');
        
        for ($i = 0; $i < sizeof($cids); $i++) {
            $internacaoCid = new InternacaoCid();
            $internacaoCid->idinternacao = $idInternacao;
            $internacaoCid->idcid10 = $cids[$i]['idcid10'];
            $internacaoCid->save();

        }

        return redirect()->route('internacao.create')
                        ->with('success', 'Paciente internado com sucesso!');
    }

    public function edit($id) {
        $internacao = Internacao::find($id);
        return view('internacao.edit', compact('internacao'));
    }

    public function update(Request $request, $id) {
        
//        $this->validate($request, [
//            'codigo' => 'required',
//            'descricao' => 'required',
//        ]);


        $saida = date("d-m-Y");
        $internacao = Internacao::find($id);
        $internacao->saida = $saida;
        $internacao->save();

        return redirect()->route('internacao.index')
                        ->with('success', 'Paciente liberado com sucesso!');
    }

    public function destroy($id) {
        Internacao::find($id)->delete();
        return redirect()->route('internacao.index')
                        ->with('success', 'Internação excluída com sucesso!');
    }

    public function show($id) {
        $cid = Cid10::find($id);
        return view('cid10.show', compact('cid'));
    }

    public function buscarPaciente(Request $req) {
        $nome = $req->get('term');

        $results = array();

        if($nome != ''){
        
        $paciente = DB::table('internacaos')
                ->where('internacaos.saida', NULL)
                ->join('pacientes', 'pacientes.id', '=', 'internacaos.idpaciente')
                ->join('clinicas', 'clinicas.id', '=', 'internacaos.idclinica')
                ->join('leitos', 'leitos.id', '=', 'internacaos.idleito')
                ->join('cid10s', 'cid10s.id', '=', 'internacaos.idcid10')
                ->select('pacientes.nomecompleto','pacientes.numeroprontuario', 'internacaos.id', 'clinicas.nome','leitos.leito', 'cid10s.descricao', 'internacaos.dataadmissao')
                ->get();
                foreach ($paciente as $value) {
                    $results[] = [
                    'value' => $paciente[0]->nomecompleto,
                    'clinica'=> $paciente[0]->nome,
                    'dataadmissao' => $paciente[0]->dataadmissao,
                    'id' => $paciente[0]->id,
                    'leito' => $paciente[0]->leito,
                    'descricao' => $paciente[0]->descricao,
                    'numeroprontuario' => $paciente[0]->numeroprontuario
                    ];
                }
            
        }

        if($req['prontuario'] != ''){
        $paciente = DB::table('internacaos')
                ->where('internacaos.saida', NULL)
                ->join('pacientes', 'pacientes.id', '=', 'internacaos.idpaciente')
                ->join('clinicas', 'clinicas.id', '=', 'internacaos.idclinica')
                ->join('leitos', 'leitos.id', '=', 'internacaos.idleito')
                ->join('cid10s', 'cid10s.id', '=', 'internacaos.idcid10')
                ->where('pacientes.numeroprontuario',$req['prontuario'])->select('pacientes.nomecompleto','pacientes.numeroprontuario', 'internacaos.id', 'clinicas.nome', 'leitos.leito', 'cid10s.descricao', 'internacaos.dataadmissao')
                ->get();

                $results[] = [
                'value' => $paciente[0]->nomecompleto,
                'clinica'=> $paciente[0]->nome,
                'dataadmissao' => $paciente[0]->dataadmissao,
                'id' => $paciente[0]->id,
                'leito' => $paciente[0]->leito,
                'descricao' => $paciente[0]->descricao,
                'numeroprontuario' => $paciente[0]->numeroprontuario
            ];
        }

        return response()->json($results);
/*

$paciente = Internacao::where('internacaos.saida', NULL)
                ->join('pacientes', 'pacientes.id', '=', 'internacaos.idpaciente')
                ->join('clinicas', 'clinicas.id', '=', 'internacaos.idclinica')
                ->join('leitos', 'leitos.id', '=', 'internacaos.idleito')
                ->join('cid10s', 'cid10s.id', '=', 'internacaos.idcid10')
                ->where(('LOWER(pacientes.nomecompleto)'), 'LIKE', '%'.strtolower($nome).'%' )->select('pacientes.nomecompleto', 'internacaos.id', 'clinicas.nome', 'leitos.leito', 'cid10s.descricao', 'internacaos.dataadmissao')
                ->get();

                */

        //dd($paciente);
    }

}
