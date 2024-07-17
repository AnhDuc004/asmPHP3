@extends('layout.master')

@section('title')
    List Post
@endsection

@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-info">Add New Post</a>
    <a href="http://127.0.0.1:8000/" class="btn btn-info">Back</a>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Img</th>
            <th>Content</th>
            <th>Category Name</th>
            <th>Action</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <img src="{{ $post->img }}" width="60" alt="">
                </td>
                <td>{{ $post->content }}</td>
                <td>{{ $post->name }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST"
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
