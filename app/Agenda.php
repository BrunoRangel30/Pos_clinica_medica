<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Agenda extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'agenda_id';
    protected $table = 'agenda';

    public function getAgenda($idMed){
       $agenda = DB::table('agenda as ag')
               ->join('pacientes as p', 'p.paciente_id', '=', 'ag.fk_paciente')
               ->join('medicos as m', 'm.medico_id', '=', 'ag.fk_medico')
               ->where('ag.fk_medico','=',$idMed)
               ->select('start','end','p.nome as title','m.nome as medico','ag.tipo_consulta','ag.agenda_id as id','ag.fk_medico','p.paciente_id as fk_paciente')
               ->get(); 
        return $agenda;
    }

    
}
