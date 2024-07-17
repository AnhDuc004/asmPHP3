<!-- resources/views/posts/search.blade.php -->

@extends('layout.master')
@section('title')
    Tìm kiếm
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('posts.search') }}" method="GET">
            <div class="form-group">
                <label for="category">Chọn danh mục:</label>
                <select name="category_id" id="category" class="form-control">
                    <option value="" selected>--Chưa Chọn</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
        </form>

        <h2>Kết quả tìm kiếm:</h2>
        @if ($posts->count() > 0)
            @foreach ($posts as $post)
                <div class="card mt-4">
                    <div class="card-body">
                        <h3 class="card-title"><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                        </h3>
                        <p class="card-text">{{ $post->content }}</p>
                    </div>
                </div>
            @endforeach

            {{ $posts->links() }}
        @else
            <p>Không tìm thấy bài viết nào.</p>
        @endif
    </div>
@endsection
