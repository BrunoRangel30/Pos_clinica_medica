<?php

namespace App\Http\Controllers\Consulta;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AgendaRequest;
use App\Atendimento;
use App\Medico;
use App\Agenda;
use App\Paciente;
use App\User;
use App\Receita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DateTime;

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
    protected $user;
    protected $receita;


    public function __construct(Request $request) {
        $this->request = $request;
        $medico = new Medico;
        $this->medico = $medico;
        $agenda = new Agenda;
        $this->agenda = $agenda;
        $paciente = new Paciente;
        $this->paciente = $paciente;
        $user = new User;
        $this->$user = $user;
        $receita = new Receita;
        $this->$receita = $receita; 
    }

    public function index()
    {   
        
        if(!empty(Auth::user()->id)){
            $date = date_create(date('Y/m/d'));
            $dataAtual = date_format($date, 'Y-m-d');
            $agenda= $this->agenda->getAgendaDiaro($dataAtual);
        }
        // dd($agenda);
        return view('consulta.atendimento',compact('agenda'));
    }

    public function consulta( Request $request)
    {  
        //dd($this->request->all());
        
        $consulta = $this->agenda->getPacienteMedico(Auth::user()->id,$request['pa'])->first();
   // dd($consulta);
        session(['medico' =>  $consulta->medico,
        'cpf'=> $consulta->cpf,
        'paciente' => $consulta->nomePaciente,
        'data_nasc'=> $consulta->data_nasc,
        'crm'=>$consulta->crm,
        'idMedico'=> Auth::user()->id,
        'Idpaciente'=>$this->request['pa']]);
        //limpa as receitas armazenadas na cache
        session()->forget('receita');
        session()->forget('exames');

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
    public function store(AgendaRequest $request)
    {
       
        $dataAgenda= $request->all();
        $dataAgenda['user_log'] = Auth::user()->id;
        //cadastra no banco 
        $this->agenda->create($dataAgenda);
        //resgata para listar
        return $dataAgenda['fk_medico'];
      
       
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
    public function update(AgendaRequest $request, Atendimento $atendimento)
    {
       $dataAgenda= $this->agenda->where('agenda_id',$request->agenda_id)->first();
       $dataAgenda->fill($request->all());
       $dataAgenda->save();
       return $request->fk_medico;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Atendimento  $atendimento
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
     
       $agenda = Agenda::where('agenda_id',$this->request->id_agenda);
       $agenda->delete();
       return $this->request->fk_medico;
    }
}
