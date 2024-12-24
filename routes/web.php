<?php

use App\Http\Controllers\FilmsController;
use App\Http\Controllers\GenresController;
use App\Models\Film;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    $films = Film::all();

    return view("pages.films.index", ["films"=> $films]);
});

Route::resource('genres', GenresController::class);
Route::resource('films', FilmsController::class);

Auth::routes();
