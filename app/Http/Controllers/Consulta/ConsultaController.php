<?php

namespace App\Http\Controllers\Consulta;
use App\Consulta;
use App\Receita;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consulta.agenda');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $consulta = new Consulta;
        //Receita
        $receitaArray = session()->get('receita'); //receita
        $data= array();
        //Exames
        $examesArray = session()->get('exames');
        $dataEexames= array();
        //consulta
        $ConsultaArray= array();
        $date = date_create(date('Y/m/d'));
        $dataAtual = date_format($date, 'Y-m-d');
        //dados da consulta
        $ConsultaArray['inicio_consulta']= $dataAtual; //aqui mantem
        $ConsultaArray['fim_consulta']= $dataAtual;  //aqui mantem
        $ConsultaArray['fk_paciente']= session()->get('Idpaciente');
        $ConsultaArray['fk_medico']= session()->get('idMedico');
        $consulta->create($ConsultaArray);
        $idConsulta = $consulta->idConsulta();
       //dados da receita
       if( !empty($receitaArray)){
            foreach ($receitaArray as $key => $value) {
                $data['fk_medicamento']=$value['fk_medicamento'];
                $data['fk_medico']=$value['fk_medico'];
                $data['fk_paciente']=$value['fk_paciente'];
                $data['qtd']=$value['qtd'];
                $data['unidade']=$value['unidade'];
                $data['via']=$value['via'];
                $data['procedimento']=$value['procedimento'];
                $receita = Receita::create($data);
                //salva na tabela de intercalação
                $consulta->getConsultaReceita()->attach(['fk_receita' =>$receita->receita_id],['fk_consulta'=> $idConsulta->consulta_id]);
                $data= array();
            }
        }
        //Exames
        if( !empty($examesArray)){
            foreach ($examesArray as $key => $value) {
                foreach ($value as $key) {
                    $consulta->getConsultaExame()->attach(['fk_exame' =>$key],['fk_consulta'=> $idConsulta->consulta_id]);
                }
            }
        }
        return redirect()->route('consulta.paciente.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('pesquisa.receitaListagem');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function edit(Consulta $consulta)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Consulta  $consulta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
