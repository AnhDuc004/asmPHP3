@extends('layout.master')

@section('title')
    Edit Post
@endsection

@section('content')
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" value="{{ $post->title }}" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" value="{{ $post->description }}" class="form-control" name="description" id="description">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Url img</label>
            <input type="text" value="{{ $post->img }}" class="form-control" name="img" id="img">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" value="{{ $post->content }}" class="form-control" name="content" id="content">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category name</label>
            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif>
                        {{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
