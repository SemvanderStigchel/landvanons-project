<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<h1>Profiel pagina</h1>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Jouw Profiel</h1>
        <form action="{{route('profile.update-credentials')}}" method="POST">
            @csrf
            @method('PUT')

            <label for="name">Naam:</label>
            <input type="text" id="name" name="name" value="{{$user->name}}">
            @error('name')
            <div>{{$message}}</div>
            @enderror

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{$user->email}}">
            @error('email')
            <div>{{$message}}</div>
            @enderror

            <label for="phone">Telefoonnummer:</label>
            <input type="text" id="phone" name="phone" value="{{$user->phone}}">
            @error('phone')
            <div>{{$message}}</div>
            @enderror

            <input type="submit" value="Update jouw gegevens">
        </form>

        <h2>Ingeschreven vrijwilligerstaken</h2>
        @foreach($user->enrollments as $task)
            <h3>{{$task->name}}</h3>
            <p>{{$task->date}}</p>
            <p>{{$task->location}}</p>
            <img src="{{asset('uploads/tasks/'.$task->image)}}" alt="Uploaded image">
            <a href="">Bekijk de taak</a>
        @endforeach

    </div>
@endsection

</body>
</html>
