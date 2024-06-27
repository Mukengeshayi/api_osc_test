<?php

use App\Http\Controllers\Apis\Articles\ArticleController;
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
    return view('welcome');
});

Route::prefix('/api')->group(function () {
    Route::get('/articles',[ArticleController::class, 'index'])->name('articles.index');
    Route::post('/articles/store', [ArticleController::class, 'store'])->name('articles.store');
   
});
