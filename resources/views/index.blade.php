@extends('layouts.app')
@section('title', 'Task List')
@section('content')
    @forelse($tasks as $task)
        <div>
            <a href="{{ route('tasks.showPerId', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>No tasks</div>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
