<?php

namespace App\Http\Controllers\Cadastro;

use App\Http\Controllers\Controller;
use App\Recepcionista;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

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
        $request->session()->flash('alert-success', 'Cadastro adicionado com sucesso!');
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
    public function edit( $id)
    {
        $recep =  new Recepcionista;
        $recepDate= $recep->getIdRecp($id);
        $userDate = User::find($recepDate->user_id);
        $dataResult= array();
        $dataResult['user'] = $userDate;
        $dataResult['recepcionista'] = $recepDate;
        return view('edicao.recepcionista',$dataResult);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $user = new User;
        $recepData= Recepcionista::find($id);
        $validacao = $request->validate([
            'Nome_Recepcionista' => 'required|max:100',
            'email' => ['required','max:100',Rule::unique('users', 'email')->ignore($recepData->user_id)],
            'sexo' => 'required|max:100',
            'cpf' => 'required|max:100',
            'rg' => 'nullable|max:100',
            'org_emissor'=>'nullable|max:100',
            'data_de_nascimento' => 'required|max:100',
            'nome_mae' => 'required|max:100',
            'nome_pai' => 'nullable|max:100',
            'telefone_fixo' => 'nullable|max:100',
            'telefone_celular' => 'required|max:100',
            'idAdmisssao' => 'nullable|max:100',
            'rua' => 'required|max:100',
            'numero' => 'required|max:100',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:100',
            'estado' => 'required|max:100',
            'cep' => 'nullable|max:100',
            'obervacao' => 'nullable|max:300',
        ]);
      /// dd('inferno');
        $user = new User;
        $data= array();
        $data['name'] = $request->Nome_Recepcionista;
        $data['email'] = $request->email;
        $user->getUser($recepData->user_id)->update($data);
        $recepData->nome = $request->Nome_Recepcionista;
        $recepData->sexo = $request->sexo;
        $recepData->cpf = $request->cpf;
        $recepData->data_nasc = $request->data_de_nascimento;
        $recepData->nome_mae = $request->nome_mae;
        $recepData->nome_pai = $request->nome_pai;
        $recepData->tele_cel = $request->telefone_celular;
        $recepData->tele_fixo = $request->telefone_fixo;
        $recepData->data_adm = $request->idAdmisssao;
        $recepData->end_rua = $request->rua;
        $recepData->end_nun_casa = $request->numero;
        $recepData->end_bairro = $request->bairro;
        $recepData->end_cidade = $request->cidade;
        $recepData->end_estado = $request->estado;
        $recepData->cep = $request->cep;
        $recepData->obervacao = $request->obervacao;
        $recepData->save();
        $request->session()->flash('alert-success', 'Cadastro atualizado com sucesso!');
        return redirect()->route('cadastro.recepcionista.index');
       // dd($recepData);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recepcionista  $recepcionista
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request, $id)
    {
        $recepData= Recepcionista::find($id);
        $recepData->delete();
        $request->session()->flash('alert-success', 'Cadastro excluído com sucesso!');
        return redirect()->route('cadastro.recepcionista.index');
    }
}
