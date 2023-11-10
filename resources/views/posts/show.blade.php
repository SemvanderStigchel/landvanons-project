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
<h1>{{$post->title}}</h1>
<p>{{$post->subtitle}}</p>
<p>{{$post->article}}</p>

<a href="{{route('posts.edit', $post)}}">Edit deze post(normaal alleen voor admins)</a>
<form action="{{route('posts.destroy', $post)}}" method="POST">
    @csrf
    @method('DELETE')
<button type="submit">Verwijder deze post(normaal alleen voor admins)</button>
</form>
</body>
</html>
