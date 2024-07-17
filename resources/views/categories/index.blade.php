@extends('layout.master')

@section('title')
    List Category
@endsection

@section('content')
    <a href="{{ route('categories.create') }}" class="btn btn-info">Add New Category</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        @foreach ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
