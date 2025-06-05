<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlantingInfoController;

/*
|--------------------------------------------------------------------------
| Rute API
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute API untuk aplikasi Anda. Rute-rute
| ini dimuat oleh RouteServiceProvider dan semuanya akan
| ditugaskan ke grup middleware "api". Buat sesuatu yang hebat!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/planting-info/date', [PlantingInfoController::class, 'getInfoForDate']);