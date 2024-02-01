<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\ClassInfoController;

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
Route::controller(ReligionController::class)->group(function(){
    Route::post('/religion/create','create')->name('religion.create');
    Route::put('/religion/{religion}','edit')->name('religion.edit');
    Route::delete('/religion/{religion}','delete')->name('religion.delete');
    Route::get('/religion/{id}','select')->name('religion.select');
    Route::get('/religion','index')->name('religion.index');
});
Route::controller(ClassInfoController::class)->group(function(){
    Route::post('/classinfo','create')->name('classinfo.create');
});
