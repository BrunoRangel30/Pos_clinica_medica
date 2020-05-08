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
        $paciente = DB::table('pacientes')->paginate(15);
        return view('pesquisa.paciente',compact('paciente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        dd($userDate, $pacientedate);
        return view('cadastro.paciente');
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
        dd($id);
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
