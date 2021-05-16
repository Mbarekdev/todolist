<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
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

// Show the page to do list content route
Route::get('/', [TodosController::class, 'index']);

// Add the task to do list route
//Route::get('/addTask', [TodosController::class, 'create']);
Route::post('/Taskadded', [TodosController::class, 'create'])->name('addtask');
Route::delete('/deleteTask/{id}', [TodosController::class, 'destroy'])->name('deletetask');
Route::post('/updatecheck/{id}', [TodosController::class, 'edit'])->name('updatecheck');
Route::post('/deleteAll', [TodosController::class, 'destroyall'])->name('deleteAll');
Route::post('/updatedtodo', [TodosController::class, 'update'])->name('updatetodo');

