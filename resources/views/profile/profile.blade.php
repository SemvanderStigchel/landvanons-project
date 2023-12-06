<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<h1>Profiel pagina</h1>

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>
        <p>Email: {{ $user->email }}</p>
    </div>
@endsection

</body>
</html>
