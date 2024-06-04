<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ForgotPasswordController;
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
    return view('auth.login');
});
Route::get('/profile', [AuthController::class, 'profileController'])->name('profile.controller')->middleware('auth');


Route::resource('/surat-ijin', SuratController::class)->middleware('auth');


// ------------------------------- Admin -------------------------------
Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {

        Route::controller(AuthController::class)->group(function () {
            Route::post('/', 'logoutAccount')->name('logout');
            Route::get('/download/{id}', 'download')->name('download');
        });

        Route::prefix('/pass')->group(function () {
            Route::controller(ForgotPasswordController::class)->group(function () {
                Route::get('lupa/{id}', 'formGantiPassword')->name('admin.lupa.edit');
                Route::put('ganti', 'submitResetPasswordForm')->name('admin.lupa.ganti');
                Route::get('{slug}', 'showLupaPass');
            });
        });

        Route::controller(AdminController::class)->group(function () {
            Route::get('/', 'index');

            Route::prefix('/surat')->group(function () {
                Route::get('/{slug}', 'suratShow')->name('admin.surat.show');
                Route::get('/print/{id}', 'suratPrint')->name('admin.surat.print');
                Route::delete('/delete/{id}', 'destroy')->name('admin.surat.delete');
                Route::put('/edit/{id}/{option}/{value}/divisi', 'suratEdit')->name('admin.surat.edit');
            });

            Route::prefix('/user')->group(function () {
                Route::get('/{slug}', 'userShow')->name('admin.user.show');
            });
        });
    });
});

// ------------------------------- User --------------------------------
Route::middleware('auth')->group(function () {
    Route::prefix('/user')->group(function () {
        Route::controller(AuthController::class)->group(function () {
            Route::get('/', 'profile')->name('user');
            // edit profile
            Route::get('/{role}/edit_profile', 'show_edit_profile');
            Route::put('/{role}/edit_profile', 'save_edit_profile');
            // edit profile
            Route::post('/', 'logoutAccount')->name('logout');
            Route::get('/surat', 'surat')->name('user.surat');
            Route::get('/download/{id}', 'download')->name('download');
        });
    });
});


// ------------------------------- Manager --------------------------------
Route::prefix('/manager')->group(callback: function () {
    Route::controller(AuthController::class)->group(function () {
        Route::get('/', 'profile')->middleware('auth');
        Route::post('/', 'logoutAccount')->name('logout')->middleware('auth');
        // edit profile
        Route::get('/{role}/edit_profile', 'show_edit_profile');
        Route::put('/{role}/edit_profile', 'save_edit_profile');
        // edit profile
        Route::prefix('/surat')->group(function () {
            Route::get('/{slug}', 'suratShow')->name('manager.surat.show')->middleware('auth');
        });

        Route::prefix('/user')->group(function () {
            Route::get('/{slug}', 'userShow')->name('manager.user.show')->middleware('auth');
        });
    });
});


Route::controller(AuthController::class)->group(function () {
    //register
    Route::get('/register', 'createRegister')->name('register');
    Route::post('/register', 'storeRegister')->name('register');

    // //logout
    Route::post('/logout', 'logoutAccount')->middleware('auth');

    //loginView
    Route::get('/login', 'loginView')->name('login');
    Route::post('/login', 'loginAuth')->name('login');
});



Route::controller(ForgotPasswordController::class)->group(function () {
    Route::get('forget-password', 'showForgetPasswordForm')->name('forget.password.get');
    Route::post('forget-password', 'submitForgetPasswordForm')->name('forget.password.post');
    Route::get('reset-password/{token}', 'showResetPasswordForm')->name('reset.password.get');
    Route::post('reset-password', 'submitResetPasswordForm')->name('reset.password.post');
});
