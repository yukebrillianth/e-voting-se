<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RedirectorController;
use App\Http\Controllers\UserController;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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
    Route::get('logout', function () {
        Auth::logout();
        return redirect()->route('login');
    });
    Route::prefix('dashboard')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');
        Route::prefix('kandidat')->group(function () {
            Route::get('/', [CandidateController::class, 'index'])->name('kandidat');
            Route::get('add', [CandidateController::class, 'create'])->name('tambahKandidat');
            Route::post('/', [CandidateController::class, 'store'])->name('storeKandidat');
            Route::delete('/', [CandidateController::class, 'deleteAll'])->name('deleteAll');
            Route::delete('{id}', [CandidateController::class, 'destroy'])->name('deleteKandidat');
            Route::get('edit/{id}', [CandidateController::class, 'edit'])->name('editKandidat');
            Route::put('edit/{id}', [CandidateController::class, 'update'])->name('putKandidat');
        });
        Route::prefix('peserta')->group(function () {
            Route::get('/', [ParticipantController::class, 'index'])->name('peserta');
            Route::get('add', [ParticipantController::class, 'create'])->name('tambahPeserta');
            Route::post('/', [ParticipantController::class, 'store'])->name('storePeserta');
            Route::delete('/', [ParticipantController::class, 'deleteAll'])->name('deleteAll');
            Route::delete('{id}', [ParticipantController::class, 'destroy'])->name('deletePeserta');
            Route::put('{id}', [ParticipantController::class, 'blacklist'])->name('blacklistPeserta');
            Route::get('edit/{id}', [ParticipantController::class, 'edit'])->name('editPeserta');
            Route::put('edit/{id}', [ParticipantController::class, 'update'])->name('putPeserta');
        });
    });
    Route::get('formulir', [FormController::class, 'index'])->name('formulir');
});
