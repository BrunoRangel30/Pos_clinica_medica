<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class resultado_exames extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'resul_id';
    protected $table = 'resultado_exames';

    public function getResultados($idPaciente){
        $result = DB::table('resultado_exames as re')
           // ->join('pacientes as p', 'p.paciente_id', '=', 'rec.fk_paciente')
            ->rightjoin('medicos as m', 'm.medico_id', '=', 're.fk_medico')
            ->join('exame as e', 'e.exame_id', '=', 're.fk_exame')
            ->where('re.fk_paciente','=',$idPaciente)
            ->select('e.nome_exame','m.nome as medico','m.crm',
                  're.path as link','re.resul_id','re.created_at as dataInclusao')
            ->get();
        return $result;

    }
    
    public function possuiExameCadastrado($idExame, $idConsulta){
        $exame = DB::table('resultado_exames as re')
                     ->where([['re.fk_exame','=',$idExame],['re.fk_consulta','=',$idConsulta]])
                     ->select(DB::raw('COUNT(re.fk_exame) as totalExame'),DB::raw('COUNT(re.fk_consulta) as totalConsulta'))
                     ->first();
                     return $exame;
    }
}
