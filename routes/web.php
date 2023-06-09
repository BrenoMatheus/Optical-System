<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Http\Controllers\LocalController;
use App\Http\Controllers\PacientController;
use App\Http\Controllers\ExameController;

Route::get('/', function () {
    return view('welcome');
});



// Locals
Route::get('/local/create-local', [LocalController::class, 'create'])->middleware('auth');
Route::get('/locals', [LocalController::class, 'dashboard'])->middleware('auth');
Route::post('/local', [LocalController::class, 'store'])->middleware('auth');
Route::get('/pesquisa-local',[LocalController::class, 'pesquisar'])->middleware('auth');
Route::get('/local/{id}', [LocalController::class, 'show'])->middleware('auth');
Route::delete('/local/{id}', [LocalController::class, 'destroy'])->middleware('auth');
Route::get('/local/edit/{id}', [LocalController::class, 'edit'])->middleware('auth');
Route::put('/local/update/{id}', [LocalController::class, 'update'])->middleware('auth');

// Pacients
Route::get('/pesquisa-paciente',[PacientController::class, 'pesquisar'])->middleware('auth');
Route::get('/pacients/create-pacient', [PacientController::class, 'create'])->middleware('auth');
Route::post('/pacients', [PacientController::class, 'store'])->middleware('auth');
Route::get('/pacients/{id}', [PacientController::class, 'show'])->middleware('auth');
Route::delete('/pacients/{id}', [PacientController::class, 'destroy'])->middleware('auth');
Route::get('/pacients/edit/{id}', [PacientController::class, 'edit'])->middleware('auth');
Route::put('/pacients/update/{id}', [PacientController::class, 'update'])->middleware('auth');
Route::get('/pacientes', [PacientController::class, 'dashboard'])->middleware('auth');

// Exames
Route::get('/exame/create-exame/{id}', [ExameController::class, 'create'])->middleware('auth'); //creation of a route to redirect to a function "create"
Route::get('/pesquisa-exame',[ExameController::class, 'pesquisar'])->middleware('auth');//creation of a route to redirect to a function "pesquisar"
Route::post('/exame', [ExameController::class, 'store'])->middleware('auth');//creation of a route to redirect to a function "store"
Route::get('/exame/{id}', [ExameController::class, 'show'])->middleware('auth');//creation of a route to redirect to a function "show"
Route::delete('/exame/{id}', [ExameController::class, 'destroy'])->middleware('auth');//creation of a route to redirect to a function "destroy"
Route::get('/exame/edit/{id}', [ExameController::class, 'edit'])->middleware('auth');//creation of a route to redirect to a function "edit"
Route::put('/exame/update/{id}', [ExameController::class, 'update'])->middleware('auth');//creation of a route to redirect to a function "update"
Route::get('/exames', [ExameController::class, 'dashboard'])->middleware('auth');//creation of a route to redirect to a function "dashboard"