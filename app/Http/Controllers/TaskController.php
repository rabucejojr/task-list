<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Task;

class TaskController extends Controller
{
    //create tasks
    public function create()
    {
        return view('create');
    }

    //show all tasks
    public function show()
    {
        $tasks = Task::latest()->get();
        return view('index', [
            'tasks' => $tasks
        ]);
    }

    //show tasks per id
    public function showPerId($id)
    {
        $task = Task::findOrFail($id);
        return view('show', [
            'task' => $task
        ]);
        // dd('show per id');
    }

    //store tasks
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'long_description' => 'required'
        ]);
        $task = new Task();
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
        return redirect()->route('tasks.show', ['id' => $task->id]);
    }
}
