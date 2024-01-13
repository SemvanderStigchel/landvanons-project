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
    <form action="{{route('profile.update-credentials')}}" method="POST"
          class="flex column align-center bg-white pd-3 border-2" style="width: 85vw; transform: translateY(-30%)">
        @csrf
        @method('PUT')
        <div class="flex column">
            <label for="name" class="gray mg-1" style="font-weight: bold">Naam:</label>
            <input type="text" class="button button-outline gray border-black" id="name" name="name"
                   value="{{$user->name}}">
            @error('name')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div class="flex column">
            <label for="email" class="gray mg-1" style="font-weight: bold">Email:</label>
            <input type="email" class="button button-outline gray border-black" id="email" name="email"
                   value="{{$user->email}}">
            @error('email')
            <div>{{$message}}</div>
            @enderror
        </div>
        <div class="flex column">
            <label for="phone" class="gray mg-1" style="font-weight: bold">Telefoonnummer:</label>
            <input type="text" class="button button-outline gray border-black button-50" id="phone" name="phone"
                   value="{{$user->phone}}">
            @error('phone')
            <div>{{$message}}</div>
            @enderror
            <input type="submit" class="mg-top-4 pd-3 button white bg-purple-main button-fill"
                   value="Update jouw gegevens" style="width: 98%;">
        </div>

    </form>
    <section style="transform: translateY(-20%)" class="w-100 flex align-center column">
        <h2 class="gray mg-bottom-1">Ingeschreven vrijwilligerstaken</h2>
        <section class="w-100 flex align-center column content-center mg-top-2 mg-bottom-5">
            @foreach($user->enrollments as $task)
                <a href="{{route('tasks.show', $task)}}" style="text-decoration: none">
                <div class="newsItem1 border-1 bg-white flex align-center mg-2 scrollAnimation shadow ">
                    <img src="{{asset('uploads/tasks/'.$task->image)}}" class="articleImg mg-3 border-1 object-cover"
                         alt="uploaded image">
                    <div class="flex content-between column articleText">
                        <p class="black mg-1">{{$task->name}}</p>
                        <p class="text-small gray mg-1">{{$task->date}}</p>
                    </div>
                </div>
                </a>
            @endforeach
        </section>
    </section>
</div>
@include('partials.navbar')
</body>
</html>
