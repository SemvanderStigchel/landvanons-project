@extends('layouts.app')

@section('content')
    <h1>Vrijwilligerstaken</h1>
    @foreach($tasks as $task)
        <h3>{{$task->name}}</h3>
        <p>{{$task->date}}</p>
        <p>{{$task->location}}</p>
        <img src="{{asset('uploads/tasks/'.$task->image)}}" alt="Uploaded image">
        <a href="{{route('tasks.show', $task)}}">Bekijk de taak</a>
    @endforeach
    <a href="{{route('tasks.create')}}">Create taak</a>
@endsection
