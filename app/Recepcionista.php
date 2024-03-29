<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recepcionista extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'recep_id';
    protected $table = 'recepcionista';

    public function getIdRecp($id){
        $recep = Recepcionista::where('recep_id', '=', $id)
                    ->first();
        return $recep;
     }
}
