<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recepcionista extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recepcionista', function (Blueprint $table) {
            $table->id('recep_id'); 
            $table->string('nome', 100); 
            $table->string('sexo', 100); 
            $table->string('rg', 50)->nullable(); 
            $table->string('org_emissor', 50)->nullable(); 
            $table->string('cpf', 11); 
            $table->date('data_nasc');
            $table->string('tele_cel', 100);
            $table->string('tele_fixo', 100)->nullable();
            $table->date('data_adm');
            $table->string('nome_mae', 100);
            $table->string('nome_pai', 100)->nullable();
            $table->string('end_rua', 100);
            $table->string('end_nun_casa', 100);
            $table->string('end_bairro', 100);
            $table->string('end_cidade', 100);
            $table->string('end_estado', 100);
            $table->string('cep', 100)->nullable();
            $table->longText('obervacao')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->softDeletes();
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
