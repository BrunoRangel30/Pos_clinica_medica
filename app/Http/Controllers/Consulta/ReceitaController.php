<?php

namespace App\Http\Controllers\Consulta;

use App\Http\Controllers\Controller;
use App\Receita;
use Illuminate\Http\Request;
use App\Consulta;
use App\Medicamento;
use PDF;
use Session;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    protected $consulta;
    
   


    public function __construct(Request $request) {
        $this->request = $request;
        $consulta = new Consulta;
        $this->consulta = $consulta;
        
    }
    public function index(Request $request)
    {
        $valuePaciente = $request->session()->get('Idpaciente');
        $valueMedico = $request->session()->get('idMedico');
        $receita = new Receita;
        $receitaDados= $receita->getReceita($valuePaciente,$valueMedico);
        
        return view('consulta.index',compact('receitaDados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consulta.receita');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //grava a receita no banco
        $receita= $request->all();
        $medicamento = new Medicamento;
        $med = $medicamento->getMedicamentoById($receita['fk_medicamento']);
        $receita['nome_fabrica']= $med[0]->nome;
        $request->session()->push('receita', $receita);
        //dd($receita);
        return view('pesquisa.receitaListagem');
       
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function show(Receita $receita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request['key'];
        $receita = array();
        $receita = $request->session()->get('receita');
        $data = array();
       
        for($i=0;$i<= count($receita);$i++) {
            if($i ==  (int) $request['key']){
                $data=$receita[$i];
                $data['id']=$i;
            }
        }
     
     
        return view('edicao.receita_edicao',compact('data'));
    }

    public function ReceitaPdf(Request $request){
      
        $receita = $this->consulta->getReceita($request['idConsulta']);
        $pdf = PDF::loadView('consulta.componentes.receitasPDF',compact('receita'));
        return $pdf->setPaper('a5')->stream();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       // dd($request);
        $receita = $request->session()->get('receita');
       
        for($i=0;$i<= count($receita);$i++) {
            if($i == $request['id']){
                $receita[$i]['fk_medico']= $request['fk_medico'];
                $receita[$i]['fk_medicamento']= $request['fk_medicamento'];
                $receita[$i]['fk_paciente']= $request['fk_paciente'];
                $receita[$i]['qtd']= $request['qtd'];
                $receita[$i]['unidade']= $request['unidade'];
                $receita[$i]['procedimento']= $request['procedimento'];
                $receita[$i]['nome_fabrica']= $request['nome_fabrica'];
            }
        }
        $request->session()->forget('receita');
        Session::put('receita', $receita);
        return view('pesquisa.receitaListagem');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $receita = $request->session()->get('receita');
        for($i=0;$i<= count($receita);$i++) {
            if($i ==   (int) $request['key']){
                unset($receita[$i]);
                array_unshift($receita);
            }
        }
        $request->session()->forget('receita');
        Session::put('receita', $receita);
        return view('pesquisa.receitaListagem');
    }
}
