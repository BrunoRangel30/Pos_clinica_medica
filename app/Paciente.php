<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{   
    
    protected $guarded = [];

    public function getIdPaciente($id){
        $paciente = Paciente::where('paciente_id', '=', $id)
                    ->first();
        return $paciente;
     } 
}
