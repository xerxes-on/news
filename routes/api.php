<?php

use App\Http\Controllers\Api\ArticleController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::ApiResources([
    'api-category'=>CategoryController::class,
    'api-tag'=>TagController::class,
    'api-article'=>ArticleController::class,
    ]);
