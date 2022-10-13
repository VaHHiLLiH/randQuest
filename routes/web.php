<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanel;
use App\Http\Controllers\UserPanel;
use App\Http\Middleware;

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

Route::prefix('admin')->middleware('is.admin')->group(function() {

    Route::get('/', [AdminPanel::class, 'index']);

});

Route::get('/', function () {
    return view('welcome');
})->middleware('is.guest');

Route::get('home/', [UserPanel::class, 'home'])->middleware('auth')->name('home');

Route::get('login', [UserPanel::class, 'showAuthorization'])->middleware('is.user')->name('login');

Route::get('registration', [UserPanel::class, 'showRegistration'])->middleware('is.user')->name('registration');

Route::get('rememberPassword', function () {
    return view('rememberPass');
})->middleware('is.user')->name('rememberPass');

Route::post('rememberPassword', [UserPanel::class, 'restorePassword'])->middleware('is.user')->name('restorePassword');

Route::post('recovery', [UserPanel::class, 'recoveryPass'])->name('recovery');

Route::post('login', [UserPanel::class, 'authorization'])->middleware('is.user')->name('authorization');

Route::post('registration', [UserPanel::class, 'registration'])->middleware('is.user')->name('reg');

Route::get('logout', [UserPanel::class, 'logout'])->name('logout');

Route::get('confirm', [UserPanel::class, 'regConfirm'])->name('confirmRegistration');

Route::get('message/{user_id}', function () {
    return view('confirmMessage');
})->middleware('is.user')->name('confirm');
