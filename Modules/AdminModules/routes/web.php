<?php

use Illuminate\Support\Facades\Route;
use Modules\AdminModules\App\Http\Controllers\AdminCoachManagerController;
use Modules\AdminModules\App\Http\Controllers\AdminItineraryManagerController;
use Modules\AdminModules\App\Http\Controllers\AdminTicketManagerController;
use Modules\AdminModules\App\Http\Controllers\AdminFreightManagerController;
use Modules\AdminModules\App\Http\Controllers\AdminUserManagerController;
use Modules\AdminModules\App\Http\Controllers\StatisticalController;
use Modules\AdminModules\Http\Controllers\AdminModulesController;

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

Route::prefix('/admin/quan-ly-xe')->group(function () {
    Route::get('/', [AdminCoachManagerController::class, 'index'])->name('AdminCoachManager.index');
    Route::post('/', [AdminCoachManagerController::class, 'store'])->name('AdminCoachManager.store');
    Route::get('/{id}', [AdminCoachManagerController::class, 'destroy'])->name('AdminCoachManager.destroy');
});
Route::prefix('/admin/quan-ly-lo-trinh')->group(function () {
    Route::get('/', [AdminItineraryManagerController::class, 'index'])->name('AdminItineraryManager.index');
    Route::post('/', [AdminItineraryManagerController::class, 'store'])->name('AdminItineraryManager.store');
    Route::get('/{id}', [AdminItineraryManagerController::class, 'destroy'])->name('AdminItineraryManager.destroy');
});
Route::prefix('/admin/quan-ly-ve-xe')->group(function () {
    Route::get('/', [AdminTicketManagerController::class, 'index'])->name('Ticket.index');
    Route::post('/{id}', [AdminTicketManagerController::class, 'update'])->name('Ticket.update');
    Route::get('/{id}', [AdminTicketManagerController::class, 'destroy'])->name('Ticket.destroy');
    Route::post('/{id}/{itinerary_management_id}', [AdminTicketManagerController::class, 'AdminCreateBookTicket'])
        ->name('AdminCreateBookTicket');
});
Route::prefix('/admin/quan-ly-hang-hoa')->group(function () {
    Route::get('/', [AdminFreightManagerController::class, 'index'])->name('AdminFreightManager.index');
    Route::post('/', [AdminFreightManagerController::class, 'store'])->name('AdminFreightManager.store');
    Route::post('/{id}', [AdminFreightManagerController::class, 'update'])->name('AdminFreightManager.update');
    Route::get('/{id}', [AdminFreightManagerController::class, 'destroy'])->name('AdminFreightManager.destroy');
});
Route::prefix('/admin/quan-ly-nguoi-dung')->group(function () {
    Route::get('/', [AdminUserManagerController::class, 'index'])->name('AdminUserManager.index');
    Route::post('/', [AdminUserManagerController::class, 'store'])->name('AdminUserManager.store');
    Route::post('/{id}', [AdminUserManagerController::class, 'update'])->name('AdminUserManager.update');
    Route::get('/{id}', [AdminUserManagerController::class, 'destroy'])->name('AdminUserManager.destroy');
});
Route::prefix('/admin')->group(function () {
    Route::get('/', [StatisticalController::class, 'index']);
});
