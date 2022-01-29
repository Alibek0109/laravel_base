<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdateRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, $id)
    {
        $post = Post::find($id);
        $data = $request->validated();

        $this->service->update($post, $data);

        return redirect()->route("post.show", $id);
    }
}
