<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModelIjinLemburController;
use App\Http\Controllers\SuratUserController;
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

Route::prefix('/surat-users')->group(function () {
    Route::controller(SuratUserController::class)->group(function () {
        Route::get('/', 'index')->name('surat-user.index');
        Route::get('/create', 'create')->name('surat-user.create');
        // Route::get(  '/{id}','show');
        Route::get('/edit/{id}', 'edit');
        Route::post('/create', 'store')->name('surat-user.store');
        Route::put('/edit/{id}', 'update');
        Route::delete('/delete/{id}', 'destroy');
    });
});


Route::get('/profile', function () {
    return view('profile.index');
});



    //register
    Route::get('/register', [AuthController::class, 'createRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register');

    // //logout
    // Route::post('/logout', //dd('test')
    // [AuthController::class, 'logoutUser'])->name('logout');//->middleware('auth');

    // Log User Out
    Route::post('/logout', [AuthController::class, 'logoutUser'])->middleware('auth');

    //loginView
    Route::get('/login', [AuthController::class, 'loginView'])->name('login');
    Route::post('/login', [AuthController::class, 'loginAuth'])->name('login');

    //lupa
    Route::get('/lupa', [AuthController::class, 'lupa'])->name('lupa')->middleware('guest');
    Route::post('/lupa', [AuthController::class, 'lupaPost'])->name('lupa');



// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');

// });
