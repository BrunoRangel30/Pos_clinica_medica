<?php

namespace App\Http\Controllers\Cadastro;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Medico;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;


class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $medico = DB::table('medicos as m')
        ->where('m.deleted_at','=', NULL)
        ->orderBy('m.created_at','desc')
        ->paginate(15);
        return view('pesquisa.medico',compact('medico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro.medico');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $validacao = $request->validate([
            'nome' => 'required|max:100',
            'email' => 'required|unique:users,email|max:100',
            'sexo' => 'required|max:100',
            'cpf' => 'required|max:100',
            'crm' => 'required|max:100',
            'data_de_nascimento' => 'required|max:100',
            'telefone_fixo' => 'nullable|max:100',
            'telefone_celular' => 'required|max:100',
            'especialidade' => 'required|max:100',
            'espec_sec' => 'nullable|max:100',
            'rua' => 'required|max:100',
            'numero' => 'required|max:100',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:100',
            'estado' => 'required|max:100',
            'cep' => 'nullable|max:100',
            'obervacao' => 'nullable|max:300',
            'senha' => 'required|max:100',
            'senha_confirmacao' => 'required|same:senha',
        ]);
       
        $user = new User;
        $data= array();
        $data['name'] = $request->nome;
        $data['email'] = $request->email;
        $data['password'] =  Hash::make($request->senha);
        $users = DB::table('users')->insert($data);

        //cria objeto Medico
        $medico = new medico([
            'nome' => $request->nome,
            'sexo' => $request->sexo,
            'cpf' => $request->cpf,
            'data_nasc' => $request->data_de_nascimento,
            'tele_cel' => $request->telefone_celular,
            'tele_fixo' => $request->telefone_fixo,
            'espec' => $request->especialidade,
            'crm' => $request->crm,
            'espec_sec' => $request->espec_sec,
            'end_rua' => $request->rua,
            'end_nun_casa' => $request->numero,
            'end_bairro' => $request->bairro,
            'end_cidade' => $request->cidade,
            'end_estado' => $request->estado,
            'cep' => $request->cep,
            'obervacao' => $request->obervacao,
            'user_log' => Auth::user()->id
        ]);
        $user->getId($request->email)->medico()->save($medico);
        $request->session()->flash('alert-success', 'Médico adicionado com sucesso!');
        return redirect()->route('cadastro.medico.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $medico =  new medico;
        $medicodate= $medico->getIdMedico($id);
        $userDate = User::find($medicodate->user_med_id);
        $dataResult= array();
        $dataResult['user'] = $userDate;
        $dataResult['medico'] = $medicodate;
        return view('edicao.medico',$dataResult);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       // dd($request);
        $user = new User;
        $MedData= Medico::find($id);
        $validacao = $request->validate([
            'nome' => 'required|max:100',
            'email' => ['required','max:100',Rule::unique('users', 'email')->ignore($MedData->user_med_id)],
            'sexo' => 'required|max:100',
            'cpf' => 'required|max:100',
            'crm' => 'required|max:100',
            'data_de_nascimento' => 'required|max:100',
            'telefone_fixo' => 'nullable|max:100',
            'telefone_celular' => 'required|max:100',
            'especialidade' => 'required|max:100',
            'espec_sec' => 'nullable|max:100',
            'rua' => 'required|max:100',
            'numero' => 'required|max:100',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:100',
            'estado' => 'required|max:100',
            'cep' => 'nullable|max:100',
            'obervacao' => 'nullable|max:300',
        ]);
       
        $user = new User;
        $data= array();
        $data['name'] = $request->nome;
        $data['email'] = $request->email;
        $user->getUser($MedData->user_med_id)->update($data);

        //cria objeto Medico
        $MedData->nome = $request->nome;
        $MedData->sexo = $request->sexo;
        $MedData->cpf = $request->cpf;
        $MedData->data_nasc = $request->data_de_nascimento;
        $MedData->tele_cel = $request->telefone_celular;
        $MedData->tele_fixo = $request->telefone_fixo;
        $MedData->espec = $request->especialidade;
        $MedData->crm = $request->crm;
        $MedData->espec_sec = $request->espec_sec;
        $MedData->end_rua = $request->rua;
        $MedData->end_nun_casa = $request->numero;
        $MedData->end_bairro = $request->bairro;
        $MedData->end_cidade = $request->cidade;
        $MedData->end_estado = $request->estado;
        $MedData->cep = $request->cep;
        $MedData->obervacao = $request->obervacao;
        $MedData->user_log = Auth::user()->id;
        //dd( $MedData->nome);
        $MedData->save();

        $request->session()->flash('alert-success', 'Médico atualizado com sucesso!');
        return redirect()->route('cadastro.medico.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
