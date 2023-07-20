<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModelIjinLemburController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/surat', ModelIjinLemburController::class);



Route::group(['middleware' => 'guest'], function () {

    //lupa
    Route::get('/lupa', [AuthController::class, 'lupa'])->name('lupa');
    Route::post('/lupa', [AuthController::class, 'lupaPost'])->name('lupa');
    
    //login
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'loginPost'])->name('login');

    //register
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register');;
});
