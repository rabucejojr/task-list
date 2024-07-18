<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
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
        $tasks = Task::latest()->paginate(10);
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
    }

    //store tasks
    public function store(TaskRequest $request)
    {
        $data = $request->validated();
        $task = new Task();
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
        return redirect()->route('tasks.show', ['task' => $task->id]);
    }

    //edit task
    public function edit($id)
    {
        return view('edit', [
            'task' => Task::findOrFail($id)
        ]);
    }

    //update task
    public function update($id, TaskRequest $request)
    {
        $data = $request->validated();
        $task = Task::findOrFail($id);
        $task->title = $data['title'];
        $task->description = $data['description'];
        $task->long_description = $data['long_description'];
        $task->save();
        return redirect()->route('tasks.show', ['task' => $task->id])->with('success', 'Task updated successfully!');
    }

    //delete task
    public function delete(Task $task, $id)
    {
        // dd('delete function');
        $task = Task::find($id);
        if (!$task) {
            return response()->json(['message' => 'Task not found']);
        } else {
            $task->delete();
        }

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully!');
    }

    //toggle complete
    public function completed(Task $task){
        $task->toggleComplete();
        return redirect()->back()->with('success','Task completed!');
    }
}
