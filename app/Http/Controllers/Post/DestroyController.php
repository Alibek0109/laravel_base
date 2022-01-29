<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    public function __invoke($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return redirect()->route('post.index');
    }
}
