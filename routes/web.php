<?php

use App\Http\Controllers\ColorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login',[UserController::class,'login']);
Route::post('login',[UserController::class,'login']);
Route::get('logout',[UserController::class,'logout']);

Route::middleware(['application_guard'])->group(function(){
    Route::get('/',[DashboardController::class,'index']);
    Route::prefix('product')->group(function(){
        Route::prefix('color')->group(function(){
            Route::get('/',[ColorController::class,'index']);
            Route::get('new',[ColorController::class,'new']);
            Route::post('save',[ColorController::class,'save']);
            Route::get('edit/{id?}',[ColorController::class,'edit']);
            Route::post('update',[ColorController::class,'update']);
            Route::get('delete/{id?}',[ColorController::class,'delete']);
        });
        Route::prefix('size')->group(function(){
            Route::get('/',[SizeController::class,'index']);
            Route::get('new',[SizeController::class,'new']);
            Route::post('save',[SizeController::class,'save']);
            Route::get('edit/{id?}',[SizeController::class,'edit']);
            Route::post('update',[SizeController::class,'update']);
            Route::get('delete/{id?}',[SizeController::class,'delete']);
        });
    });
});
