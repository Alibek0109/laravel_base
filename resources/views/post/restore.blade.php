@extends('layouts.app')


@section('content')
    <div>
        @foreach ($posts as $post)
            <div>{{$post->id}}. {{$post->title}}</div>
        @endforeach
    </div>
    <div>
        <a href="{{route('post.index')}}" class="btn btn-primary">Back</a>
    </div>


@endsection
