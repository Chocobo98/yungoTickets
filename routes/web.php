<?php

use App\Http\Controllers\ClientesController;
use App\Http\Controllers\indexController;
use App\Http\Controllers\inventarioController;
//use App\Http\Controllers\CommentsController;

use App\Models\Inventario;

use App\Http\Controllers\ticketsController;

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


//Pagina inicial y URL de API'S
Route::get('/', [indexController::class,'index']);
Route::get('/clientes/api'  ,   'App\Http\Controllers\ClientesController@data')->name('clientes.api');
Route::get('/tickets/api'   ,   'App\Http\Controllers\ticketsController@data')->name('tickets.api');
Route::get('/inventario/api',   'App\Http\Controllers\inventarioController@data')->name('inventario.api');


//Route::get('/',[tablaIndexController::class,'index']);
//CRUD de cada seccion [SHOW,DELETE,STORE,UPDATE,...]
Route::resource('/clientes', ClientesController::class);
Route::resource('/tickets',ticketsController::class);
Route::resource('/inventario', inventarioController::class);

//URL para la asignacion de equipo a Cliente
Route::get('/inventario/asignarEquipo/getUserDetails/{id}','App\Http\Controllers\inventarioController@getUserDetails')->name('inventario.getUserDetails');
Route::get("/inventario/asignarEquipo/{id}",'App\Http\Controllers\inventarioController@asignar')->name('inventario.asignar');
Route::get('/inventario/asigCliente/{id}/{mac}', 'App\Http\Controllers\ClientesController@asignar')->name('cliente.asignar');

//IGNORAR
/*
Route::get('/tickets/getComment','App\Http\Controllers\CommentsController@getComment')->name('tickets.getComment');
Route::post('/tickets/makeComment','App\Http\Controllers\CommentsController@makeCommentt')->name('tickets.makeComment');
*/

//API para los comentarios
Route::get('/tickets/{id}/comments','App\Http\Controllers\CommentsController@obtener')->name('comments.obtener');
Route::post('/tickets/{id}/comments','App\Http\Controllers\CommentsController@agregar')->name('comments.agregar');

//API para el historial del ticket con el tipo de problema
Route::get('/tickets/{id}/{tipoProblema}','App\Http\Controllers\ticketsController@historialTickets')->name('tickets.historial');

//API para la interaccion de los archivos
Route::get('/upload-file/{id}', 'App\Http\Controllers\FileUpload@getFile')->name('file.get');
Route::post('/upload-file/{id}','App\Http\Controllers\FileUpload@fileUpload')->name('file.upload');

