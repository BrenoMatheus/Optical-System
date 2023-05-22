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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/location/create-local', [LocalController::class, 'create']);
Route::get('/locals', [LocalController::class, 'dashboard']);