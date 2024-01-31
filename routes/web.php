<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchemeController;
use App\Models\Participant;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', [ParticipantController::class, 'index'])->name('welcome');



Route::middleware('auth')->group(function () {
    Route::resource('sertifikasi', SchemeController::class)->except(['create','show']);
    Route::get('/form-pendaftaran', [ParticipantController::class, 'create'])->name('peserta.create');
    Route::post('/form-pendaftaran', [ParticipantController::class, 'store'])->name('peserta.store');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
