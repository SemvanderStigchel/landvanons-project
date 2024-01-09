<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vrijwilligerstaken</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
        }
    </style>

</head>
<body>

<!-- reusable navbar -->
@include('partials.navbar')

<!-- Banner met titel en terugknop en taak toevoegen knop -->

    <div class="banner">
        <a href="{{ route('login') }}" class="back-button">Terug</a>
        <h1 class="page-title">Vrijwilligerstaken </h1>
        @guest
        @else
            @if(Auth::user()->role === 2)
                <a href="{{route('tasks.create')}}" class="create-task-fab">
                <span class="fab-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                        <path d="M10 0C4.477 0 0 4.477 0 10C0 15.523 4.477 20 10 20C15.523 20 20 15.523 20 10C20 4.477 15.523 0 10 0ZM14 11H11V14C11 14.552 10.552 15 10 15C9.448 15 9 14.552 9 14V11H6C5.448 11 5 10.552 5 10C5 9.448 5.448 9 6 9H9V6C9 5.448 9.448 5 10 5C10.552 5 11 5.448 11 6V9H14C14.552 9 15 9.448 15 10C15 10.552 14.552 11 14 11Z" fill="white"/>
                    </svg>
                </span>
                    Nieuwe taak
                </a>
            @endif
        @endguest
    </div>


<!-- Lijst met taken -->
<ul class="task-list">
    @foreach($tasks as $index => $task)
        <li class="task-item transition-fade" style="animation-delay: {{ $index * 0.2 }}s;"> <!-- Voeg de vertraging toe -->
            <img src="{{asset('uploads/tasks/'.$task->image)}}" alt="Uploaded image">
            <div class="task-details">
                <h3>{{$task->name}}</h3>
                <p>{{$task->date}}</p>
                <p>{{$task->location}}</p>
            </div>
            <div class="bekijk-button-container">
                <a href="{{route('tasks.show', $task)}}" class="bekijk-button">Bekijken</a>
            </div>
        </li>
    @endforeach
</ul>





<script>
    document.addEventListener("DOMContentLoaded", function() {
        var fadeElements = document.querySelectorAll('.task-item');
        fadeElements.forEach(function(element) {
            element.classList.add('fade-in');
        });
    });
</script>




</body>
</html>
