<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\ScriptsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RatingsController;
use App\Http\Controllers\ScriptCategoriesController;
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


// Rute za korisnike
Route::get('/korisnici/dohvati', [KorisnikController::class, 'index']);
Route::post('/korisnici/dodaj', [KorisnikController::class, 'store']);
Route::put('/korisnici/{id}', [KorisnikController::class, 'update']);
Route::delete('/korisnici/izbrisi/{id}', [KorisnikController::class, 'destroy']);
Route::get('/korisnici/{id}/uredi', [KorisnikController::class, 'edit']);
Route::get('/korisnici/create', [KorisnikController::class, 'create']);

// Rute za skripte
Route::get('/skripte/dohvati', [SkriptaController::class, 'index']);
Route::post('/skripte/dodaj', [SkriptaController::class, 'store']);
Route::put('/skripte/{id}', [SkriptaController::class, 'update']);
Route::delete('/skripte/sizbrisi/{id}', [SkriptaController::class, 'destroy']);
Route::get('/skripte/{id}/uredi', [SkriptaController::class, 'edit']);
Route::get('/skripte/create', [SkriptaController::class, 'create']);

// Rute za kategorije
Route::get('/kategorije/dohvati', [KategorijaController::class, 'index']);
Route::post('/kategorije/dodaj', [KategorijaController::class, 'store']);
Route::put('/kategorije/{id}', [KategorijaController::class, 'update']);
Route::delete('/kategorije/izbrisi/{id}', [KategorijaController::class, 'destroy']);
Route::get('/kategorije/uredi/{id}', [KategorijaController::class, 'edit']);
Route::get('/kategorije/kreiraj', [KategorijaController::class, 'create']);

// Rute za ocjene
Route::get('/ocjene/dohvati', [OcjenaController::class, 'index']);
Route::post('/ocjene/dodaj', [OcjenaController::class, 'store']);
Route::put('/ocjene/{id}', [OcjenaController::class, 'update']);
Route::delete('/ocjene/izbrisi/{id}', [OcjenaController::class, 'destroy']);
Route::get('/ocjene/{id}/uredi', [OcjenaController::class, 'edit']);
Route::get('/ocjene/create', [OcjenaController::class, 'create']);

// Rute za kategorije skripti
Route::get('/scriptcategories/dohvati', [KategorijaSkriptiController::class, 'index']);
Route::post('/scriptcategories/dodaj', [KategorijaSkriptiController::class, 'store']);
Route::put('/scriptcategories/{id}', [KategorijaSkriptiController::class, 'update']);
Route::delete('/scriptcategories/izbrisi/{id}', [KategorijaSkriptiController::class, 'destroy']);
Route::get('/scriptcategories/{id}/uredi', [KategorijaSkriptiController::class, 'edit']);
Route::get('/scriptcategories/create', [KategorijaSkriptiController::class, 'create']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
