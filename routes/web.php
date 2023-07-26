<?php

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


Route::resource('/surat', ModelIjinLemburController::class);//->middleware('auth');
Route::resource('/surat-ijin', SuratController::class);//->middleware('auth');







// Route::prefix('/surat-users')->group(function () {
//     Route::controller(SuratUserController::class)->group(function () {
//         Route::get('/', 'index');
//         Route::get('/create', 'create')->name('surat-user.create');
//         // Route::get(  '/{id}','show');
//         // Route::get('/edit/{id}', 'edit');
//         // Route::put('/edit/{id}', 'update');
//         // Route::delete('/delete/{id}', 'destroy');
//     });
// });

// Route::post('/surat-users/store', [SuratUserController::class, 'storeSurat'])->name('surat-user.store');



//register
Route::get('/register', [AuthController::class, 'createRegister'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register');

// //logout
Route::post('/logout', [AuthController::class, 'logoutUser'])->middleware('auth');

//loginView
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'loginAuth'])->name('login');

//lupa
Route::get('/lupa', [AuthController::class, 'lupa'])->name('lupa')->middleware('guest');
Route::post('/lupa', [AuthController::class, 'lupaPost'])->name('lupa');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile');



// Route::controller(AuthController::class)->group(function () {
//     Route::post('login', 'login');
//     Route::post('register', 'register');
//     Route::post('logout', 'logout');
//     Route::post('refresh', 'refresh');

// });
