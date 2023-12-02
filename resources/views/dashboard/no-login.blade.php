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
    <p>Je moet ingelogd zijn om jouw dashboard te kunnen zien!</p>
    @include('partials.navbar')
</main>
</body>
</html>
