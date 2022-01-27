<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', ['posts' => $posts]);
    }


    public function create()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            Post::create([
                'title' => $post->id . " title",
                'content' => $post->id . " content",
                'image' => $post->id . "image",
                'likes' => $post->id . "0",
                'is_published' => 1,
            ]);
        }
    }

    public function update()
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $post->update([
                'title' => $post->id . " title",
                'content' => $post->id . " content",
                'image' => $post->id . "image",
                'likes' => $post->id . "0",
            ]);
            if ($post->id % 3 == 0) {
                $post->update([
                    'is_published' => 0,
                ]);
            } else {
                $post->update([
                    'is_published' => 1,
                ]);
            }
        }
    }

    public function delete()
    {
        $posts = Post::withTrashed()->where('id', '>', 0);
        $posts->restore();
        // $posts = Post::truncate();
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
