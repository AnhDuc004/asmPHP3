@extends('layout.master')

@section('title')
    Add Category
@endsection

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
