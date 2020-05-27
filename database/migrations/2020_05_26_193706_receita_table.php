<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ReceitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receita', function (Blueprint $table) {
            $table->id('receita_id'); 
            $table->string('qtd'); 
            $table->string('unidade');
            $table->string('via');
            $table->longText('procedimento');
            $table->unsignedBigInteger('fk_paciente');
            $table->unsignedBigInteger('fk_medico');
            $table->unsignedBigInteger('fk_medicamento');
            $table->foreign('fk_paciente')->references('paciente_id')->on('pacientes');
            $table->foreign('fk_medico')->references('medico_id')->on('medicos');
            $table->foreign('fk_medicamento')->references('med_id')->on('medicamento');
            $table->timestamps();
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
