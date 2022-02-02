@extends('layouts.main')


@section('content')


<div>
    <h2>№{{$post->id}}.</h2>
    <h3>title - {{ $post->title }}</h3>
    <h3>content - {{$post->content}}</h3>
    <h3>image - {{$post->image}}</h3>
    <h3>category - {{$post->category->title}}</h3>
</div>
<div>
    <a href="{{route('post.edit', $post->id)}}" class="btn btn-warning">Edit</a>
</div>
<div>
    <form action="{{route('post.destroy', $post->id)}}" method="post">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>
<div>
    <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
</div>


@endsection
