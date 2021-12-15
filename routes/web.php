<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\CommentaireController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [BaseController::class, 'welcome'])->name('welcome');
Route::get('/sommaire/{id}', [BaseController::class, 'sommaire'])-> name('som');
Route::get('/echantillon',[App\Http\Controllers\BaseController::class, 'showDate'])->name('accueil.echantillon');
Route::get('/filtre',  [App\Http\Controllers\BaseController::class, 'filtre']);
Route::resource('commentaire', 'App\Http\Controllers\CommentaireController');
Route::resource('user','App\Http\Controllers\UtilisateurController');

/*
Route::resource('base', 'App\Http\Controllers\BaseController')->only([
    'index', 'show'
]);
Route::resource('base', 'App\Http\Controllers\RegisterController')->only([
    'create'
]);*/
//Route::resource('test', '\App\Http\Controllers\BaseController');

//Route::post("/login", );
