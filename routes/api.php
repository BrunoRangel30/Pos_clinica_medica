<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/buscaMedicos', 'Consulta\AtendimentoController@pesquisaMedico');
//Route::get('/atualizarAgenda', 'Consulta\AtendimentoController@atualizarAgenda');
Route::post('/buscaPaciente', 'Consulta\AtendimentoController@pesquisaPaciente');
Route::post('/buscaMedicamento', 'Cadastro\MedicamentoController@buscaMedicamento');
Route::post('/buscaExame', 'Consulta\ExameController@buscaExame');
//Route::post('/InsereAgenda', 'Consulta\AtendimentoController@store');
