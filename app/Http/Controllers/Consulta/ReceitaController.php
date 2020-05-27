<?php

namespace App\Http\Controllers\Consulta;

use App\Http\Controllers\Controller;
use App\Receita;
use Illuminate\Http\Request;

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
       return view('pesquisa.receitaListagem',compact('receitaDados'));
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
        $receita= $request->all();
        Receita::create($receita);
        return redirect()->route('consulta.receita.index');
       
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
