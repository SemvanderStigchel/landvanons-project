<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/dash.css'])
</head>
<body style="background-color: #F6F7FC">
<main>
    <div class="banner">
        <a href="{{route('posts.index')}}" class="back-button">Terug</a>
        <div class="title">Overzicht</div>
    </div>


    <!-- reusable navbar -->
    @include('partials.navbar')

    <!-- ... (your existing HTML) -->

    {{-- Rectangle with tiles --}}
    <div class="tile-rectangle scrollAnimation">
        <div class="image-tile">
            <div class="image-tile-item scrollAnimation">
                <img src="{{ asset('images/tile1.svg') }}" alt="Cartoon boom">
                <div class="image-text">N/A Bomen</div>
            </div>
            <div class="image-tile-item scrollAnimation">
                <img src="{{ asset('images/tile2.svg') }}" alt="Cartoon koe">
                <div class="image-text">N/A Dieren</div>
            </div>
            <div class="image-tile-item scrollAnimation">
                <img src="{{ asset('images/tile3.svg') }}" alt="Wolkje Co2">
                <div class="image-text">N/A kg Co2</div>
            </div>
            <div class="image-tile-item scrollAnimation">
                <img src="{{ asset('images/tile4.svg') }}" alt="Medaille">
                <div class="image-text">N/A Punten</div>
            </div>
        </div>
    </div>

    <div id="detailsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div id="detailsText"></div>
        </div>
    </div>

    <div id="not-logged-in" class="mg-4 pd-2 border-2 scrollAnimation">
        <h4 class="white mg-0">Je moet ingelogd zijn om jouw dashboard te kunnen zien!</h4>
    </div>
    @include('partials.navbar')
</main>
</body>
</html>
