@extends('layout.master')

@section('title')
    Add New Post
@endsection

@section('content')
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div class="mb-3">
            <label for="img" class="form-label">Url img</label>
            <input type="text" class="form-control" name="img" id="img">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <input type="text" class="form-control" name="content" id="content">
        </div>
        <div class="mb-3">
            <label for="category_id" class="form-label">Category name</label>
            <select class="form-select" aria-label="Default select example" id="category_id" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
