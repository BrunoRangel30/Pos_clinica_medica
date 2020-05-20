<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agenda extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'agenda_id';
    protected $table = 'agenda';

    public function getAgenda($idMed){
       // dd($idMed);
        $agenda = Agenda::where('fk_medico','=',$idMed)
                        ->get();
                        
        return $agenda;
    }

    
}
