<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddToContactController;
use App\Http\Controllers\HeroController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ProfileController;

use App\Http\Controllers\LoginController;
use Illuminate\Auth\Events\Logout;

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

Route::get('profile/{slug}', [HeroController::class, 'hero'])->name('profile');
Route::post('add-to-contact', [AddToContactController::class, 'addToContact'])->name('add-to-contact');

Route::middleware(['auth'])->group(function () { 
    Route::resource('dashboard', DashboardController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('profiles', ProfileController::class);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authentication'])->name('authentication');
