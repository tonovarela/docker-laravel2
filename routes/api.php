<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\KioskActivityController;
use App\Http\Controllers\Api\InventoryUpdateController;
use App\Http\Controllers\Api\OutOfOrderController;
use App\Http\Controllers\Api\ReinstateController;
use App\Http\Controllers\Api\PlanogramUpdateController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['apiLog']], function () 
    {
        Route::post('/kioskActivity', [KioskActivityController::class, 'processRequest'])->name('kioskactivity');
        Route::post('/inventoryUpdate', [InventoryUpdateController::class, 'processRequest'])->name('inventoryupdate');
        Route::post('/outOfOrderRequest', [OutOfOrderController::class, 'processRequest'])->name('outoforder');
        Route::post('/reinstateRequest', [ReinstateController::class, 'processRequest'])->name('reinstate');
        Route::post('/planogramUpdate', [PlanogramUpdateController::class, 'processRequest'])->name('planogramupdate');
        Route::post('/eventsUpdate', [EventsUpdateController::class, 'processRequest'])->name('planogramupdate');
        
 
    }
);
