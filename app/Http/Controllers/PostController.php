<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        return view('post.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required'
        ]);

        $postModel = new Post;
        $postModel->title = $request->input('title');
        $postModel->content = $request->input('content');
        $postModel->image = $request->input('image');
        $postModel->save();


        return redirect()->route('post.index');
    }


    public function show($id) {
        $post = Post::findOrFail($id);
        return view('post.show', ['post' => $post]);
    }


    public function edit($id) {
        $post = Post::findOrFail($id);
        return view('post.edit', ['post' => $post]);
    }


    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'required',
        ]);

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->image = $request->input('image');
        $post->save();

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
        ],[
            'title' => "33 title",
            'content' => "33 content",
            'image' => "33image",
            'likes' => "330",
            'is_published' => 1,
        ]);
    }
}
