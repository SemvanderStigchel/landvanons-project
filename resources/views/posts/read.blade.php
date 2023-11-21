<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Het laatste Land van Ons nieuws!</h1>
@foreach($posts as $post)
    <h3>{{$post->title}}</h3>
    <p>{{$post->subtitle}}</p>
    <img src="{{asset('uploads/posts/'.$post->image)}}" alt="Uploaded image">
    @foreach($post->categories as $category)
    <span>{{$category->name}}</span>
    @endforeach
    <a href="{{route('posts.show', $post)}}">Lees het artikel!</a>
@endforeach
@if(Auth::user()->role === 2)
    <footer>
        <a href="{{route('posts.create')}}">Create post pagina</a>
    </footer>
@endif
</body>
</html>
