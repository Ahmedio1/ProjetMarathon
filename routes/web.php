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
Route::get('/trierGenre',  [App\Http\Controllers\BaseController::class, 'trierGenre']);
Route::resource('commentaire', 'App\Http\Controllers\CommentaireController');
Route::get('create/{id}', [App\Http\Controllers\CommentaireController::class,'create']);
Route::post('create/store/{id}', [App\Http\Controllers\CommentaireController::class,'store']);
Route::get('edit/{id}', [App\Http\Controllers\CommentaireController::class,'edit']);
Route::post('edit/update/{idS}/{id}', [App\Http\Controllers\CommentaireController::class,'update']);

//Route::get('/complete/{id}', [BaseController::class, 'complete']);
//Route::post('/complete/update/{id}', [App\Http\Controllers\BaseController::class,'valide']);

Route::get('/listeEpisodes/{sId}', [BaseController::class, 'liste']);
Route::post('/listeEpisodes/{eId}/{date}/{uId}', [BaseController::class, 'dejaVu']);


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
