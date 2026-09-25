<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController; //we have connected the TaskController in the web.php Route

Route::get('/', function () {
    return view('welcome');
});

//Task Routes //we are setting up our Task Ruotes
Route::get('/tasks',[TaskController::class, 'index']);//means to view all task 
Route::get('/tasks/create',[TaskController::class, 'create']);//means to create a new task
Route::post('/tasks',[TaskController::class, 'store']);//means to save a new task in database
Route::get('/tasks/{id}/edit',[TaskController::class, 'edit']);//means to edit the task by its id
Route::put('/tasks/{id}',[TaskController::class, 'update']);//means to update the task by its id
Route::delete('/tasks/{id}',[TaskController::class, 'destroy']);//means to delete a task by its id
Route::patch('/tasks/{id}/status',[TaskController::class, 'updatestatus']);//means to change/update the status task by its id
//either pending and completed
