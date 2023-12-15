<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{$task->name}} - Vrijwilligerstaak</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="page-transition">

<!-- reusable navbar -->
@include('partials.navbar')

<!-- Banner met titel en terugknop en taak toevoegen knop -->
<div class="banner">
    <a href="javascript:history.back()" class="back-button">Terug</a>
    <h1 class="page-title">{{$task->name}}</h1>
</div>

<!-- Content of the show page -->
<div class="image-container">
    <img src="{{asset('uploads/tasks/'.$task->image)}}" alt="Uploaded image">
</div>

<div class="content-container">
    <h1>{{$task->name}}</h1>
    <p>{{$task->description}}</p>
    <p>Datum: {{$task->date}}</p>
    <p>Tijd: {{$task->time}}</p>
    <p>Adres: {{$task->location}}</p>
    <p>Lengte: {{$task->duration}}</p>
    <p>Punten te verdienen: {{$task->points_earned}} punten</p>
    <p>Aantal mensen ingeschreven voor deze taak: @if($task->users->count() === 1)
            {{$task->users->count()}} persoon
        @else
            {{$task->users->count()}} personen
        @endif </p>

    @guest
        <form action="{{route('tasks.enroll', $task)}}" method="POST">
            @csrf
            <button type="submit" class="inschrijf-button">Inschrijven</button>
        </form>
    @else
        @if($task->users->contains(Auth::user()->id))
            <form action="{{ route('tasks.unsub', $task) }}" method="POST">
                @csrf
                <button type="submit" class="bekijk-button">Uitschrijven</button>
            </form>
        @else
            <!-- Inschrijfknop weergeven als de gebruiker is ingelogd maar niet ingeschreven -->
            <form action="{{route('tasks.enroll', $task)}}" method="POST">
                @csrf
                <button type="submit" class="inschrijf-button">Inschrijven</button>
            </form>
        @endif

    @if($task->user_id === Auth::user()->id)
                <form action="{{route('tasks.pay-out-points', $task)}}" method="POST">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Punten uitkeren</button>
                </form>
    @endif

        @if(Auth::user()->role === 2)
            <form action="{{route('tasks.edit', $task)}}" method="GET">
                <button type="submit" class="edit-button">Edit</button>
            </form>
            <form action="{{route('tasks.destroy', $task)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button">Verwijderen</button>
            </form>
        @endif
    @endguest
</div>



</body>
</html>
