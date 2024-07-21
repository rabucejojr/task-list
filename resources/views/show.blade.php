@extends('layouts.app')
@section('title', $task->title)
@section('content')

    <div class="bg-white shadow-md rounded p-6 mb-6">
        <p class="text-gray-700">{{ $task->description }}</p>
        @if ($task->long_description)
            <p class="text-gray-700 mt-4">{{ $task->long_description }}</p>
        @endif
        <p class="text-gray-500 mt-4">Created at: {{ $task->created_at }}</p>
        <p class="text-gray-500">Updated at: {{ $task->updated_at }}</p>

        <div class="mt-6 flex space-x-4">
            <a href="{{ route('tasks.edit', ['id' => $task->id]) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit
            </a>
        </div>

        <div class="mt-4">
            <form action="{{ route('tasks.toggle-complete', ['id' => $task->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mark as {{ $task->completed ? 'not completed' : 'completed' }}
                </button>
            </form>
        </div>

        <div class="mt-4">
            <form action="{{ route('tasks.destroy', ['id' => $task->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>
        </div>
    </div>

@endsection
