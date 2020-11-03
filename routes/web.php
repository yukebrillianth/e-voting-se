<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FormController;
use App\Http\Controllers\RedirectorController;
use App\Models\Setting;
use App\Models\User;
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

if (Route::setting()->enable_register == false) {
    Auth::routes(['register' => false]);
} elseif (Route::setting()->enable_verify == false) {
    Auth::routes(['verify' => false]);
} elseif (Route::setting()->enable_reset == false) {
    Auth::routes(['reset' => false]);
} else {
    Auth::routes();
}

Route::get('bantuan', function () {
    return view('pages.bantuan');
})->name('bantuan');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [RedirectorController::class, 'index'])->name('/');
    Route::get('/home', [RedirectorController::class, 'index'])->name('home');
    Route::get('dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('dashboard/kandidat', [CandidateController::class, 'index'])->name('kandidat');
    Route::get('dashboard/kandidat/add', [CandidateController::class, 'add'])->name('tambahKandidat');
    Route::post('dashboard/kandidat/', [CandidateController::class, 'store'])->name('storeKandidat');
    Route::get('formulir', [FormController::class, 'index'])->name('formulir');
});
