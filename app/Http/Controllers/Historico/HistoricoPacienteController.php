<?php

namespace App\Http\Controllers\Historico;

use App\HistoricoPaciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HistoricoPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('historico.historico');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistoricoPaciente  $historicoPaciente
     * @return \Illuminate\Http\Response
     */
    public function show(HistoricoPaciente $historicoPaciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoricoPaciente  $historicoPaciente
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoricoPaciente $historicoPaciente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoricoPaciente  $historicoPaciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoricoPaciente $historicoPaciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoricoPaciente  $historicoPaciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoricoPaciente $historicoPaciente)
    {
        //
    }
}
