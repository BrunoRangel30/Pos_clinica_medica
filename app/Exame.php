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
                    ->select('nome_exame as nome')
                     ->get();
        return $exame;
    }
    public function getReceitaExame(){
      
        return $this->belongsToMany('App\Exame','consulta_exame','fk_exame','fk_consulta');
    }
}
