<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{   
    
    protected $guarded = [];

    protected $primaryKey = 'paciente_id';

    public function getIdPaciente($id){
        $paciente = Paciente::where('paciente_id', '=', $id)
                    ->first();
        return $paciente;
     } 

     
}
