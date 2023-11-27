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
<body>
<script>
    function submitForm() { // submits form
        document.getElementById("submitForm").submit();
    }

    function btnSearchClick() {
        if (document.getElementById("submitForm")) {
            let loading = document.getElementById("check");
            loading.classList.add("fadeUp");
            setTimeout("submitForm()", 1300); // set timout
        }
    }

</script>
<header class="flex content-between align-center row mg-3 mg-bottom-0" style="position: absolute">
    <a class="text-large light-gray-main decoration-none z-90" href="/posts">‹ Home</a>

</header>
<form action="{{route('posts.update', $post)}}" method="POST" id="submitForm" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <div class="w-100 background-image flex align-center content-center"
         style="overflow: hidden; height: 30vh; background-image: url('{{asset('uploads/posts/'.$post->image)}}')">
        <div style="width: 100%; height: 30vh; position: absolute; background-color: #212121bd; z-index: 2"></div>
        <div class="flex column z-90 content-center"><label for="title" class="white text-medium mg-1 z-90"
                                                            style="font-weight: bold; max-width: 95vw; !important;">Titel</label>
            <input class="button-outline border-white button white z-90"
                   onkeypress="this.style.width = ((this.value.length + 1) * 12) + 'px';"
                   style="max-width: 85vw; font-size: 1.4rem" type="text" id="title" name="title" placeholder="Titel"
                   value="{{$post->title}}">
            @error('title')
            <div>Error</div>
            @enderror
        </div>
    </div>

    <section class="mg-5">
        <label for="subtitle" class="gray text-medium mg-1" style="font-weight: bold;">Subtitel</label>
        <input type="text" class="gray border-black button-outline button"
               style="font-weight: bold; font-size: 1.6rem; height: fit-content; width: 80vw;"
               id="subtitle" name="subtitle" placeholder="Ondertiteling"
               value="{{$post->subtitle}}">
        @error('subtitle')
        <div>Error</div>
        @enderror
        <label for="article" class="gray text-medium mg-1" style="font-weight: bold;">Artikel</label>
        <textarea class="button button-outline border-black gray" style="width: 80vw;" name="article" id="article"
                  placeholder="Typ hier de tekst van de nieuwspost" rows="20"
        >{{$post->article}}</textarea>
        @error('article')
        <div>Error</div>
        @enderror
        <label for="image" class="gray text-medium mg-1" style="font-weight: bold">Foto*</label>
        <input type="file" id="image" name="image" alt="Upload photo" class="button bg-green-main white">
        @error('image')
        <div>Error</div>
        @enderror
    </section>

    <h3 class="mg-5 mg-bottom-1 gray">Categoriën</h3>
    @foreach($categories as $category)
        <input type="checkbox" name="categories[]" id="category{{$category->id}}" class="mg-5 mg-bottom-0 mg-top-0"
               @if($post->categories->contains($category->id)) checked @endif value="{{$category->id}}">
        <label for="category{{$category->id}}">{{$category->name}}</label>
    @endforeach
    @error('categories')
    <div>Error</div>
    @enderror
    <div class="mg-5">
        <input type="button" onclick="btnSearchClick()" value="Update post"
               class="button button-outline border-green green-main mg-0">
    </div>
</form>
<div class="w-100 flex align-center content-center">
    <img id="check" src="{{asset('images/loading.webp')}}" style="width: 50px; opacity: 0;">
</div>

</body>
</html>
