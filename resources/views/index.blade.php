@extends('layouts.app')
@section('title', 'Task List')
@section('content')

    <div>
        <a href="{{ route('tasks.create') }}">Add Task</a>
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
