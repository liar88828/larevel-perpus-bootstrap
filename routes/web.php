<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ModelIjinLemburController;
use App\Http\Controllers\SuratController;
use App\Models\surat;
// use App\Http\Controllers\SuratUserController;
// use App\Models\suratUser;
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
Route::get('/profile', [AuthController::class, 'profileController'])->name('profile.controller')->middleware('auth');


Route::resource('/surat-ijin', SuratController::class); //->middleware('auth');
Route::put('/surat-ijin/update/{id}', [SuratController::class, 'update'])->middleware('auth');

Route::controller(AdminController::class)->group(function () {
    Route::get('/admin', 'index')->name('admin');
    Route::prefix('/admin/surat')->group(function () {
        Route::get('/{slug}', 'suratShow')->name('admin.surat.show');
        Route::get('/print/{id}', 'suratPrint')->name('admin.surat.print');
        Route::delete('/delete/{id}', 'destroy')->name('admin.surat.delete');
        Route::put('/edit/{id}/{option}/{value}/divisi', 'suratEdit')->name('admin.surat.edit');
    });

    Route::prefix('/admin/user')->group(function () {
        Route::get('/{slug}', 'userShow')->name('admin.user.show');
    });
});
//user
Route::prefix('/user')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/surat', 'surat')->name('user.surat')->middleware('auth');
        Route::get('/', 'profile')->name('user')->middleware('auth');
        Route::post('/', 'logoutAccount')->name('logout')->middleware('auth');
    });
});

Route::prefix('/manager')->group(callback: function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'profile')->name('user')->middleware('auth');
        Route::post('/', 'logoutAccount')->name('logout')->middleware('auth');

    });
    Route::controller(AdminController::class)->group(function () {
        Route::prefix('/surat')->group(function () {
            Route::get('/', 'managerSurat')->name('manager.surat')->middleware('auth');
            Route::get('/{slug}', 'suratShow')->name('manager.surat.show');
        });
    });

    Route::controller(AuthController::class)->group(function () {

        Route::prefix('/user')->group(function () {
            Route::get('/user', 'managerUser')->name('manager.user')->middleware('auth');
            Route::get('/{slug}', 'userShow')->name('manager.surat.show');

        });
    });


});

//register
Route::get('/register', [AuthController::class, 'createRegister'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register');

// //logout
Route::post('/logout', [AuthController::class, 'logoutAccount'])->middleware('auth');

//loginView
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'loginAuth'])->name('login');

//lupa
Route::get('/lupa', [AuthController::class, 'lupa'])->name('lupa')->middleware('guest');
Route::post('/lupa', [AuthController::class, 'lupaPost'])->name('lupa');