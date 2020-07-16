<?php

namespace App\Http\Controllers\medicamento;
namespace App\Http\Controllers\Cadastro;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use App\Medicamento;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $request;
    protected $user;
    protected $medicamento;

    public function __construct(Request $request) {
        $this->request = $request;
        $user = new User;
        $this->$user = $user; 
        $medicamento = new Medicamento;
        $this->$medicamento = $medicamento; 
    }
    public function index()
    {    
        $medicamento = DB::table('medicamento as m')
            ->where('m.deleted_at','=', NULL)
            ->orderBy('m.created_at','desc')
            ->paginate(15);
        return view('pesquisa.medicamento',compact('medicamento'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro.medicamento');
    }

    public function buscaMedicamento ()
    {
        $med = $this->request->input('key');
         $medicamento = new Medicamento;
        $resul = $medicamento->getMedicamento($med);
        return $resul;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $medicamentoDate= $request->all();

        $validacao = $request->validate([
            'nome_fabrica' => 'required|max:100',
            'laboratorio' => 'required|max:100',
            'lote_med' => 'required|max:100',
        ]);

        $medicamentoDate['user_log'] = Auth::user()->id;
        //cadastra no banco 
        $medicamento = new Medicamento;
        $medicamento->create($medicamentoDate);

        return redirect()->route('cadastro.medicamento.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function show(Medicamento $medicamento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $med =  new Medicamento;
        $med= Medicamento::find($id);
        $dataResult= array();
        $dataResult['medicamento'] = $med;
        return view('edicao.medicamento',$dataResult);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd('chamou');
        $med= Medicamento::find($id);
        $validacao = $request->validate([
            'nome_fabrica' => 'required|max:100',
            'laboratorio' => 'required|max:100',
            'lote_med' => 'required|max:100',
            'descricao' => 'nullable|max:100',
        ]);

        $med->nome_fabrica = $request->nome_fabrica;
        $med->laboratorio = $request->laboratorio;
        $med->lote_med = $request->lote_med;
        $med->lote_med = $request->lote_med;
        $med->tarja = $request->tarja;
        $med->descricao = $request->descricao;
        $med->save();
        $request->session()->flash('alert-success', 'Cadastro atualizado com sucesso!');
        return redirect()->route('cadastro.medicamento.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicamento  $medicamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $med= Medicamento::find($id);
        $med->delete();
        $request->session()->flash('alert-success', 'Cadastro excluído com sucesso!');
        return redirect()->route('cadastro.medicamento.index');
    }
}
