<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use DB; 
use App\Prescricao;
use App\PrescricaoMedicamento;
use SnappyPDF;
use PDF;
use Illuminate\Http\Request;

/**
 * Description of RelatorioController
 *
 * @author Lucas
 */
class RelatorioController extends Controller {
    
    
    public function prescricao($id){
        
        $prescricao = Prescricao::find($id);
        //dd($prescricao);
        //dd($usuarios);
        $pdf = \PDF::loadView('relatorios.prescricao', ['prescricao' => $prescricao])->setPaper('a4', 'landscape');
        
        return $pdf->stream();   
    }

    public function buscarPortaria(Request $request){
        $portarias = [];

        $data = $request['date'];

        if($request['date'] != ''){
            $portarias = DB::table('prescricao_medicamentos')
            ->join('prescricaos','prescricaos.id','=','prescricao_medicamentos.idprescricao')
            ->join('internacaos','internacaos.id','=','prescricaos.idinternacao')
            ->join('clinicas','clinicas.id','=','internacaos.idclinica')
            ->join('medicamentos','medicamentos.id','=','prescricao_medicamentos.idmedicamento')
            ->join('medicamentosubstancias','medicamentosubstancias.idmedicamento','=','medicamentos.id')
            ->join('substanciaativas','substanciaativas.id','=','medicamentosubstancias.idsubstanciaativa')  
            ->where('substanciaativas.classificacao','=', 0)
            ->whereDate('prescricaos.created_at','=',$request['date'])
            ->select('substanciaativas.nome as nome_medicamento','prescricao_medicamentos.qtdpedida','clinicas.nome as nome_clinica','prescricaos.created_at')
            ->get();
        }
        
        return view('portaria.index', compact('portarias','data'));
    }

    public function portariaIndex(){
		return view('portaria.index', compact('portarias'));
    }


    public function portariaImprimir(Request $request){

        $portarias = DB::table('prescricao_medicamentos')
        ->join('prescricaos','prescricaos.id','=','prescricao_medicamentos.idprescricao')
        ->join('internacaos','internacaos.id','=','prescricaos.idinternacao')
        ->join('clinicas','clinicas.id','=','internacaos.idclinica')
        ->join('medicamentos','medicamentos.id','=','prescricao_medicamentos.idmedicamento')
        ->join('medicamentosubstancias','medicamentosubstancias.idmedicamento','=','medicamentos.id')
        ->join('substanciaativas','substanciaativas.id','=','medicamentosubstancias.idsubstanciaativa')  
        ->where('substanciaativas.classificacao','=', 0)
        ->whereDate('prescricaos.created_at','=',$request->data)
        ->select('substanciaativas.nome as nome_medicamento','prescricao_medicamentos.qtdpedida','clinicas.nome as nome_clinica','prescricaos.created_at')
        ->get();
        
        $pdf = SnappyPDF::loadView('relatorios.portaria344', compact('portarias'));
        return $pdf->stream();      
        
//        return view('portaria.index', compact('portarias'));
    }




    public function prescricaoImprimir($id){
    	$prescricao = Prescricao::find($id);
        
        $medicamentos = PrescricaoMedicamento::where('idprescricao', $prescricao->id)
                ->join('medicamentos', 'medicamentos.id', '=', 'prescricao_medicamentos.idmedicamento')
                ->leftjoin('relatorio_antimicrobianos', 'relatorio_antimicrobianos.idprescricao_medicamento', '=', 'prescricao_medicamentos.id')
                ->where('idmedicamento', '!=', null)
                ->select('medicamentos.id', 'medicamentos.idformafarmaceutica', 'medicamentos.nomeconteudo', 'medicamentos.quantidadeconteudo', 'medicamentos.unidadeconteudo', 'medicamentos.codigosimpas', 'prescricao_medicamentos.id as idprescmed', 'prescricao_medicamentos.idprescricao', 'prescricao_medicamentos.idmedicamento', 'prescricao_medicamentos.qtdpedida','prescricao_medicamentos.simpas','prescricao_medicamentos.obs', 'prescricao_medicamentos.qtdatendida', 'prescricao_medicamentos.posologia','relatorio_antimicrobianos.diagnostico_infeccioso', 'relatorio_antimicrobianos.id as idrelatorio'
                   ,'relatorio_antimicrobianos.nome','relatorio_antimicrobianos.leito','relatorio_antimicrobianos.data_admissao','relatorio_antimicrobianos.inicio_tratamento','relatorio_antimicrobianos.clinica','relatorio_antimicrobianos.duracao_tratamento','relatorio_antimicrobianos.antimicrobiano')
                //->where('prescricao_medicamentos.qtdatendida', 0)
                ->get();
   		$pdf = SnappyPDF::loadView('relatorios.prescricao', compact('prescricao', 'medicamentos'))->setPaper('a4', 'landscape');
		return $pdf->stream();
    }

    public function Antibioticoterapia($id){
    	$prescricao = Prescricao::find($id);
        
        $medicamentos = PrescricaoMedicamento::where('idprescricao', $prescricao->id)
                ->join('medicamentos', 'medicamentos.id', '=', 'prescricao_medicamentos.idmedicamento')
                ->leftjoin('relatorio_antimicrobianos', 'relatorio_antimicrobianos.idprescricao_medicamento', '=', 'prescricao_medicamentos.id')
                ->where('idmedicamento', '!=', null)
                ->select('medicamentos.id', 'medicamentos.idformafarmaceutica', 'medicamentos.nomeconteudo', 'medicamentos.quantidadeconteudo', 'medicamentos.unidadeconteudo', 'medicamentos.codigosimpas', 'prescricao_medicamentos.id as idprescmed', 'prescricao_medicamentos.idprescricao', 'prescricao_medicamentos.idmedicamento', 'prescricao_medicamentos.qtdpedida', 'prescricao_medicamentos.qtdatendida', 'prescricao_medicamentos.posologia','relatorio_antimicrobianos.diagnostico_infeccioso', 'relatorio_antimicrobianos.id as idrelatorio'
                   ,'relatorio_antimicrobianos.nome','relatorio_antimicrobianos.leito','relatorio_antimicrobianos.data_admissao','relatorio_antimicrobianos.inicio_tratamento','relatorio_antimicrobianos.clinica','relatorio_antimicrobianos.duracao_tratamento','relatorio_antimicrobianos.antimicrobiano')
                ->get();

        $pdf = \SnappyPDF::loadView('relatorios.antibioticoterapia', compact('prescricao', 'medicamentos'));
		return $pdf->stream();

    }
}



