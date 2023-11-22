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
@endsection
