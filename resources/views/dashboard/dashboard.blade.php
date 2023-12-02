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
<body style="background-color: #F6F7FC">
<main>
    <div>@if($user->trees === null) N/A Bomen @else {{$user->trees}} Bomen @endif</div>
    <div>@if($user->animals === null) N/A Dieren @else {{$user->animals}} Dieren @endif</div>
    <div>@if($user->trees === null) N/A kg Co2 opgenomen per jaar @else {{$user->trees * 25}} kg Co2 opgenomen per jaar @endif</div>
    <div>{{$user->points}} Punten</div>
    @include('partials.navbar')
</main>
</body>
</html>
