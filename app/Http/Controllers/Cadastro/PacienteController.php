<?php

namespace App\Http\Controllers\Cadastro;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\User;
use App\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $paciente = DB::table('pacientes as p')
        ->where('p.deleted_at','=', NULL)
        ->orderBy('p.created_at','desc')
        ->paginate(20);
        return view('pesquisa.paciente',compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $dataResult['route'] = 'cadastro.paciente.store';
        return view('cadastro.paciente');
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
            'nome_Paciente' => 'required|max:100',
            'email' => 'required|unique:users,email|max:100',
            'sexo' => 'required|max:100',
            'rg' => 'nullable|max:50',
            'org_emissor' => 'nullable|max:50',
            'cpf' => 'required|max:100',
            'data_de_nascimento' => 'required|max:100',
            'telefone_celular' => 'required|max:100',
            'idFixo' => 'nullable|max:100',
            'idPro' => 'nullable|max:100',
            'n_plano' => 'nullable|max:100',
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
        $data['name'] = $request->nome_Paciente;
        $data['email'] = $request->email;
        $data['password'] =  Hash::make($request->senha);
        $users = DB::table('users')->insert($data);
        //cria objeto pacientes
        $paciente = new Paciente([
            'nome' => $request->nome_Paciente,
            'sexo' => $request->sexo,
            'rg' => $request->rg,
            'org_emissor'=>$request->org_emissor,
            'cpf' => $request->cpf,
            'data_nasc' => $request->data_de_nascimento,
            'tele_cel' => $request->telefone_celular,
            'tele_fixo' => $request->idFixo,
            'profissao' => $request->idPro,
            'n_plano' => $request->n_plano,
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
        $user->getId($request->email)->paciente()->save($paciente);
        $request->session()->flash('alert-success', 'Cadastro adicionado com sucesso!');
        return redirect()->route('cadastro.paciente.index');
        
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
        //dd($id);
        $paciente =  new Paciente;
        $pacientedate= $paciente->getIdPaciente($id);
        $userDate = User::find($pacientedate->user_id);
        $dataResult= array();
        $dataResult['user'] = $userDate;
        $dataResult['paciente'] = $pacientedate;
        return view('edicao.paciente',$dataResult);
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
        //Recupera o paciente
        $user = new User;
        $pacData= Paciente::find($id);
        $validacao = $request->validate([
            'nome_Paciente' => 'required|max:100',
            'email' => ['required','max:100',Rule::unique('users', 'email')->ignore($pacData->user_id)],
            'sexo' => 'required|max:100',
            'rg' => 'nullable|max:50',
            'org_emissor' => 'nullable|max:50',
            'cpf' => 'required|max:100',
            'data_de_nascimento' => 'required|max:100',
            'telefone_celular' => 'required|max:100',
            'idFixo' => 'nullable|max:100',
            'idPro' => 'nullable|max:100',
            'n_plano' => 'nullable|max:100',
            'nome_da_mae' => 'required|max:100',
            'idPai' => 'nullable|max:100',
            'rua' => 'required|max:100',
            'numero' => 'required|max:100',
            'bairro' => 'required|max:100',
            'cidade' => 'required|max:100',
            'estado' => 'required|max:100',
            'cep' => 'nullable|max:100',
            'obervacao' => 'nullable|max:300',
        ]);

        //Insere atualizacoes usuário
        $data['name'] = $request->nome_Paciente;
        $data['email'] = $request->email;
        //Atualiza usuario
        $user->getUser($pacData->user_id)->update($data);
        //Insere dados paciente
        $pacData->nome = $request->nome_Paciente;
        $pacData->sexo = $request->sexo;
        $pacData->rg = $request->rg;
        $pacData->org_emissor = $request->org_emissor;
        $pacData->cpf = $request->cpf;
        $pacData->data_nasc = $request->data_de_nascimento;
        $pacData->tele_cel = $request->telefone_celular;
        $pacData->tele_fixo =  $request->idFixo;
        $pacData->profissao =  $request->idPro;
        $pacData->n_plano = $request->n_plano;
        $pacData->nome_mae = $request->nome_da_mae;
        $pacData->nome_pai = $request->idPai;
        $pacData->end_rua  = $request->rua;
        $pacData->end_nun_casa = $request->numero;
        $pacData->end_bairro =  $request->bairro;
        $pacData->end_cidade =  $request->cidade;
        $pacData->end_estado =  $request->estado;
        $pacData->cep = $request->cep;
        $pacData->obervacao =  $request->obervacao;
        $pacData->save(); //salva os dados
        $request->session()->flash('alert-success', 'Cadastro atualizado com sucesso!');
        return redirect()->route('cadastro.paciente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {   
       
        $pacienteDelete = Paciente::find($id);
        $pacienteDelete->delete();
        $request->session()->flash('alert-success', 'Usuário excluído com sucesso!');
        return redirect()->route('cadastro.paciente.index');
    }
}
