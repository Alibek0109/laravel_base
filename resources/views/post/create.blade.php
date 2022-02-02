@extends('layouts.main')


@section('content')
    <form action="{{ route('post.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="Title"
                value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" placeholder="Content" class="form-control">{{ old('content') }}</textarea>
            @error('content')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="text" name="image" class="form-control" id="image" placeholder="Image" value="{{ old('image') }}">
            @error('image')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option
                    {{(int)old('category_id') === $category->id ? ' selected ' : ''}}
                    value="{{ $category->id }}">{{ $category->title }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <select multiple class="form-control" id="tags" name="tags[]">
                @foreach ($tags as $tag)
                    <option
                    {{(int)old('category_id') === $category->id ? ' selected ' : ''}}
                    value="{{ $tag->id }}">{{ $tag->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Create</button>
    </form>
@endsection
