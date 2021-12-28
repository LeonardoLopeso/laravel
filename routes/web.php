<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TarefasController;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Auth;
use App\Http\Controllers\TodoController;

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

// Defining route in laravel 6
// Route::get('/route', 'controller@method');
// Route::get('/', 'HomeController@index');

// Definig route in laravel 8
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', [Auth\LoginController::class, 'index'])->name('login');
Route::post('/login', [Auth\LoginController::class, 'authenticate']);

Route::get('/register', [Auth\RegisterController::class, 'index'])->name('register');
Route::post('/register', [Auth\RegisterController::class, 'register']);

Route::get('/logout', [Auth\LoginController::class, 'logout'])->name('logout');

// Route::resource('/todo', [TodoController::class, 'index']);
/*
GET - /todo - index - todo.index LISTA OS ITENS
GET - /todo/create - create - todo.create - FORM DE CRIAÇÃO
POST - /todo - store - todo.store - RECEBER OS DADOS E ADD ITEM
GET - /todo/{id} - show - todo.show - ITEM INDIVIDUAL
GET - /todo/{id}/edit - edit - todo.edit - FORM DE EDIÇÃO
PUT - /todo/{id} - update - todo.update - RECEBER OS DADOS E UPDATE ITEM
DELETE - /todo/{id} - destroy - todo.destroy - DELETAR ITEM
*/

Route::prefix('/tarefas')->group(function() {

    Route::get('/', [TarefasController::class, 'list'])->name('tarefas.list'); // Listagem de tarefas

    Route::get('add', [TarefasController::class, 'add'])->name('tarefas.add'); // Tela de adição de tarefa
    Route::post('add', [TarefasController::class, 'addAction']); //Ação de adição de nova tarefa

    Route::get('edit/{id}', [TarefasController::class, 'edit'])->name('tarefas.edit'); // Tela de edição
    Route::post('edit/{id}', [TarefasController::class, 'editAction']); // Ação de edição

    Route::get('delete/{id}', [TarefasController::class, 'del'])->name('tarefas.del'); // Ação de deletar

    Route::get('marcar/{id}', [TarefasController::class, 'done'])->name('tarefas.done'); // Marcar resolvido/não
});

// Route::get('/config', [ConfigController::class, 'index']);
// Route::post('/config', [ConfigController::class, 'index']);
// Route::get('/config/user', [ConfigController::class, 'user']);

// Configurando para receber uma rota com method POST
Route::prefix('/config')->group(function() {

    // Route::get('/', 'Admin\ConfigController@index');
    Route::get('/', [Admin\ConfigController::class, 'index'])->name('config.index');
    // Route::post('/', 'Admin\ConfigController@index');
    Route::post('/', [Admin\ConfigController::class, 'index']);

    // Route::get('info', 'Admin\ConfigController@info');
    Route::get('info', [Admin\ConfigController::class, 'info']);
    // Route::get('permissoes', 'Admin\ConfigController@permissoes');
    Route::get('permissoes', [Admin\ConfigController::class, 'permissoes']);
});

Route::fallback(function() {
    return view('404');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
