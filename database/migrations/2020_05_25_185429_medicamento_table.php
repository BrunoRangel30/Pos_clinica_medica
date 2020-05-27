<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicamento', function (Blueprint $table) {
            $table->id('med_id'); 
            $table->string('nome_generico')->nullable(); 
            $table->string('nome_fabrica');
            $table->string('laboratorio'); 
            $table->string('lote_med');
            $table->string('tarja')->nullable();
            $table->string('descricao')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
