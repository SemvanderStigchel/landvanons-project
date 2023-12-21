<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Land Van Ons</title>
    @vite(['resources/css/app.css'])
</head>
<body>
<header class="flex content-between align-center row mg-3 mg-bottom-0">
    <h1 class="text-large gray">Nieuwe Post</h1>

</header>
<main>
    <section class="mg-3">
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex column">
                @error('title')
                <div>{{$message}}</div>
                @enderror
                <label for="title" class="gray text-medium" style="font-weight: bold">Titel</label>
                <input type="text" id="title" name="title"
                       class="button button-outline border-black mg-0 gray text-small w-75 mg-bottom-4"
                       placeholder="Plaats hier uw titel"
                       value="{{old('title')}}">

                @error('subtitle')
                <div>{{$message}}</div>
                @enderror
                <label for="subtitle" class="gray text-medium" style="font-weight: bold">Ondertitel</label>
                <input type="text" id="subtitle" name="subtitle"
                          class="button button-outline border-black mg-0 gray text-small w-75 mg-bottom-4"
                          placeholder="Plaats hier uw subtitel" cols="50"
                          rows="2">{{old('subtitle')}}</input>

                @error('article')
                <div>{{$message}}</div>
                @enderror
                <label for="article" class="gray text-medium" style="font-weight: bold">Artikel</label>
                <textarea name="article" id="article"
                          class="button button-outline border-black mg-0 gray text-small w-75"
                          placeholder="Plaats hier uw artikel" cols="150"
                          rows="20">{{old('article')}}</textarea>

                @error('image')
                <div>{{$message}}</div>
                @enderror
                <label for="image">Foto*</label>
                <input type="file" id="image" name="image" alt="Upload photo">

                @error('categories')
                <div>{{$message}}</div>
                @enderror
                <h3>Categoriën</h3>
                @foreach($categories as $category)
                    <input type="checkbox" name="categories[]" id="category{{$category->id}}" value="{{$category->id}}">
                    <label for="category{{$category->id}}">{{$category->name}}</label>
                @endforeach

                <input type="submit" value="Maak de post aan">
            </div>
        </form>
    </section>
</main>
</body>
</html>
