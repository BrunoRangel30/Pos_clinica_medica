<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MedicoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id('medico_id'); 
            $table->string('nome', 100); 
            $table->string('sexo', 100); 
            $table->string('cpf', 100); 
            $table->string('crm', 100); 
            $table->date('data_nasc');
            $table->string('tele_cel', 100);
            $table->string('tele_fixo', 100)->nullable();
            $table->string('espec', 100);
            $table->string('espec_sec', 100)->nullable();
            $table->string('end_rua', 100);
            $table->string('end_nun_casa', 100);
            $table->string('end_bairro', 100);
            $table->string('end_cidade', 100);
            $table->string('end_estado', 100);
            $table->string('cep', 100)->nullable();
            $table->longText('obervacao')->nullable();
            $table->string('user_log');
            $table->unsignedBigInteger('user_med_id');
            $table->foreign('user_med_id')->references('id')->on('users');
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
