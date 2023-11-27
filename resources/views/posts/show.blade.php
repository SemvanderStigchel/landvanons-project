<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/read.css'])
</head>
<body style="background-color: #F6F7FC">
<header class="flex content-between align-center row mg-3 mg-bottom-0" style="position: absolute">
    <a class="text-large light-gray-main decoration-none z-90" href="/posts">‹ Home</a>

</header>
<div class="w-100 background-image flex align-center content-center"
     style="overflow: hidden; height: 30vh; background-image: url('{{asset('uploads/posts/'.$post->image)}}')">
<div style="width: 100%; height: 30vh; position: absolute; background-color: #212121bd; z-index: 2"></div>
    <h1 class="white z-90" style="font-weight: normal">{{$post->title}}</h1>
</div>
<div style="width: 100vw;" class="flex align-center content-start mg-5 mg-top-1 mg-bottom-0">
    @foreach($post->categories as $category)
        <a class="button button-slim bg-green-main mg-1 z-90"
           style="background-color: rgba(147, 208, 45, 0.50); width: fit-content">{{$category->name}}</a>
    @endforeach
</div>
@guest
@else
    @if(Auth::user()->role === 2)
        <div style="width: 100px;" class="flex align-center content-between mg-5 mg-top-1 mg-bottom-0">
            <a class="button button-outline border-green green-main decoration-none" style="padding: 0.27rem 0.7rem; margin-left: 0;" href="{{route('posts.edit', $post)}}">Aanpassen</a>
            <form action="{{route('posts.destroy', $post)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="button button-outline border-red decoration-none red" type="submit">Verwijderen</button>
            </form>
        </div>
    @endif
@endguest
<section class="mg-5">
    <h2 class="gray mg-bottom-0 scrollAnimation">{{$post->subtitle}}</h2>
    <p class="gray mg-top-0 scrollAnimation">{{$post->article}}</p>
</section>
@include('partials.navbar')
</body>
</html>

<body>

</body>
</html>


