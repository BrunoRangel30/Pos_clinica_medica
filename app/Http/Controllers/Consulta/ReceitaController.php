<?php

namespace App\Http\Controllers\Consulta;

use App\Http\Controllers\Controller;
use App\Receita;
use Illuminate\Http\Request;
use App\Consulta;
use App\Medicamento;

class ReceitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    
   


    public function __construct(Request $request) {
        $this->request = $request;
        
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
       // $receitaArray = session()->get('receita');
       //  unset($receitaArray[0]);
       //  dd($receitaArray);
       //  session()->forget('receita');
       //  session()->put('receita', $receitaArray);
        // dd($receitaArray = session()->get('receita'));
       //dd( $receitaGet = $request->session()->get('receita'));
      //  dd($receitaGet);
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
    public function edit(Receita $receita)
    {
        //
    }

    public function pdfReceita(Request $request){
        dd($request);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receita $receita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receita  $receita
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receita $receita)
    {
        //
    }
}
