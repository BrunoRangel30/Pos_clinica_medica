<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paciente extends Model
{   
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'paciente_id';

    public function getIdPaciente($id){
        $paciente = Paciente::where('paciente_id', '=', $id)
                    ->first();
        return $paciente;
     }
     
     public function getPaciente($key){
        $paciente = Paciente::where('nome', 'like', '%' . $key . '%')
        ->get();
        return $paciente;
    }

     
}
