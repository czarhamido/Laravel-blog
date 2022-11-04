<?php

use Illuminate\Support\Facades\Route;

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



Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('categores', App\Http\Controllers\CategoryController::class);
    Route::resource('dashboard', App\Http\Controllers\PostController::class);

    Route::get('/', [App\Http\Controllers\PostController::class,'showAll'])->name('home');


    //Route::get('/edit/{id}', [App\Http\Controllers\PostController::class,'edit'])->name('edit.post');

});


//Route::get('delete-post/{id}', [App\Http\Controllers\PostController::class,'destroy'])->middleware(['auth', 'verified'])->name('destroy');
    

/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
*/
require __DIR__.'/auth.php';
