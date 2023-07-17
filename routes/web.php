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
    Route::get('/login', action: function () {
        return view('auth.login');
    })->name('login');

    Route::post('/login', function () {
        return view('auth.login');
    })->name('login');

    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'registerPost']);
});
Route::get('/login', [AuthController::class, 'login'])->name('login');