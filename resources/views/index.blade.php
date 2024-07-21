@extends('layouts.app')
@section('title', 'Task List')
@section('content')

    <div class="m-4">
        <a href="{{ route('tasks.create') }}"
            class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Task
        </a>
    </div>
    
    @forelse($tasks as $task)
        <div class="bg-white shadow-md rounded p-4 mb-4">
            <a href="{{ route('tasks.showPerId', ['id' => $task->id]) }}" class="text-blue-500 hover:underline">{{ $task->title }}</a>
        </div>
    @empty
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">No tasks available.</span>
        </div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links('pagination::bootstrap-5') }}
        </nav>
    @endif

@endsection
