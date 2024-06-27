<?php

use App\Http\Controllers\Apis\Articles\ArticleController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::prefix('/api')->group(function () {
//     Route::get('/articles',[ArticleController::class, 'index'])->name('articles.index');
//     // Route::post('/article',[::class, 'create'])->name('articles.create');
//     // Route::delete('/article',[::class, 'delete'])->name('articles.create');
//     // Route::('/article',[::class, 'create'])->name('articles.create');

// });
