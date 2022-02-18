<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

route::middleware(['auth'])->group(function(){
    route::get('/dashboard',[Admin\AdminController::class,'index'])->name('dashboard');
    route::get('/dashboard/topcount',[Admin\AdminController::class,'topCount'])->name('topcount');
    route::get('/dashboard/movies_chart',[Admin\AdminController::class,'moviesChart'])->name('movies_chart');

    // route::get('/genres/data',[Admin\GenereController::class,'index'])->name('genres.data');
    route::resource('/genres',Admin\GenereController::class)->only(['index','destroy']);
    Route::get('/genres/data',[Admin\GenereController::class,'data'])->name('genres.data');
    // Route::get('/genres/data', 'Admin\GenereController@data')->name('genres.data');


    // route::resource('/movies',Admin\MovieController::class);
    route::resource('/movies',Admin\MovieController::class)->only(['index','destroy']);
    route::get('/movies/show/{id}',[Admin\MovieController::class,'show'])->name('movies.show');
    Route::get('/movies/data',[Admin\MovieController::class,'data'])->name('movies.data');

    route::resource('/actors',Admin\ActorController::class)->only(['index','destroy']);
    Route::get('/actors/data',[Admin\ActorController::class,'data'])->name('actors.data');
});

require __DIR__.'/auth.php';
