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

Route::namespace('Perfil')->prefix('admin')->name('admin.')->middleware('can:admin')->group(function(){
    Route::resource('/users', 'UsersController');
});

Route::namespace('Cadastro')->prefix('cadastro')->name('cadastro.')->middleware('can:admin')->group(function(){
    Route::resource('/paciente', 'PacienteController');
    Route::resource('/medico', 'MedicoController');
});
Route::namespace('Consulta')->prefix('consulta')->name('consulta.')->middleware('can:admin')->group(function(){
    Route::resource('/agenda', 'ConsultaController');
    Route::resource('/paciente', 'AtendimentoController');
    
});

Route::get('/home', 'HomeController@index')->name('home');
