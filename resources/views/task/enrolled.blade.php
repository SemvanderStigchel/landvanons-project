<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=yes, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/news.css'])
</head>
<body style="display: flex; align-items: center; justify-content: center; height: 100vh;"></body>

<div class="overlay" style="display: none;" id="popup-overlay">
    <div class="popup">
        <span class="close-btn" onclick="closePopup()">&times;</span>
        <h2>Leuk dat je meedoet!</h2>
        <p>Je hebt 100 punten verdiend.</p>

        <img src="{{ asset('path/to/your/image.jpg') }}" alt="Leuk dat je meedoet!">
        <button class="share-button">Delen</button>
    </div>
</div>

<div
    style="width: 60vw; height: 60vh; background-color: #db3397; border-radius: 20px; display: flex; align-items: center; flex-direction: column; color: white; position: relative;">
    <a href="{{route('tasks.index')}}"
       style="text-decoration: none; color: white;position: absolute; top: 0; left: 10px; font-size: 2rem;">&times;</a>
    <div style="position: relative">

        <img src="{{ asset('images/medal.png') }}" class="medal"
             style="width: 180px; margin-top: 3rem; filter: drop-shadow(6px 9px 3px #464646); ">
        <img id="star2" src="{{asset('images/confPNG.gif')}}" style="position: absolute; width: 120px; left: -10%; top: 60%;">
    </div>
    <h1 style="font-size: 1.5rem; margin-top: 1rem; margin-bottom: 1rem;">Bedankt!</h1>
    <p style="font-size: 0.8rem; margin: 0 20px; text-align: center;">U staat ingeschreven voor de vrijwillegerstaak. U
        kunt bij uw profiel zien</p>
</div>
@include('partials.navbar')
