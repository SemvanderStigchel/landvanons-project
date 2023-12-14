<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit taak {{$task->name}} - Vrijwilligerstaak</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="page-transition edit-page">

<!-- Herbruikbare navbar -->
@include('partials.navbar')

<!-- Banner met titel en terugknop en taak toevoegen knop -->
<div class="banner">
    <a href="javascript:history.back()" class="back-button">Terug</a>
    <h1 class="page-title">Edit taak {{$task->name}}</h1>
</div>

<!-- Inhoud van de edit-pagina -->
<div class="content-container edit">
    <form action="{{route('tasks.update', $task)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="name">Naam*</label>
            <input type="text" id="name" name="name" placeholder="Typ hier de naam van de vrijwilligerstaak" value="{{$task->name}}">
            @error('name')
            <div>Error</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Beschrijving*</label>
            <textarea name="description" id="description" placeholder="Typ hier de tekst van de post" cols="50" rows="10">{{$task->description}}</textarea>
            @error('description')
            <div>Error</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="image">Foto*</label>
            <input type="file" id="image" name="image" alt="Upload photo">
            <img src="{{asset('uploads/tasks/'.$task->image)}}" alt="Uploaded image" style="max-width: 100%; height: auto;">
            @error('image')
            <div>Error</div>
            @enderror
        </div>



        <button type="submit" class="inschrijf-button">Aanpassen</button>
    </form>
</div>



</body>

</html>
