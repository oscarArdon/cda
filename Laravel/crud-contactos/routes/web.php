<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[ContactController::class,'index']);
Route::get('/contacts',[ContactController::class,'index']);
Route::get('/contacts/create',[ContactController::class,'create']);
Route::post('/contacts/store',[ContactController::class,'store']);
Route::get('/contacts/edit/{id}',[ContactController::class,'edit']);
Route::patch('/contacts/update/{id}',[ContactController::class,'update']);
Route::delete('/contacts/destroy/{id}',[ContactController::class,'destroy']);