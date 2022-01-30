@extends('layouts.app')


@section('content')
    <div>
        <div>
            <a href="{{route('post.create')}}" class="btn btn-primary mb-3">Create</a>
        </div>
        @foreach ($posts as $post)
            <div class=""><a href="{{ route('post.show', $post->id) }}">{{ $post->id }}.
                    {{ $post->title }}</a></div>
        @endforeach
        <div class="mt-3">
            {{$posts->links()}}
        </div>
    </div>



@endsection
