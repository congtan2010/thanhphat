<?php

use Illuminate\Support\Facades\Route;
use Modules\AuthModules\App\Http\Controllers\User\RegisterController;
use Modules\AuthModules\App\Http\Controllers\User\LoginController;
use Modules\AuthModules\App\Http\Controllers\User\LogoutController;
use Modules\AuthModules\App\Http\Controllers\Admin\LoginAdminController;
use Modules\AuthModules\Http\Controllers\AuthModulesController;

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

Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'create'])->name('Register.create');
    Route::post('/', [RegisterController::class, 'store'])->name('Register.store');
});
Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'create'])->name('login.create');
    route::post('/', [LoginController::class, 'store'])->name('login.store');
});

Route::get('/logout', [LogoutController::class, 'destroy'])->name('logout.destroy');

Route::prefix('adminlogin')->group(function () {
    Route::get('/', [LoginAdminController::class, 'index'])->name('adminlogin.index');
    route::post('/admin', [LoginAdminController::class, 'store'])->name('adminlogin.store');
});
