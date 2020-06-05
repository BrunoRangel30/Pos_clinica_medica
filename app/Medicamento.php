<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

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
    public function getMedicamentoById($key){
        $medicamento = DB::table('medicamento as med')
                    ->where([['med.med_id','=',$key],['med.deleted_at','=',NULL]])
                     ->select('med.nome_fabrica as nome')
                     ->get(); 
                     return $medicamento;
    }
}
