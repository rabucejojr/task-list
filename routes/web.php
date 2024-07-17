<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// redirect if route not exists
Route::fallback(function () {
    return 'Page not found';
});

//show index page
Route::get('/', function () {
    return redirect()->route('tasks.show');
})->name('tasks.index');

Route::get('/tasks/{id}/edit', function () {
    return view('edit');
})->name('tasks.edit');

//edit task
Route::put('/tasks/{id}', [TaskController::class, 'edit'])->name('tasks.update');

// display all tasks
Route::get('/tasks', [TaskController::class, 'show'])->name('tasks.show');

// create/add task
Route::view('/tasks/create', [TaskController::class, 'create'])->name('tasks.create');

//display tasks per id
Route::get('/tasks/{id}', [TaskController::class, 'showPerId'])->name('tasks.showPerId');

//save tasks
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
