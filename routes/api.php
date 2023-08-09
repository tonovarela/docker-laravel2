<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\KioskActivityController;

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
        //kioskactivity
        Route::post(
            'kioskActivity',
            [
                'uses' => 'Api\KioskActivityController@processRequest',
                'as' => 'api.KioskActivity',
            ]
        );
 
    }
);
