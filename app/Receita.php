<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Receita extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'receita_id';
    protected $table = 'receita';

    public function getReceita($idPaciente,$idMedico){
        $receita = DB::table('receita as rec')
            ->join('pacientes as p', 'p.paciente_id', '=', 'rec.fk_paciente')
            ->join('medicos as m', 'm.medico_id', '=', 'rec.fk_medico')
            ->join('medicamento as med', 'med.med_id', '=', 'rec.fk_medicamento')
            ->where([['rec.fk_medico','=',$idMedico],['rec.fk_paciente','=',$idPaciente]])
            ->select('med.nome_fabrica','p.nome as nomePaciente','p.cpf',
            'p.data_nasc','p.paciente_id','m.cpf','m.crm','m.nome as medico',
            'rec.qtd','rec.unidade','rec.via','rec.procedimento')
            ->get();
        return $receita;

    }
}
