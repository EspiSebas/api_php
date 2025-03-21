<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\studentController;
use App\Http\Controllers\SubjectController;


Route::get('/students',[studentController::class,'index']);
Route::get('/students/{id}',[studentController::class,'showOne']);
Route::post('/students',[studentController::class,'save']);
Route::put('/students/{id}',[studentController::class,'update']);
Route::delete('/students/{id}',[studentController::class,'deploy']);


Route::get('/subject',[SubjectController::class,'index']);
Route::post('/subject',[SubjectController::class,'saveSubject']);
Route::put('/subject/{id}',[SubjectController::class,'updateSubject']);
Route::delete('/subject/{id}',[SubjectController::class,'deploySubjet']);
Route::get('/subject/{id}',[SubjectController::class,'showOne']);

Route::get('/teacher',[TeachersController::class,'index']);
Route::get('/teacher/{id}',[TeachersController::class,'showOne']);
Route::post('/teacher',[TeachersController::class,'saveTeacher']);
Route::delete('/teacher/{id}',[TeachersController::class,'deployTeacher']);
Route::put('/teacher/{id}',[TeachersController::class,'updateTeacher']);




