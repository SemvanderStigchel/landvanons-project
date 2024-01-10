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
<header style="width: 100vw; height: 20vh;" class="bg-purple-main flex align-center mg-bottom-4">
    <h1 class="pd-3 mg-top-0 mg-bottom-0 white">Alle accounts</h1>
</header>
@include('partials.navbar')
<form action="{{route('account-dashboard.search')}}" method="GET" style="width: 100vw;"
      class="flex align-center content-center row">
    @csrf
    <input type="text" placeholder="Zoek een gebruiker"
           aria-label="Search bar" name="search" class="button button-outline border-auth border-1 button-50 pd-2 gray" style="border: 2px solid gray;" value="{{Request::get('search')}}">
    <button type="submit" class="button button-slim bg-green-main">Zoek</button>
</form>
<table style="width: 100vw;" class="flex align-center column">
    <tr>
        <th class="gray">Naam</th>
        <th class="gray">Type account</th>
    </tr>
    @foreach($users as $user)
        <tr>
            <td>{{$user->name}}</td>
            @if($user->id !== Auth::id())
                @if($user->role === 2)
                    <td>
                        <form action="{{route('account-dashboard.make-user', $user)}}" method="POST">
                            @csrf
                            <button type="submit" class="button button-slim text-small white"
                                    style="background-color: red; width: 100px;">Admin
                            </button>
                        </form>
                    </td>
                @else
                    <td>
                        <form action="{{route('account-dashboard.make-admin', $user)}}" method="POST">
                            @csrf
                            <button type="submit" class="button button-slim text-small bg-green-light white"
                                    style="width: 100px;">Gebruiker
                            </button>
                        </form>
                    </td>
                @endif
            @endif
        </tr>
    @endforeach
</table>
</body>
</html>
