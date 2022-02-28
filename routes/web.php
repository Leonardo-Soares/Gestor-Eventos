<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

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

Route::get('/', function () { return view('welcome'); });

Route::get('/home/{nome?}', [EventController::class, 'home']);

Route::get('/eventos', [EventController::class, 'exibieventos']);
Route::get('/eventos/criar', [EventController::class, 'criaevento'])->middleware('auth');
Route::get('/eventos/detalhes/{id}', [EventController::class, 'detalhesevento'])->name('detalhesevento');
Route::post('/eventos', [EventController::class, 'enviaevento']);

Route::get('/contato', [EventController::class, 'contato']);

Route::get('/dashboard', [EventController::class, 'dashboard'])->middleware('auth');
