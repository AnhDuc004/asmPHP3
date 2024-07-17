@extends('layout.master')
@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1>{{ $post->title }}</h1>
            <p><img src="{{ $post->img }}" height="500" alt=""></p>
            <p>{{ $post->content }}</p>


            <!-- Hiển thị tên người đăng bài viết -->

            <!-- Thêm các phần tử khác như hình ảnh, thẻ tags, ngày đăng, ... -->
        </div>
    </div>
@endsection
