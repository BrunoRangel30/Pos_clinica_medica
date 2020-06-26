<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Exame extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'exame_id';
    protected $table = 'exame';

    public function getExame($key){
        $exame = Exame::where('nome_exame', 'like', '%' . $key . '%')
        ->get();
        return $exame;
    }
    public function getExameId($key){
        $exame = DB::table('exame as e')
                    ->where([['e.exame_id','=',$key],['e.nome_exame','!=','IS NULL']])
                    ->select('nome_exame as nome','exame_id as id')
                     ->get();
        return $exame;
    }
    public function getReceitaExame(){
      
        return $this->belongsToMany('App\Exame','consulta_exame','fk_exame','fk_consulta');
    }
    public function getExamePaciente($idPaciente){
        $exame = DB::table('consulta as c')
            ->join('consulta_exame as ag', 'ag.fk_consulta', '=', 'c.consulta_id')
            ->join('exame as e', 'e.exame_id', '=', 'ag.fk_exame')
            ->join('medicos as m', 'm.medico_id', '=', 'c.fk_medico')
            ->where('c.fk_paciente','=',$idPaciente)
            ->select('e.exame_id','e.nome_exame','c.created_at as dataSolici', 'c.consulta_id as id','m.crm','m.nome as medico','c.fk_medico')
            ->get(); 
        return $exame;
    }
}
