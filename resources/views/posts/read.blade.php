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
<header class="flex content-between align-center row mg-3 mg-bottom-0 ">
    <h1 class="text-large gray">Nieuws</h1>
    <div class="flex content-center align-center">
        <a class="button button-outline border-purple purple-main decoration-none scrollAnimation" style="font-weight: bold; margin-left: 0;" href="{{route('posts.create')}}">Inloggen</a>
    </div>
</header>
<section class="flex row align-center content-center" style="width: 100vw">

        <div class="flex row align-center scrollAnimation" style="overflow: scroll; width: 95vw; ">
            @foreach($posts as $post)
            <div class="article background-image border-1 column content-between flex mg-1 shadow"
                 style="background-image: url('{{asset('uploads/posts/'.$post->image)}}')">
                <div class="gradient-overlay"></div>
                <div class="z-90 mg-2 mg-top-4">
                @foreach($post->categories as $category)
                    <a class="button button-slim bg-green-main mg-0 z-90"
                       style="background-color: rgba(147, 208, 45, 0.50)">{{$category->name}}</a>
                @endforeach
                </div>
                <div class="mg-2 mg-top-0 z-90" style="margin-bottom: 2rem">
                    <h2 class="white mg-0" style="font-weight: normal">{{$post->title}}</h2>
                    <p class="mg-0 light-gray-main z-90" style="font-size: 0.7rem">{{$post->created_at}}</p>
                </div>
                    <a class="mg-2 white show-more text-medium decoration-none z-90" style="width: unset !important;" href="{{route('posts.show', $post)}}">Lees Meer</a>
            </div>
            @endforeach
        </div>

</section>
<section class="w-100 flex align-center column content-center mg-top-5" style="margin-bottom: 40px;">
    <h3 class="mg-3 gray scrollAnimation mg-bottom-1" style="width: 95vw">Vrijwillegers taken</h3>
    @foreach($posts as $post)
    <div class="newsItem border-1 bg-white flex align-center mg-2 scrollAnimation shadow ">
        <img src="{{asset('uploads/posts/'.$post->image)}}" class="articleImg mg-3 border-1 object-cover" alt="uploaded image">
        <div class="flex content-between column articleText">
            <p class="black mg-1">{{$post->title}}</p>
            <p class="text-small gray mg-1">Land Van Ons</p>
        </div>
    </div>
    @endforeach
</section>
    @guest
    @else
        @if(Auth::user()->role === 2)
            <footer class="mg-3" style="margin-bottom: 100px">
                <a class="button button-outline border-purple purple-main decoration-none scrollAnimation" style="font-weight: bold; margin-left: 0;" href="{{route('posts.create')}}">Create Post</a>
            </footer>
        @endif
    @endguest
    @include('partials.navbar')
    <div>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</main>
</body>
</html>
