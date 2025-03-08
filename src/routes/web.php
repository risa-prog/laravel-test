<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

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

Route::middleware('auth')->get('/admin', [ContactController::class,'admin']);
Route::post('/register',[RegisterController::class,'store']);
Route::get('/register',[ContactController::class,'regist']);
Route::post('/login',[LoginController::class,'store']);
 Route::get('/',[ContactController::class,'index']);
 Route::post('/',[ContactController::class],'store');
Route::post('/confirm',[ContactController::class,'confirm']);
Route::post('/thanks',[ContactController::class,'create']);
Route::get('/search',[ContactController::class,'search']);
Route::get('/csv-download',[ContactController::class,'downloadCsv']);
Route::post('/search-export',[ContactController::class,'searchExport']);
Route::post('/find',[ContactController::class,'find']);
Route::delete('/delete',[ContactController::class,'delete']);







