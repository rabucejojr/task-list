@extends('layouts.app')
@section('title',$task->title)
@section('content')
    <p>{{ $task->description }}</p>
    @if ($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif
    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <div>
        <a href="{{route('tasks.edit',['id'=>$task->id])}}">Edit</a>
    </div>

    <div>
        <form action="{{route('tasks.toggle-complete',['id'=>$task])}}">
            @csrf
            @method('PUT')
            <button type="submit">
                Mark as {{{$task->completed ? 'not completed' : 'completed'}}}
            </button>
        </form>
    </div>

    <div>
        <form action="{{route('tasks.destroy',['id'=> $task->id])}}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
