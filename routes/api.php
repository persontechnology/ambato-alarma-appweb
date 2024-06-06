<?php

use App\Http\Controllers\Api\ResponderCarta;
use App\Http\Controllers\SensorDataController;
use App\Models\Carta;
use App\Models\Ninio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


Route::get('/sensor-data',[SensorDataController::class,'sensorData']);
Route::post('/sensor-data',[SensorDataController::class,'sensorData']);



Route::middleware(['auth:sanctum'])->group(function () {
    
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
