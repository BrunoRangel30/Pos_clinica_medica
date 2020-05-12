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
        ->paginate(15);
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
            'CPF' => 'required|max:100',
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
            'cep' => 'nullable|size:100|integer',
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
            'rg' => $request->idRg,
            'org_emissor'=>$request->idOrg,
            'cpf' => $request->CPF,
            'data_nasc' => $request->data_de_nascimento,
            'tele_cel' => $request->telefone_celular,
            'tele_fixo' => $request->idFixo,
            'profissao' => $request->idPro,
            'n_plano' => $request->idPlano,
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

        //Insere atualizacoes usuário
        $data['name'] = $request->nomePaciente;
        $data['email'] = $request->idEmail;
        //Atualiza usuario
        $user->getUser($pacData->user_id)->update($data);
        //Insere dados paciente
        $pacData->nome = $request->nomePaciente;
        $pacData->sexo = $request->idSexo;
        $pacData->rg = $request->idRg;
        $pacData->org_emissor = $request->idOrg;
        $pacData->cpf = $request->idCPF;
        $pacData->data_nasc = $request->idNascimento;
        $pacData->tele_cel = $request->idCel;
        $pacData->tele_fixo =  $request->idFixo;
        $pacData->profissao =  $request->idPro;
        $pacData->n_plano = $request->idPlano;
        $pacData->nome_mae = $request->idMae;
        $pacData->nome_pai = $request->idPai;
        $pacData->end_rua  = $request->idRua;
        $pacData->end_nun_casa = $request->idNum;
        $pacData->end_bairro =  $request->idBairro;
        $pacData->end_cidade =  $request->idCidade;
        $pacData->end_estado =  $request->idEstado;
        $pacData->cep = $request->idCep;
        $pacData->obervacao =  $request->idObservacao;
        $pacData->save(); //salva os dados
        return redirect()->route('cadastro.paciente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $pacienteDelete = Paciente::find($id);
        $pacienteDelete->delete();
        return redirect()->route('cadastro.paciente.index');
    }
}
