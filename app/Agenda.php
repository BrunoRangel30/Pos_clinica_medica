<?php

namespace App;
use Medico;
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

    public function getAgenda($idMed,$start,$end){
       $agenda = DB::table('agenda as ag')
               //->join('pacientes as p', 'p.paciente_id', '=', 'ag.fk_paciente')
               ->join('medicos as m', 'm.medico_id', '=', 'ag.fk_medico')
               ->where([['ag.fk_medico','=',$idMed],['ag.deleted_at','=',NULL]])
               ->whereBetween('start', [$start, $end])
               ->select('start','end','title','m.nome as medico','ag.tipo_consulta','ag.agenda_id as id','ag.fk_medico','ag.fk_paciente')
               ->get(); 
              // dd( $agenda);
        return $agenda;
    }

    public function getAgendaDiaro($dataAtual){

        $agenda = DB::table('agenda as ag')
               ->join('pacientes as p', 'p.paciente_id', '=', 'ag.fk_paciente')
               ->join('medicos as m', 'm.medico_id', '=', 'ag.fk_medico')
               ->leftjoin('consulta as c', 'c.fk_paciente', '=', 'ag.fk_paciente')
               ->where([['ag.fk_medico','=','2'],['ag.deleted_at','=',NULL]])
               ->whereDate('ag.start', $dataAtual)
               ->select('start','end','p.nome as nomePaciente','p.cpf','p.data_nasc','p.paciente_id','m.cpf','m.crm','m.nome as medico','ag.tipo_consulta','ag.agenda_id as id','ag.fk_medico','p.paciente_id as fk_paciente')
               ->orderBy('c.created_at','desc')
               ->distinct('p.paciente_id')->get();
        return $agenda;
    }

    public function getPacienteMedico($idMedico,$idPaciente){
        $paciente = DB::table('agenda as ag')
               ->join('pacientes as p', 'p.paciente_id', '=', 'ag.fk_paciente')
               ->join('medicos as m', 'm.medico_id', '=', 'ag.fk_medico')
               ->where([['ag.fk_medico','=',$idMedico],['ag.fk_paciente','=',$idPaciente]])
               ->select('start','end','p.nome as nomePaciente','p.cpf','p.data_nasc','p.paciente_id','m.cpf','m.crm','m.nome as medico','ag.tipo_consulta','ag.agenda_id as id','ag.fk_medico','p.paciente_id as fk_paciente')
               ->get(); 
        return $paciente;
    }

    
}
