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
<h1>Alle accounts</h1>

<form action="{{route('account-dashboard.search')}}" method="GET">
    @csrf
    <input type="text" placeholder="Zoek een gebruiker"
           aria-label="Search bar" name="search" value="{{Request::get('search')}}">
    <button type="submit">Zoek</button>
</form>
<table>
    <tr>
        <th>Naam</th>
        <th>Email</th>
        <th>Telefoonnummer</th>
        <th>Rol</th>
        <th>Maak admin</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>@if($user->role === 2)
                    Admin
                @else
                    Gebruiker
                @endif</td>
            @if($user->role === 2)
                <td>
                    <form action="{{route('account-dashboard.make-user', $user)}}" method="POST">
                        @csrf
                        <button type="submit">Maak Gebruiker</button>
                    </form>
                </td>
            @else
                <td>
                    <form action="{{route('account-dashboard.make-admin', $user)}}" method="POST">
                        @csrf
                        <button type="submit">Maak Admin</button>
                    </form>
                </td>
            @endif
        </tr>
    @endforeach
</table>
</body>
</html>
