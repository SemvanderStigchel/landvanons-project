
@extends('layouts.app')

@section('content')
    <!-- Overlay met pop-up -->
    <div class="overlay" id="popup-overlay">
        <div class="popup">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Leuk dat je meedoet!</h2>
            <p>Je hebt 100 punten verdiend.</p>

            <img src="{{ asset('path/to/your/image.jpg') }}" alt="Leuk dat je meedoet!">
            <button class="share-button">Delen</button>
        </div>
    </div>

    <h1>Top</h1>
    <p>Je hebt je ingeschreven!</p>
@endsection
