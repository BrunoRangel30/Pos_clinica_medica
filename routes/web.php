<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
//Rotas para Perfil
Route::namespace('Perfil')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function(){
    Route::resource('/users', 'UsersController');
});
//Rotas para cadastro
Route::namespace('Cadastro')->prefix('cadastro')->name('cadastro.')->middleware('can:admin')->group(function(){
    Route::resource('/paciente', 'PacienteController');
    Route::resource('/medico', 'MedicoController');
    Route::resource('/recepcionista', 'RecepcionistaController');
    Route::resource('/medicamento', 'MedicamentoController');
});
Route::get('paciente/{id}', 'Cadastro\PacienteController@destroy')->name('cadastro.paciente.destroy');
//Rotas para exibição
Route::namespace('Cadastro')->prefix('listar')->name('listar.')->middleware('can:admin')->group(function(){
    Route::resource('/paciente', 'PacienteController');
    Route::resource('/medico', 'MedicoController');
    Route::resource('/recepcionista', 'RecepcionistaController');
    Route::resource('/medicamento', 'MedicamentoController');
});
//Rotas para Consulta
Route::namespace('Consulta')->prefix('consulta')->name('consulta.')->middleware('can:admin')->group(function(){
    Route::resource('/agenda', 'ConsultaController');
    Route::resource('/paciente', 'AtendimentoController');
    Route::resource('/receita', 'ReceitaController');
    Route::resource('/exame', 'ExameController'); 
    
});
Route::get('editar/receita/{key}', 'Consulta\ReceitaController@edit')->name('editarReceita');
Route::get('excluir/receita/{key}', 'Consulta\ReceitaController@destroy')->name('excluirReceita');
Route::get('consuta/resumoConsulta', 'Consulta\ConsultaController@show')->name('resumoConsulta');
Route::get('consuta/salvarConsulta', 'Consulta\ConsultaController@store')->name('salvarConsulta');
Route::post('consulta/InsereAgenda', 'Consulta\AtendimentoController@store')->middleware('can:admin');
Route::put('consulta/AtualizarAgenda', 'Consulta\AtendimentoController@update')->middleware('can:admin');
Route::get('consuta/index/', 'Consulta\AtendimentoController@consulta')->name('realizarConsulta');
Route::get('/paciente/historico', 'Historico\HistoricoPacienteController@index')->name('historico.paciente');
Route::delete('/consulta/ExcluirAgenda', 'Consulta\AtendimentoController@destroy')->middleware('can:admin');
//Exames
Route::namespace('Exame')->prefix('exame')->name('exame.')->middleware('can:admin')->group(function(){
    Route::resource('/index', 'ExameListController');
    
});
//Home
Route::get('/home', 'HomeController@index')->name('home');
//Impressão de PDF
Route::get('pdfExame/', 'Consulta\ExameController@ExamePdf')->name('pdfExame');
Route::get('/pdfReceita', 'Consulta\ReceitaController@ReceitaPdf')->name('pdfReceita');
