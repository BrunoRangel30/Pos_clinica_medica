<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultadoExames extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultado_exames', function (Blueprint $table) {
            $table->id('resul_id'); 
            $table->string('path'); 
            $table->boolean('publicar');
            $table->unsignedBigInteger('fk_paciente');
            $table->unsignedBigInteger('fk_medico');
            $table->unsignedBigInteger('fk_exame');
            $table->unsignedBigInteger('fk_consulta');
            $table->foreign('fk_paciente')->references('paciente_id')->on('pacientes');
            $table->foreign('fk_medico')->references('medico_id')->on('medicos');
            $table->foreign('fk_exame')->references('exame_id')->on('exame');
            $table->foreign('fk_consulta')->references('consulta_id')->on('consulta');
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
