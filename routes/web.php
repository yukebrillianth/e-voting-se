<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RedirectorController;
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

Auth::routes();

Route::get('bantuan', function () {
    return view('pages.bantuan');
})->name('bantuan');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [RedirectorController::class, 'index'])->name('/');
    Route::get('/home', [RedirectorController::class, 'index'])->name('home');
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('formulir', [FormController::class, 'index'])->name('formulir');
});
