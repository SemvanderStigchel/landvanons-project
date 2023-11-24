@extends('layouts.app')

@section('content')
    <h1>Edit taak {{$task->name}}</h1>
    <form action="{{route('tasks.update', $task)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <label for="name">Naam*</label>
        <input type="text" id="name" name="name" placeholder="Typ hier de naam van de vrijwilligerstaak"
               value="{{$task->name}}">
        @error('name')
        <div>Error</div>
        @enderror

        <label for="description">Beschrijving*</label>
        <textarea name="description" id="description" placeholder="Typ hier de tekst van de post" cols="150"
                  rows="50">{{$task->description}}</textarea>
        @error('description')
        <div>Error</div>
        @enderror

        <label for="image">Foto*</label>
        <input type="file" id="image" name="image" alt="Upload photo">
        <img src="{{asset('uploads/tasks/'.$task->image)}}" alt="Uploaded image">
        @error('image')
        <div>Error</div>
        @enderror

        <label for="date">Datum*</label>
        <input type="date" name="date" id="date" value="{{$task->date}}">
        @error('date')
        <div>Error</div>
        @enderror

        <label for="time">Tijd*</label>
        <input type="time" name="time" id="time" value="{{$task->time}}">
        @error('time')
        <div>Error</div>
        @enderror

        <label for="location">Adres*</label>
        <input type="text" name="location" id="location" placeholder="Typ hier het adres van de vrijwilligerstaak"
               value="{{$task->location}}">
        @error('location')
        <div>Error</div>
        @enderror

        <label for="duration">Hoe lang duurt de taak?*</label>
        <input type="text" name="duration" id="duration" placeholder="Typ hier hoe lang de taak gaat duren"
               value="{{$task->duration}}">
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

        <input type="submit" value="Update de post">
    </form>
@endsection
