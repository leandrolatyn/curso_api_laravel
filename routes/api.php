<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\RecipeController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\LoginController;

Route::post('login', [LoginController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {

    require __DIR__ . '/api_v1.php';

    require __DIR__ . '/api_v2.php';
});
