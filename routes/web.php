<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// redirect if route not exists
Route::fallback(function () {
    return view('404', [], 404);
});

//show index page
Route::get('/', function () {
    return redirect()->route('tasks.show');
})->name('tasks.index');

//edit task
Route::get('/tasks/{id}/edit', [TaskController::class, 'edit'])->name('tasks.edit');

//update task
Route::put('/tasks/{id}', [TaskController::class, 'update'])->name('tasks.update');

// display all tasks
Route::get('/tasks', [TaskController::class, 'show'])->name('tasks.show');

// create/add task
Route::view('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

//display tasks per id
Route::get('/tasks/{id}', [TaskController::class, 'showPerId'])->name('tasks.showPerId');

//save tasks
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

//delete task
Route::delete('/tasks/{id}', [TaskController::class, 'delete'])->name('tasks.destroy');

//toggle complete
Route::put('/tasks/{id}/toggle-complete',[TaskController::class,'completed'])->name('tasks.toggle-complete');
