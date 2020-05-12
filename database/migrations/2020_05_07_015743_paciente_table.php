<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('paciente_id'); 
            $table->string('nome', 100); 
            $table->string('sexo', 100); 
            $table->string('rg', 50)->nullable(); 
            $table->string('org_emissor', 50)->nullable(); 
            $table->string('cpf', 11); 
            $table->date('data_nasc');
            $table->string('tele_cel', 100);
            $table->string('tele_fixo', 100)->nullable();
            $table->string('profissao', 100)->nullable();
            $table->string('n_plano', 100)->nullable();
            $table->string('nome_mae', 100);
            $table->string('nome_pai', 100)->nullable();
            $table->string('end_rua', 100);
            $table->string('end_nun_casa', 100);
            $table->string('end_bairro', 100);
            $table->string('end_cidade', 100);
            $table->string('end_estado', 100);
            $table->integer('cep', 100)->nullable();
            $table->longText('obervacao')>nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
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
