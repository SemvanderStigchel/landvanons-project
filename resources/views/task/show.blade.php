@extends('layouts.app')

@section('content')
    <img src="{{asset('uploads/tasks/'.$task->image)}}" alt="Uploaded image">
    <h1>{{$task->name}}</h1>
    <p>{{$task->description}}</p>
    <p>Datum: {{$task->date}}</p>
    <p>Tijd: {{$task->time}}</p>
    <p>Adres: {{$task->location}}</p>
    <p>Lengte: {{$task->duration}}</p>
    <p>Punten te verdienen: {{$task->points_earned}} punten</p>
    @if($task->users->contains(Auth::user()->id))
        <form action="{{route('tasks.unsub', $task)}}" method="POST">
            @csrf
            <button type="submit">Uitschrijven</button>
        </form>
    @else
        <form action="{{route('tasks.enroll', $task)}}" method="POST">
            @csrf
            <button type="submit">Inschrijven</button>
        </form>
    @endif

    @if(Auth::user()->role === 2)
        <a href="{{route('tasks.edit', $task)}}">Edit deze post</a>
        <form action="{{route('tasks.destroy', $task)}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Verwijder deze post</button>
        </form>
    @endif
@endsection
