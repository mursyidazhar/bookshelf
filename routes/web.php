<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
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
    return view('home');
})->name('home');

Route::get('/categories', function () {
    return view('categories');
})->name('categories');

Route::middleware('guest')->group(function() {

    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login');
});

Route::middleware('auth')->group(function() {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/create-collection', [DashboardController::class, 'create'])->name('dashboard-create');
    Route::post('/create-collection', [DashboardController::class, 'store'])->name('dashboard-store');
    Route::get('/edit-collection/{id}', [DashboardController::class, 'edit'])->name('dashboard-edit');
    Route::get('/collection', [DashboardController::class, 'show'])->name('collection');
    Route::post('/logout', [LogoutController::class])->name('logout');
});
