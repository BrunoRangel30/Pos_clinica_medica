<?php

namespace App\Http\Controllers\Consulta;
use Illuminate\Support\Facades\Input;
use App\Atendimento;
use App\Medico;
use App\Agenda;
use App\Paciente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AtendimentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    protected $medico;
    protected $agenda;
    protected $paciente;

    public function __construct(Request $request) {
        $this->request = $request;
        $medico = new Medico;
        $this->medico = $medico;
        $agenda = new Agenda;
        $this->agenda = $agenda;
        $paciente = new Paciente;
        $this->paciente = $paciente;
    }

    public function index()
    {
        return view('consulta.atendimento');
    }

    public function consulta()
    {
        return view('consulta.index');
    }

    function removerAcentos($string){
        return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
    }

    public function pesquisaMedico()
    {
        $pala=$this->request->input('key');
        $pala = $this->removerAcentos($pala);
        $result = $this->medico->getMedico($pala);
        return $result;
    }

    public function pesquisaPaciente()
    {
        $pala=$this->request->input('key');
        $pala = $this->removerAcentos($pala);
        $result = $this->paciente->getPaciente($pala);
        return $result;
    }

    public function atualizarAgenda(){
       
        $idMed=$this->request->input('id');
        $agendaMed = $this->agenda->getAgenda($idMed);
        return json_encode($agendaMed);
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
     * @param  \App\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function show(Atendimento $atendimento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function edit(Atendimento $atendimento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Atendimento $atendimento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atendimento $atendimento)
    {
        //
    }
}
