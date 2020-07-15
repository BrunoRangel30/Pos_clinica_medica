<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Recepcionista;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RecepcionistaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $recep = DB::table('recepcionista as r')
        ->where('r.deleted_at','=', NULL)
        ->orderBy('r.created_at','desc')
        ->paginate(15);
        //return view('pesquisa.paciente',compact('paciente'));
        return view('pesquisa.recep',compact('recep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastro.recepcionista');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  dd($request);
        $validacao = $request->validate([
            'Nome_Recepcionista' => 'required|max:100',
            'email' => 'required|unique:users,email|max:100',
            'sexo' => 'required|max:100',
            'rg' => 'nullable|max:50',
            'org_emissor' => 'nullable|max:50',
            'cpf' => 'required|max:100',
            'data_de_nascimento' => 'required|max:100',
            'telefone_celular' => 'required|max:100',
            'idAdmisssao' => 'nullable|max:100',
            'nome_da_mae' => 'required|max:100',
            'idPai' => 'nullable|max:100',
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
        $data['name'] = $request->Nome_Recepcionista;
        $data['email'] = $request->email;
        $data['password'] =  Hash::make($request->senha);
        $users = DB::table('users')->insert($data);
         //cria objeto pacientes
         $recp = new Recepcionista([
            'nome' => $request->Nome_Recepcionista,
            'sexo' => $request->sexo,
            'rg' => $request->rg,
            'org_emissor'=>$request->org_emissor,
            'cpf' => $request->cpf,
            'data_nasc' => $request->data_de_nascimento,
            'tele_cel' => $request->telefone_celular,
            'tele_fixo' => $request->idFixo,
            'data_adm' => $request->idAdmisssao,
            'nome_mae' => $request->nome_da_mae,
            'nome_pai' => $request->idPai,
            'end_rua' => $request->rua,
            'end_nun_casa' => $request->numero,
            'end_bairro' => $request->bairro,
            'end_cidade' => $request->cidade,
            'end_estado' => $request->estado,
            'cep' => $request->cep,
            'obervacao' => $request->obervacao,
        ]);
        $user->getId($request->email)->recepcionista()->save($recp);
        $request->session()->flash('alert-success', 'Recepcionista adicionado com sucesso!');
        return redirect()->route('cadastro.recepcionista.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function show(Recepcionista $recepcionista)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function edit(Recepcionista $recepcionista)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recepcionista $recepcionista)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recepcionista $recepcionista)
    {
        //
    }
}
