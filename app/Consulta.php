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
    public function idConsulta(){
        $consulta = DB::table('consulta as c')
                     ->select('c.consulta_id')
                     ->orderBy('created_at','desc')
                     ->first(); 
                     return $consulta;
    }
}
