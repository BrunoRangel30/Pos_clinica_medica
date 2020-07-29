<?php

namespace App\Http\Controllers\Consulta;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\AgendaRequest;
use App\Atendimento;
use App\Medico;
use App\Agenda;
use App\Paciente;
use App\User;
use App\Consulta;
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
    protected $consulta;


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
        $consulta = new Consulta;
        $this->$consulta = $consulta; 
    }

    public function index()
    {   
        //dd('aqui');
        if(!empty(Auth::user()->id)){
            date_default_timezone_set('America/Sao_Paulo');
            $date = date_create(date('Y/m/d',time()));
            $dataAtual = date_format($date, 'Y-m-d');
            $idMedico = $this->medico->getIdUserMedico(Auth::user()->id);
            $agenda= $this->agenda->getAgendaDiaro($dataAtual,$idMedico->medico_id);
        }
        $consulta = new Consulta;
       
        return view('consulta.atendimento',compact('agenda'));
    }

    public function consulta( Request $request)
    {   
        $id = $this->medico->getIdUserMedico(Auth::user()->id);
        $consulta = $this->agenda->getPacienteMedico($id->medico_id,$request['pa'])->first();
        session(['medico' =>  $consulta->medico,
        'cpf'=> $consulta->cpf,
        'paciente' => $consulta->nomePaciente,
        'data_nasc'=> $consulta->data_nasc,
        'crm'=>$consulta->crm,
        'idMedico'=> $id->medico_id,
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
        //atualiza o id do usuario na sessão
       // dd($result->paciente_id);
       // session()->forget('res_pacienre');
        //session('res_pacienre' ,  $result->paciente_id);
        return $result;
    }

    public function atualizarAgenda(Request $request){
       
        $start = (!empty($request->start)) ? ($request->start) : ('');
        $end = (!empty($request->end)) ? ($request->end) : ('');
        $idMed= $request->data;
        $agendaMed = $this->agenda->getAgenda($idMed,$start,$end);
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
        $request->session()->flash('alert-success', 'Consulta agendada com sucesso!');
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
    {  //dd( $request->agenda_id);
       $dataAgenda= $this->agenda->where('agenda_id',$request->agenda_id)->first();
       
       $dataAgenda->start = $request->start;
       $dataAgenda->end = $request->end;
       $dataAgenda->title = $request->title;
       $dataAgenda->tipo_consulta = $request->tipo_consulta;
       $dataAgenda->fk_paciente = $request->fk_paciente;
       $dataAgenda->fk_medico = $request->fk_medico;
       $dataAgenda->user_log =  Auth::user()->id;
       //$dataAgenda->fill($request->all());
       $dataAgenda->save();
       $dataAgenda= $this->agenda->where('agenda_id',$request->agenda_id)->first();
      // dd($dataAgenda);

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
