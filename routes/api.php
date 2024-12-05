<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\studentController;

Route::get('/students',[studentController::class,'index']);
Route::get('/students/{id}',[studentController::class,'showOne']);

Route::post('/students',[studentController::class,'save']);



Route::put('/students/{id}', function () {
    return "Students update";
});

Route::delete('/students/{id}',[studentController::class,'deploy']);





