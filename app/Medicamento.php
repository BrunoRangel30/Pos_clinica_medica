<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicamento extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $guarded = [];
    protected $primaryKey = 'med_id';
    protected $table = 'medicamento';

    public function getMedicamento($key){
        $medicamento = Medicamento::where('nome_fabrica', 'like', '%' . $key . '%')
        ->get();
        return $medicamento;
    }
}
