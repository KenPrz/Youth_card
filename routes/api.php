<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\RFIDController;
use App\Http\Controllers\NodeMCUController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    
    
});

Route::get('/search-name', [EventsController::class, 'searchName'])->name('events.search-name');

// RFID End Point
Route::post('/send', [NodeMCUController::class, 'handleRFID']);
Route::get('/test', [NodeMCUController::class, 'index']);

Route::post('/rfid-scan', [RFIDController::class, 'rfidScan'])->name('rfid.scan');
Route::put('/redeem', [RFIDController::class, 'redeem'])->name('rfid.redeem');

Route::post('/check-rfid', [RFIDController::class, 'checkRFID'])->name('rfid.check-rfid');