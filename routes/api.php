<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/ping', function() {
    return [ 'pong' => true];
});

Route::get('/unauthenticated', function() {
    return ['error' => 'Usuário não está logado'];
})->name('login');

Route::post('/user', [AuthController::class, 'create']);
Route::middleware('auth:api')->post('/auth/loginjwt', [AuthController::class, 'loginjwt']);
Route::middleware('auth:sanctum')->get('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth', [AuthController::class, 'login']);

// CRUD do todo

Route::middleware('auth:sanctum')->post('/todo', [ApiController::class, 'createTodo']);

// Route::post('/todo', [ApiController::class, 'createTodo']);
Route::get('/todos', [ApiController::class, 'readAllTodos']);
Route::get('/todo/{id}', [ApiController::class, 'readTodo']);
Route::middleware('auth:sanctum')->put('/todo/{id}', [ApiController::class, 'updateTodo']);
Route::middleware('auth:sanctum')->delete('/todo/{id}', [ApiController::class, 'deleteTodo']);
