@extends('layouts.app')


@section('content')


<div>
    <h2>{{ $post->id }}. {{ $post->title }}</h2>
    <h3>{{$post->content}}</h3>
    <h3>{{$post->image}}</h3>
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
