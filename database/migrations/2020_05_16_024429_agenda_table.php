<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgendaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agenda', function (Blueprint $table) {
            $table->id('agenda_id'); 
            $table->dateTime('inicio'); 
            $table->dateTime('fim');
            $table->string('tipo_consulta'); 
            $table->unsignedBigInteger('fk_paciente');
            $table->unsignedBigInteger('fk_medico');
            $table->string('user_log');
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
