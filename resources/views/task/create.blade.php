<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Vrijwilligerstaak</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
</head>
<body class="create-page">

<!-- reusable navbar -->
@include('partials.navbar')

<!-- Banner met titel en terugknop en taak toevoegen knop -->
<div class="banner">
    <a href="javascript:history.back()" class="back-button">Terug</a>
    <h1 class="page-title">Nieuwe Vrijwilligerstaak</h1>
</div>

<!-- Content of the create page -->
<div class="content-containercreate">
    <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Naam*</label>
            @error('name')
            <div>{{$message}}</div>
            @enderror
            <input type="text" id="name" name="name" placeholder="Typ hier de naam van de vrijwilligerstaak"
                   value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="description">Beschrijving*</label>
            @error('description')
            <div>{{$message}}</div>
            @enderror
            <textarea name="description" id="description" placeholder="Typ hier de tekst van de post" cols="150"
                      rows="5">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Foto*</label>
            @error('image')
            <div>{{ $message }}</div>
            @enderror
            <input type="file" id="image" name="image" alt="Upload photo">
        </div>

        <div class="form-group">
            <label for="date">Datum*</label>
            @error('date')
            <div>{{$message}}</div>
            @enderror
            <input type="date" name="date" id="date" value="{{ old('date') }}">
        </div>

        <div class="form-group">
            <label for="time">Tijd*</label>
            @error('time')
            <div>{{$message}}</div>
            @enderror
            <input type="time" name="time" id="time" value="{{ old('time') }}">
        </div>

        <div class="form-group">
            <label for="location">Adres*</label>
            @error('location')
            <div>{{$message}}</div>
            @enderror
            <input type="text" name="location" id="location"
                   placeholder="Typ hier het adres van de vrijwilligerstaak"
                   value="{{ old('location') }}">
        </div>

        <div class="form-group">
            <label for="duration">Hoe lang duurt de taak?*</label>
            @error('duration')
            <div>{{$message}}</div>
            @enderror
            <input type="text" name="duration" id="duration"
                   placeholder="Typ hier hoe lang de taak gaat duren"
                   value="{{ old('duration') }}">
        </div>

        <div class="form-group">
            <label for="points">Hoeveel punten krijgen mensen die hier aan mee doen?*</label>
            @error('points')
            <div>{{$message}}</div>
            @enderror
            <select name="points" id="points">
                <option value="50">50 punten</option>
                <option value="100">100 punten</option>
                <option value="150">150 punten</option>
            </select>
        </div>

        <button type="submit" class="inschrijf-button">Maak de post aan</button>
    </form>
</div>

</body>
</html>
