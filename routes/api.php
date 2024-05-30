<?php

use App\Http\Controllers\Api\ApiProjectController;
use App\Http\Controllers\Api\ApiProjectTypeController;
use App\Http\Controllers\api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//route middleware
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/project-types', [ApiProjectTypeController::class, 'index']);
    Route::post('/project-types', [ApiProjectTypeController::class, 'store']);
    Route::get('/project-types/{ProjectType}', [ApiProjectTypeController::class, 'show']);
    Route::post('/project-types/{ProjectType}', [ApiProjectTypeController::class, 'update']);
    Route::delete('/project-types/{id}', [ApiProjectTypeController::class, 'destroy']);

    //projects
    Route::post('/projects', [ApiProjectController::class, 'store']);

    //logout
    Route::get('/logout', [AuthController::class, 'logout']);
});


//posts
Route::apiResource('/posts', App\Http\Controllers\Api\PostController::class);

//auth
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');