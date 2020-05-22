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
            'data_nasc' => 'required|max:100',
            'tele_fixo' => 'nullable|max:100',
            'tele_cel' => 'required|max:100',
            'espec' => 'required|max:100',
            'espec_sec' => 'nullable|max:100',
            'end_rua' => 'required|max:100',
            'end_nun_casa' => 'required|max:100',
            'end_bairro' => 'required|max:100',
            'end_cidade' => 'required|max:100',
            'end_estado' => 'required|max:100',
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
            'data_nasc' => $request->data_nasc,
            'tele_cel' => $request->tele_cel,
            'tele_fixo' => $request->tele_fixo,
            'espec' => $request->espec,
            'crm' => $request->crm,
            'espec_sec' => $request->espec_sec,
            'end_rua' => $request->end_rua,
            'end_nun_casa' => $request->end_nun_casa,
            'end_bairro' => $request->end_bairro,
            'end_cidade' => $request->end_cidade,
            'end_estado' => $request->end_estado,
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
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
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
