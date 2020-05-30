<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConsultaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta', function (Blueprint $table) {
            $table->id('consulta_id'); 
            $table->dateTime('inicio_consulta'); 
            $table->dateTime('fim_consulta');
            $table->unsignedBigInteger('fk_paciente');
            $table->unsignedBigInteger('fk_medico');
            $table->foreign('fk_paciente')->references('paciente_id')->on('pacientes');
            $table->foreign('fk_medico')->references('medico_id')->on('medicos');
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
