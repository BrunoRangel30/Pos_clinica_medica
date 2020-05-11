<?php

namespace App\Http\Controllers\Cadastro;
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'sexo' => 'nullable|numeric',
        ]);
        $user = new User;
        $data= array();
        $data['name'] = $request->nomePaciente;
        $data['email'] = $request->idEmail;
        $data['password'] =  Hash::make($request->idsenha);
        $users = DB::table('users')->insert($data);
        //cria objeto pacientes
        $paciente = new Paciente([
            'nome' => $request->nomePaciente,
            'sexo' => $request->idSexo,
            'rg' => $request->idRg,
            'org_emissor'=>$request->idOrg,
            'cpf' => $request->idCPF,
            'data_nasc' => $request->idNascimento,
            'tele_cel' => $request->idCel,
            'tele_fixo' => $request->idFixo,
            'profissao' => $request->idPro,
            'n_plano' => $request->idPlano,
            'nome_mae' => $request->idMae,
            'nome_pai' => $request->idPai,
            'end_rua' => $request->idRua,
            'end_nun_casa' => $request->idNum,
            'end_bairro' => $request->idBairro,
            'end_cidade' => $request->idCidade,
            'end_estado' => $request->idEstado,
            'cep' => $request->idCep,
            'obervacao' => $request->idObservacao,
        ]);
        $user->getId($request->idEmail)->paciente()->save($paciente);
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
