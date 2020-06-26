<?php

namespace App\Http\Controllers\Consulta;
use Illuminate\Support\Facades\DB;
use App\Consulta;
use App\Exame;
use App\resultado_exames;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PDF;
use Session;

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
    


    public function __construct(Request $request) {
        $this->request = $request;
        $this->exame = new Exame;
        $consulta = new Consulta;
        $this->consulta = $consulta;
         
    }
    public function index()
    {
        return view('pesquisa.exameListagem');
    }
    
    public function listarResultadosExames(Request $request){
        $resultado_exames = new resultado_exames;
        $idpaciente = $request->session()->get('fk_paciente_exame');
        $resultado = $resultado_exames->getResultados($idpaciente);
      //  dd( $idpaciente);
      return view('pesquisa.resultadoExameListagem', compact('resultado'));

        //dd($idpaciente);
    }
    public function listarResultadosExamesMenu(Request $request){
        $resultado_exames = new resultado_exames;
       // $idpaciente = $request->session()->get('fk_paciente_exame');
       //$exames = $this->exame->getExamePaciente($request['id']);
    //   dd($request['id']);
        $resultado = $resultado_exames->getResultados($request['id']);
      //  dd( $idpaciente);
      return view('consulta.componentes.resultadoExamesSubmenu', compact('resultado'));

        //dd($idpaciente);
    }

    public function listagemResultados()
    {
       // return view('pesquisa.exameListagem');
       return view('consulta.consultaExameIndex');
    }

    public function getExamesPedidos(Request $request)
    {
       $exames = $this->exame->getExamePaciente($request['id']);
       return view('consulta.componentes.resultadosExames', compact('exames'));
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
       
        $input = array();
        $input = $request->all();
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
        
        $exame = $this->consulta->nomeExame( $request['idConsulta']);
        $pdf = PDF::loadView('consulta.componentes.examesPDF',compact('exame'));
        return $pdf->setPaper('a5')->stream();
        
    }

    public function uploadArquivos(Request $request){
         session()->forget('fk_paciente_exame');
    //   dd($request->allfiles());
        for($i=0 ; $i < count($request->id); $i++){
            if(isset($request->allfiles()['exames'][$i])){
                $file = $request->allfiles()['exames'][$i];
                $data['path'] =  $file->store('exames');
                $data['fk_exame'] = $request->id[$i];
                $data['fk_medico'] = $request->fk_medico; //tem que ser o medico autenticado  mudar
                $data['fk_paciente'] = $request->fk_paciente_exame;
                $data['publicar'] = true;
                $data['fk_consulta'] = $request->consulta[$i];
                var_dump($data);
                session(['fk_paciente_exame' =>  $request->fk_paciente_exame]);
                DB::table('resultado_exames')->insert($data);
            }else{
            };
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
        $teste;
       // dd($exames[1]);
       //dd($exames);
    //  dd($request['key']);
       foreach($exames as $j => $item){
          
          foreach($item as $i => $key){
              //dd($i);
            if( (int) $item[$i] ==   (int) $request['key']){
              //  dd($i);
              array_diff_key($item, $i);
                //array_unshift($item);
              
            }
          }
       }
     //  dd($exames);
        $request->session()->forget('exames');
        Session::put('exames', $exames);
        return view('pesquisa.receitaListagem');
    }
}
