<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::prefix('task')->group(function (){
    Route::get('/' , [\App\Http\Controllers\TaskController::class, 'index']);
    Route::post('store' , [\App\Http\Controllers\TaskController::class, 'store']);
    Route::put('update/{id}' , [\App\Http\Controllers\TaskController::class, 'update']);
    Route::delete('destroy/{id}' , [\App\Http\Controllers\TaskController::class, 'destroy']);
});
