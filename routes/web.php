<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamundaController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// TASK ROUTES

Route::get('tasks/tasks', [CamundaController::class, 'getTasks']);
Route::get('/tasks/{assignee?}', [CamundaController::class, 'getTasks']);

// USER ROUTES
Route::get('/users/{user}', [UserController::class, 'show']);