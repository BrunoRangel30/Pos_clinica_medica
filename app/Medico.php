<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medico extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'medico_id';

    public function getMedico($key){
        $medico = Medico::where('nome', 'like', '%' . $key . '%')
        ->get();
        return $medico;
    }
    public function agendaMedico(){
        return $this->hasMany('App\Agenda','fk_medico');
    }
    public function getIdMedico($id){
        $medico = Medico::where('medico_id', '=', $id)
                    ->first();
        return $medico;
     }
     public function getIdUserMedico($id){
        $medico = Medico::where('user_med_id', '=', $id)
                    ->first();
        return $medico;
     }
 
}
