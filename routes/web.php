<?php

<<<<<<< HEAD
=======
use App\Http\Livewire\Penerima;
>>>>>>> d497433 (aa)
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});
<<<<<<< HEAD

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/alternatif', [App\Http\Controllers\AlternatifController::class, 'index'])->name('alternatif');
Route::get('/kriteria', [App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria');
Route::get('/manajuser', [App\Http\Controllers\ManajuserController::class, 'index'])->name('manajuser');
Route::get('/perhitungan', [App\Http\Controllers\PerhitunganController::class, 'index'])->name('perhitungan');
Route::get('/rekomendasi', [App\Http\Controllers\RekomendasiController::class, 'index'])->name('rekomendasi');
=======
Auth::routes();
//middleware
    Route::get('/alternatif', [App\Http\Controllers\AlternatifController::class, 'index'])->name('alternatif');
    Route::get('/kriteria', [App\Http\Controllers\KriteriaController::class, 'index'])->name('kriteria');
    Route::get('/manajuser', [App\Http\Controllers\ManajuserController::class, 'index'])->name('manajuser');
    Route::get('/rekomendasi', [App\Http\Controllers\RekomendasiController::class, 'index'])->name('rekomendasi');
    Route::get('/penerima', Penerima::class);
    Route::get('/perhitungan', [App\Http\Controllers\PerhitunganController::class, 'index'])->name('perhitungan');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
>>>>>>> d497433 (aa)
