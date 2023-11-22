@extends('layouts.app')

@section('content')
    <h1>Maak een nieuws post aan</h1>
    <form action="{{route('tasks.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="name">Naam*</label>
        <input type="text" id="name" name="name" placeholder="Typ hier de naam van de vrijwilligerstaak"
               value="{{old('name')}}">
        @error('name')
        <div>Error</div>
        @enderror

        <label for="description">Beschrijving*</label>
        <textarea name="description" id="description" placeholder="Typ hier de tekst van de post" cols="150"
                  rows="50">{{old('description')}}</textarea>
        @error('description')
        <div>Error</div>
        @enderror

        <label for="image">Foto*</label>
        <input type="file" id="image" name="image" alt="Upload photo">
        @error('image')
        <div>Error</div>
        @enderror

        <label for="date">Datum*</label>
        <input type="date" name="date" id="date" value="{{old('date')}}">
        @error('date')
        <div>Error</div>
        @enderror

        <label for="time">Tijd*</label>
        <input type="time" name="time" id="time" value="{{old('time')}}">
        @error('time')
        <div>Error</div>
        @enderror

        <label for="location">Adres*</label>
        <input type="text" name="location" id="location" placeholder="Typ hier het adres van de vrijwilligerstaak"
               value="{{old('location')}}">
        @error('location')
        <div>Error</div>
        @enderror

        <label for="duration">Hoe lang duurt de taak?*</label>
        <input type="text" name="duration" id="duration" placeholder="Typ hier hoe lang de taak gaat duren"
               value="{{old('duration')}}">
        @error('duration')
        <div>Error</div>
        @enderror

        <label for="points">Hoeveel punten krijgen mensen die hier aan mee doen?*</label>
        <select name="points" id="points">
            <option value="50">50 punten</option>
            <option value="100">100 punten</option>
            <option value="150">150 punten</option>
        </select>
        @error('points')
        <div>Error</div>
        @enderror

        <input type="submit" value="Maak de post aan">
    </form>
@endsection
