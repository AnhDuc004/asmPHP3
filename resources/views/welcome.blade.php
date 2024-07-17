@extends('layout.master')

@section('title')
    Home
@endsection

@section('content')
    {{-- post --}}
    @php
        $posts = DB::table('posts')
            ->join('categories', 'category_id', '=', 'categories.id')
            ->select('posts.*', 'name')
            ->orderByDesc('id')
            ->get();
        $categories = DB::table('categories')->orderByDesc('id')->get();
    @endphp
    <div class="row">
        <div class="col-md-8">
            <h1>Tin tức mới nhất</h1>
            @foreach ($posts as $post)
                <div class="card mb-4">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <img src="{{ $post->img }}" width="300" alt="">
                        <p class="card-text">{{ $post->description }}</p>
                        <p style="font-weight: bold" class="card-text">Thể Loại : {{ $post->name }}</p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Đọc thêm</a>
                    </div>
                </div>
            @endforeach

            <!-- Hiển thị các liên kết phân trang -->
        </div>
        <div class="col-md-4">
            <!-- Phần sidebar hoặc các widgets khác -->
        </div>
    </div>
@endsection
