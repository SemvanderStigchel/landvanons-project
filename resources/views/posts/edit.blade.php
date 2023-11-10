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
<h1>Edit post: '{{$post->title}}'</h1>
<form action="{{route('posts.edit', $post)}}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <label for="title">Titel*</label>
    <input type="text" id="title" name="title" placeholder="Typ hier de titel van de nieuwspost"
           value="{{$post->title}}">
    @error('title')
    <div>Error</div>
    @enderror

    <label for="subtitle">Ondertitel*</label>
    <textarea id="subtitle" name="subtitle" placeholder="Typ hier de ondertitel van de nieuwspost" cols="50"
              rows="2">{{$post->subtitle}}</textarea>
    @error('subtitle')
    <div>Error</div>
    @enderror

    <label for="article">Artikel*</label>
    <textarea name="article" id="article" placeholder="Typ hier de tekst van de nieuwspost" cols="150"
              rows="50">{{$post->article}}</textarea>
    @error('article')
    <div>Error</div>
    @enderror

    <label for="image">Foto*</label>
    <input type="image" id="image" name="image" alt="Upload photo">
    @error('image')
    <div>Error</div>
    @enderror

    <h3>Categoriën</h3>
    @foreach($categories as $category)
        <input type="checkbox" name="categories[]" id="category{{$category->id}}"
               @if($post->categories->contains($category->id)) checked @endif value="{{$category->id}}">
        <label for="category{{$category->id}}">{{$category->name}}</label>
    @endforeach
    @error('categories')
    <div>Error</div>
    @enderror

    <input type="submit" value="Update post">
</form>
</body>
</html>
