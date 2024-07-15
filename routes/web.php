<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use \App\Models\Task;
// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {
//     }
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

// redirect if route not exists
Route::fallback(function () {
    return 'Page not found';
});

Route::get('/', function () {
    return redirect()->route("tasks.index");
});

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::post('/tasks',function(){
    dd('we have react the store method');
})->name('tasks.store');

// display all tasks
Route::get('/tasks', function () {
    $tasks = Task::latest()->get();
    return view('index', [
        'tasks' => $tasks
    ]);
})->name('tasks.index');

//display tasks per id
Route::get('/tasks/{id}', function ($id) {
    return view('show', ['task' => Task::findOrFail($id)]);
})->name('tasks.show');
