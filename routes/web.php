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
Route::get('excluir/user/', 'Perfil\UsersController@destroy')->name('excluirUser');
//Rotas para cadastro
Route::namespace('Cadastro')->prefix('cadastro')->name('cadastro.')->middleware('can:recep')->group(function(){
    Route::resource('/paciente', 'PacienteController');
    Route::resource('/medico', 'MedicoController');
    Route::resource('/recepcionista', 'RecepcionistaController');
    Route::resource('/medicamento', 'MedicamentoController');
});
Route::get('paciente/{id}', 'Cadastro\PacienteController@destroy')->name('cadastro.paciente.destroy');//excluir paciente
Route::get('medico/{id}', 'Cadastro\MedicoController@destroy')->name('cadastro.medico.destroy'); //excluir medico
Route::get('recepcionista/{id}', 'Cadastro\RecepcionistaController@destroy')->name('cadastro.recepcionista.destroy'); //excluir recepcionista
Route::get('medicamento/{id}', 'Cadastro\MedicamentoController@destroy')->name('cadastro.medicamento.destroy'); //excluir medicamento
//Rotas para exibição
Route::namespace('Cadastro')->prefix('listar')->name('listar.')->middleware('can:recep')->group(function(){
    Route::resource('/paciente', 'PacienteController');
    Route::resource('/medico', 'MedicoController');
    Route::resource('/recepcionista', 'RecepcionistaController');
    Route::resource('/medicamento', 'MedicamentoController');
});
//Rotas para Consulta
Route::namespace('Consulta')->prefix('consulta')->name('consulta.')->group(function(){
    Route::resource('/agenda', 'ConsultaController')->middleware("can:recep");
    Route::resource('/paciente', 'AtendimentoController')->middleware("can:medico");
    Route::resource('/receita', 'ReceitaController')->middleware("can:medico");
    Route::resource('/exame', 'ExameController')->middleware("can:medico"); 
    
});
//Resultados exames
Route::get('resultadosExames', 'Consulta\ExameController@listagemResultados')->name('resultadosExames');
Route::post('buscaResultados', 'Consulta\ExameController@getExamesPedidos');
Route::post('uploadResultados', 'Consulta\ExameController@uploadArquivos')->name('uploadResultados')->middleware('can:medico');//Precisa de autorização
Route::get('listarResultadosExames', 'Consulta\ExameController@listarResultadosExames')->name('listarResultadosExames');
Route::post('VisualizarResultadosMenu', 'Consulta\ExameController@listarResultadosExamesMenu')->name('listarResultadosExamesMenu');

Route::get('editar/receita/{key}', 'Consulta\ReceitaController@edit')->name('editarReceita');
Route::get('excluir/receita/{key}', 'Consulta\ReceitaController@destroy')->name('excluirReceita');
Route::get('editar/exame/{key}', 'Consulta\ExameController@edit')->name('editarExame');
Route::get('consuta/resumoConsulta', 'Consulta\ConsultaController@show')->name('resumoConsulta');
Route::get('consuta/salvarConsulta', 'Consulta\ConsultaController@store')->name('salvarConsulta');
Route::post('consulta/InsereAgenda', 'Consulta\AtendimentoController@store')->middleware('can:recep');
Route::put('consulta/AtualizarAgendaEdicao', 'Consulta\AtendimentoController@update')->middleware('can:recep');
Route::get('/atualizarAgenda', 'Consulta\AtendimentoController@atualizarAgenda')->middleware('can:recep');
Route::get('consuta/index/', 'Consulta\AtendimentoController@consulta')->name('realizarConsulta')->middleware('can:medico');
Route::get('/paciente/historico', 'Historico\HistoricoPacienteController@index')->name('historico.paciente');
Route::delete('/consulta/ExcluirAgenda', 'Consulta\AtendimentoController@destroy')->middleware('can:recep');
//Exames
Route::namespace('Exame')->prefix('exame')->name('exame.')->middleware('can:medico')->group(function(){
    Route::resource('/index', 'ExameListController');
    
});
//Resultados de exames Pacientes
Route::get('/indexPaciente', 'Consulta\ExameController@getExames')->name('indexPaciente')->middleware('can:user');
//Home
Route::get('/home', 'HomeController@index')->name('home');
//Impressão de PDF
Route::get('pdfExame/', 'Consulta\ExameController@ExamePdf')->name('pdfExame');
Route::get('enviarEmail/', 'Consulta\ExameController@enviarEmailExame')->name('enviarEmail'); //email
Route::get('/pdfReceita', 'Consulta\ReceitaController@ReceitaPdf')->name('pdfReceita');
