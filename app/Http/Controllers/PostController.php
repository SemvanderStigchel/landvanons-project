<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'admin'])->except('index', 'show');
        $this->middleware('owner-post')->except('index', 'show', 'create', 'store');
    }
    public function index()
    {
        $posts = Post::all();
        return view('posts.read', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:150',
            'subtitle' => 'required|max:255',
            'article' => 'required',
            'image' => 'image',
            'categories' => 'required|min:1|exists:categories,id'
        ]);

        $post = new Post();
        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->article = $request->input('article');
        $post->image = $request->input('image');
        $post->user_id = \Auth::user()->id;

        if ($post->save())
        {
            $post->categories()->attach($request->input('categories'));
        }

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:150',
            'subtitle' => 'required|max:255',
            'article' => 'required',
            'image' => 'image',
            'categories' => 'required|min:1|exists:categories,id'
        ]);

        $post->title = $request->input('title');
        $post->subtitle = $request->input('subtitle');
        $post->article = $request->input('article');
        $post->image = $request->input('image');
        $post->user_id = \Auth::user()->id;

        if ($post->save())
        {
            $post->categories()->detach();
            $post->categories()->attach($request->input('categories'));
        }

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->categories()->detach();
        $post->delete();

        return redirect()->route('posts.index');
    }
}
