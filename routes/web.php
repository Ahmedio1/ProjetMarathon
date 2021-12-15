<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;


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

Route::get('/', [BaseController::class, 'welcome'])->name('welcome');
Route::get('/sommaire/{id}', [BaseController::class, 'sommaire']);
Route::get('/complete/{id}', [BaseController::class, 'complete']);



//Route::post("/login",);


