<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Consulta extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey ='consulta_id ';
    protected $table = 'consulta';

    public function getConsultaReceita(){
        return $this->belongsToMany('App\Receita','consulta_receita','fk_consulta','fk_receita');
    }

    public function getConsultaExame(){
        return $this->belongsToMany('App\Exame','consulta_exame','fk_consulta','fk_exame');
    }
    public function idConsulta(){
        $consulta = DB::table('consulta as c')
                     ->select('c.consulta_id')
                     ->orderBy('created_at','desc')
                     ->first(); 
                     return $consulta;
    }
      public function possuiConsulta($key){
        $consulta = DB::table('consulta as c')
                     ->where('c.fk_paciente','=',$key)
                     ->select(DB::raw('COUNT(c.fk_paciente) as total'))
                     ->first();
                     return $consulta;
    }

    public function getReceitaPaciente($id){
        $pacienteConsulta = DB::table('consulta as c')
                            ->join('consulta_receita as rc','c.consulta_id','=','rc.fk_consulta')
                            ->join('receita as re','re.receita_id','=','rc.fk_receita')
                            ->join('medicamento as m','re.fk_medicamento','=','m.med_id')
                            ->where('c.fk_paciente','=',$id)
                            ->select('re.qtd','m.nome_fabrica','re.via','re.procedimento','re.unidade','c.consulta_id as id')
                            ->get();
       return $pacienteConsulta;
    }

    public function getExamePaciente($id){
        $pacienteExame = DB::table('consulta as c')
                            ->join('consulta_exame as ce','c.consulta_id','=','ce.fk_consulta')
                            ->orderBy('c.created_at','desc')
                            ->where('c.fk_paciente','=',$id)
                            ->select('ce.fk_consulta','c.created_at')
                            ->groupBy('ce.fk_consulta','c.created_at')
                            ->get();
       return $pacienteExame;

    }

    public function nomeExame($id){
        $NomeExame = DB::table('consulta_exame as ce')
                            ->join('exame as e','e.exame_id','=','ce.fk_exame')
                            ->select('e.nome_exame as exame')
                            ->where([['ce.fk_consulta','=',$id]])
                            ->get();
       return $NomeExame;
    }

    public function getReceita($id){
        $NomeReceita = DB::table('consulta_receita as rc')
                            ->join('receita as re','re.receita_id','=','rc.fk_receita')
                            ->join('medicamento as m','re.fk_medicamento','=','m.med_id')
                            ->select('re.qtd','m.nome_fabrica','re.via','re.procedimento','re.unidade')
                            ->where([['rc.fk_consulta','=',$id]])
                            ->get();
       return $NomeReceita;
    }
    

}
