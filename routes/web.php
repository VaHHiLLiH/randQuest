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

Route::get('/', function () {
    return view('welcome');
});

Route::get('home/', [UserPanel::class, 'home'])->middleware('auth')->name('home');

Route::prefix('admin')->middleware('is.admin')->group(function() {

    Route::get('/', [AdminPanel::class, 'index']);

});

Route::get('login', [UserPanel::class, 'showAuthorization'])->name('login');

Route::get('registration', [UserPanel::class, 'showRegistration'])->name('registration');

Route::get('rememberPassword', [UserPanel::class, 'rememberPass'])->name('rememberPass');

Route::post('login', [UserPanel::class, 'authorization'])->name('authorization');

Route::post('registration', [UserPanel::class, 'registration'])->name('reg');

Route::post('logout', [UserPanel::class], 'logout')->name('logout');
