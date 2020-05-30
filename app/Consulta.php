<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consulta extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'consulta_id';
    protected $table = 'consulta';

    public function getReceitaConsulta(){
        return $this->belongsToMany('App\Receita','consulta_id','receita_id');
    }
}
