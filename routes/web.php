<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArbolController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;

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

/*Route::get('/arbol', function () {
    return view('arbol.index');
});

/*Route::get('arbol/create', [ArbolController::class, 'create']);*/

Route::resource('arbol', ArbolController::class);

//La siguiente linea desaparece el registro y recuperación de contraseña en el login
Auth::routes(['register' => false, 'reset' => false]);

//Si se deja el registro y recuperación, descomentar la siguiente linea
//Auth::routes();

Route::get('/home', [ArbolController::class, 'index'])->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [ArbolController::class, 'index'])->name('home');
});
