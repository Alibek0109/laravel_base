@extends('layouts.app')


@section('content')
    <h1>Edit</h1>
    <form action="{{route('post.update', ['post' => $post->id])}}" method="post">
        @method('patch')
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control" id="title" placeholder="Title">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" placeholder="Content" class="form-control">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" value="{{$post->image}}" class="form-control" id="image" placeholder="Image">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
