<?php

use App\Http\Controllers\admin\AdController;
use App\Http\Controllers\admin\adminController;
use App\Http\Controllers\admin\ArticleController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\CommentController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\TagController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [mainController::class, 'index']);
Route::get('/show/{article}', [mainController::class, 'show'])->name('show');
Route::get('/hashtag/{tag}', [mainController::class, 'hashtag'])->name('hashtag');
Route::get('/lang/{lang}', [mainController::class, 'lang'])->name('lang');
Route::get('/theme', [mainController::class, 'theme'])->name('theme');
Route::get('/list/{category}', [mainController::class, 'list'])->name('list');
Route::post('comment/{article}', [mainController::class, 'comment'])->name('comment');
Route::get('search', [mainController::class, 'search'])->name('main-search');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

Route::group(['middleware'=>'auth','prefix' =>'admin'],function () {
    Route::get('/', [adminController::class, 'index']);
    Route::resources([
        'category' =>CategoryController::class,
        'tag' => TagController::class,
        'article' => ArticleController::class,
        'comment'=> CommentController::class,
        'ad'=>AdController::class,
    ]);
    Route::get('message', [MessageController::class, 'index'])->name('message.index');
    Route::delete('message/{message}', [MessageController::class, 'destroy'])->name('message.destroy');
    Route::get('search', [adminController::class, 'search'])->name('search');
});

require __DIR__.'/auth.php';
