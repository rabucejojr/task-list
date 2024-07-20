@extends('layouts.app')
@section('title', 'Task List')
@section('content')


    <div class="mt-4">
        <a href="{{ route('tasks.create') }}"
            class="inline-block bg-blue-500 hover:bg-blue-700 text-black font-bold py-2 px-4 rounded">
            Add Task
        </a>
    </div>
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.showPerId', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>No tasks</div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks->links('pagination::bootstrap-5') }}
        </nav>
    @endif
@endsection
