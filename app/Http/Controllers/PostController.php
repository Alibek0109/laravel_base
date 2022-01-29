<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('post.index', ['posts' => $posts]);
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.create', ['categories' => $categories, 'tags' => $tags]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post = Post::create($data);

        return redirect()->route('post.index');
    }


    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }


    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', ['post' => $post, 'categories' => $categories, 'tags' => $tags]);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'tags' => '',
        ]);

        $tags = $data['tags'];
        unset($data['tags']);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route("post.show", $id);
    }

    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('post.index');
    }


    public function firstOrCreate()
    {

        Post::firstOrCreate([
            'id' => 65,
        ], [
            'title' => "65 title",
            'content' => "65 content",
            'image' => "65image",
            'likes' => "650",
            'is_published' => 1,
        ]);
    }


    public function updateOrCreate()
    {
        $post = Post::updateOrCreate([
            'id' => 33,
        ], [
            'title' => "33 title",
            'content' => "33 content",
            'image' => "33image",
            'likes' => "330",
            'is_published' => 1,
        ]);
    }
}
