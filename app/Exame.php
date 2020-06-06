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
}
