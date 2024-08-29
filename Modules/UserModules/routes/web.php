<?php

use Illuminate\Support\Facades\Route;
use Modules\UserModules\App\Http\Controllers\UserModuleController;
use Modules\UserModules\App\Http\Controllers\PassengerTransportationServiceController;
use Modules\UserModules\App\Http\Controllers\FreightTransportationServicesController;
use Modules\UserModules\App\Http\Controllers\InvoicesController;
use Modules\UserModules\App\Http\Controllers\UserModulesController;

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

Route::resource('/', UserModulesController::class)->names('usermodule.index');

Route::prefix('/Dich-vu-van-tai-hanh-khach')->group(function () {
    Route::get('/', [PassengerTransportationServiceController::class, 'SearchItinerary'])->name('SearchItinerary');
    Route::post('/{id}/{itinerary_management_id}', [PassengerTransportationServiceController::class, 'CreateBookTicket'])
        ->name('CreateBookTicket');
});
Route::prefix('/Dich-vu-van-tai-hang-hoa')->group(function () {
    Route::get('/', [FreightTransportationServicesController::class, 'index']);
    Route::post('/', [FreightTransportationServicesController::class, 'store'])->name('FreightTransportationServices.store');
});
Route::prefix('/hoa-don')->group(function () {
    Route::get('/', [InvoicesController::class, 'storeInvoice']);
    Route::get('/{id}', [InvoicesController::class, 'destroytickets'])->name('invoices.destroy');
});
