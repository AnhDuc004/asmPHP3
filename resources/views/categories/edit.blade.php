@extends('layout.master')

@section('title')
    Edit Category
@endsection

@section('content')
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" value="{{ $category->name }}" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
