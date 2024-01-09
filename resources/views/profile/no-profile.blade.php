<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/news.css'])
    <title>Profile</title>
</head>
<body style="background-color: #F6F7FC; overflow-x: hidden">
<header class="pd-4" style="width: 100vw; height: 25vh; background-color: #72B94F; padding-top: 2rem;">
    <h1 class="mg-0 mg-top-0 white">Profiel</h1>
</header>
<div class="container bg-white flex column align-center" style="width: 100vw;">
    <p class="mg-3">U kunt geen profielgegevens zien omdat u nog niet bent ingelogd</p>
</div>
@include('partials.navbar')
</body>
</html>
