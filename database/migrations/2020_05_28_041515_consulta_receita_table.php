<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ConsultaReceitaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consulta_receita', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_consulta');
            $table->unsignedBigInteger('fk_receita');
            $table->foreign('fk_consulta')->references('consulta_id')->on('consulta');
            $table->foreign('fk_receita')->references('receita_id')->on('receita');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    //consulta exame
  /*  public function up()
    {
        Schema::create('consulta_exame', function (Blueprint $table) {
            $table->unsignedBigInteger('fk_consulta');
            $table->unsignedBigInteger('fk_exame');
            $table->foreign('fk_consulta')->references('consulta_id')->on('consulta');
            $table->foreign('fk_exame')->references('exame_id')->on('exame');
            $table->timestamps();
            $table->softDeletes();
        });
    }*/

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
