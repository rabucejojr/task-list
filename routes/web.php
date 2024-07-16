<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;
use Illuminate\Http\Request;

// redirect if route not exists
Route::fallback(function () {
    return 'Page not found';
});

Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::view('/tasks/create', 'create')->name('tasks.create');

//display tasks per id
Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');


// display all tasks
Route::get('/tasks', function () {
    $tasks = Task::latest()->get();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate([
        'title' => 'required | max:255',
        'description' => 'required',
        'long_description' => 'required'
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();

    return redirect()->route('tasks.show', ['id' => $task->id]);
    // dd('we have react the store method');

})->name('tasks.store');

