<?php

namespace App\Http\Controllers\Consulta;
use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendEmailExames;
use Illuminate\Support\Facades\DB;
use App\Consulta;
use App\User;
use App\Paciente;
use App\Medico;
use App\Exame;
use App\resultado_exames;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Session;
use Illuminate\Support\Facades\Auth;

class ExameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    protected $exame;
    protected $consulta;
    protected $paciente;
    protected $resultado;
    protected $user;
    protected $medico;
   
   
    


    public function __construct(Request $request) {
        $this->request = $request;
        $this->exame = new Exame;
        $consulta = new Consulta;
        $this->consulta = $consulta;
        $paciente = new Paciente;
        $this->paciente = $paciente;
        $resultado = new resultado_exames;
        $this->resultado = $resultado;
        $user = new User;
        $this->user = $user;
        $medico = new Medico;
        $this->medico = $medico;
         
    }
    public function index()
    {
        return view('pesquisa.exameListagem');
    }
    //Listagem quando salva algum resultado
    public function listarResultadosExames(Request $request){

        $resultado_exames = new resultado_exames;
        $idpaciente = $request->session()->get('fk_paciente_exame');
        $resultado = $resultado_exames->getResultados($idpaciente);
        $paciente = $this->paciente->getIdPaciente($idpaciente);
       // $request->session()->flash('alert-success', 'O exame foi inserido com sucesso!');
        return view('pesquisa.resultadoExameListagem', compact('resultado'),compact('paciente'));
       
    }
    //Listagem pelo dos resultados dos exames pelo menu
    public function listarResultadosExamesMenu(Request $request){
        
        $resultado_exames = new resultado_exames;
        $resultado = $resultado_exames->getResultados($request['id']);
        $paciente = $this->paciente->getIdPaciente($request['id']);
        return view('consulta.componentes.resultadoExamesSubmenu', compact('resultado'),compact('paciente'));

    }
    public function enviarEmailExame(Request $request){

        $nomePaciente = $this->paciente->getIdPaciente($request['idPa']); //paciente
        $email = $this->user->getUser($nomePaciente->user_id); //email
        $exame = $this->exame->getExameId($request['idexame']); //exame
        $idExame = $this->resultado::find($this->resultado->emailFoiEnviado($request['idexame'],$request['idPa'])->resul_id);
        $idExame->publicar = 1;
        $idExame->save();
        // Enviando o e-mail
        Mail::to('sis.clinica.medica@gmail.com')->send(new sendEmailExames($nomePaciente, $email, $exame));
        session()->forget('alert-success');
        $request->session()->flash('alert-success', 'Sua mensagem foi enviada com sucesso!');
        return redirect()->back();
    }

    public function listagemResultados()
    {
       // return view('pesquisa.exameListagem');
       return view('consulta.consultaExameIndex');
    }

    //Inserir resultados
    public function getExamesPedidos(Request $request)
    {
       $examesDados = $this->exame->getExamePaciente($request['id']);
       $paciente = $this->paciente->getIdPaciente($request['id']);
       $exames= array();
      foreach ($examesDados as $item){
          if($this->resultado->possuiExameCadastrado($item->exame_id,$item->id)->totalExame == 0 && $this->resultado->possuiExameCadastrado($item->exame_id,$item->id)->totalConsulta == 0){
            array_push($exames, $item);
          }
      }
       return view('consulta.componentes.resultadosExames', compact('exames'), compact('paciente'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('consulta.exame');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validacao = $request->validate(
            [
            'exame' => 'required|max:100',
            ]
        );
        $input = array();
        $input = $request->all();
        //dd($input);
        unset($input['_token']); //exlui o token
        $request->session()->push('exames', $input);
        return view('pesquisa.receitaListagem');
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show(Consulta $consulta)
    {
        //
    }

    public function buscaExame()
    {
        $pala=$this->request->input('key');
        return $this->exame->getExame($pala);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $exames = $request->session()->get('exames');
        return view('edicao.exame_edicao',compact('exames'));
    }
    public function ExamePdf(Request $request){

        $paciente = $this->paciente::find($request['idPa']);
        $exame = $this->consulta->nomeExame( $request['idConsulta']);
        $pdf = PDF::loadView('consulta.componentes.examesPDF',compact('exame'),compact('paciente'));
        return $pdf->setPaper('a5')->stream();
        
    }

    public function uploadArquivos(Request $request){

        session()->forget('fk_paciente_exame');
        $idMedico = $this->medico->getIdUserMedico(Auth::user()->id);
        if (isset($idMedico->medico_id)) {
            for($i=0 ; $i < count($request->id); $i++){
                if(isset($request->allfiles()['exames'][$i])){
                    $file = $request->allfiles()['exames'][$i];
                        if (empty($file)) {
                            abort(400, 'Nenhum arquivo foi enviado.');
                        }

                    $url = $file->store('exames','s3'); //grava no s3
                    $data['path'] =  Storage::disk('s3')->url($url);
                  //  $data['file_name'] =  basename($url);
                    $data['fk_exame'] = $request->id[$i];
                    $data['fk_medico'] =  $idMedico->medico_id; //tem que ser o medico autenticado  mudar//Alterado testar
                    $data['fk_paciente'] = $request->fk_paciente_exame;
                    $data['publicar'] = 0;
                    $data['fk_consulta'] = $request->consulta[$i];
                // var_dump($data);
                    session(['fk_paciente_exame' =>  $request->fk_paciente_exame]);
                    $this->resultado->create($data);
                // DB::table('resultado_exames')->insert($data);
                }
            }
        }
       return redirect()->route('listarResultadosExames');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
        $exames = $request->session()->get('exames');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
       foreach($exames as $j => $item){
          foreach($item as $i => $key){
            if( (int) $item[$i] ==   (int) $request['key']){
              array_diff_key($item, $i);
            }
          }
       }
        $request->session()->forget('exames');
        Session::put('exames', $exames);
        return view('pesquisa.receitaListagem');
    }
    public function getExames(){
       
        //Id do usuário
        $iduser = Auth::user()->id;
        //Id do paciente
        $idPaciente = $this->paciente->getIdUserPaciente($iduser);
        if(isset($idPaciente->paciente_id)){
            $resultado = $this->resultado->getResultadosPaciente($idPaciente->paciente_id);
        }else{

            $resultado = $this->resultado->getResultadosPaciente(null);
        }
        //chamar um view
        return view('consulta.componentes.examesPacienteUsuario', compact('resultado'), compact('idPaciente'));
        
    }
}
