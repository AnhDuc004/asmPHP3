<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://websiteviet.vn/wp-content/uploads/2020/11/thiet-ke-website-tin-tuc-logo.jpg"
                        class="d-block w-100" height="400" alt="...">
                </div>
            </div>
        </div>
        {{-- model --}}
        @php
            $posts = DB::table('posts')
                ->join('categories', 'category_id', '=', 'categories.id')
                ->select('posts.*', 'name')
                ->orderByDesc('id')
                ->get();
            $categories = DB::table('categories')->orderByDesc('id')->get();
        @endphp
        {{-- Menu --}}
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="http://127.0.0.1:8000/"><img
                        src="https://s1.vnecdn.net/vnexpress/restruct/i/v909/v2_2019/pc/graphics/logo.svg"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        {{-- danh sách bài viết --}}
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Danh sách bài viết</a>
                            <ul class="dropdown-menu">

                                @foreach ($categories as $category)
                                    <li><a class="dropdown-item" href="">{{ $category->name }}</a>
                                    </li>
                                @endforeach

                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('posts.search') }}">Tìm theo
                                danh mục</a>
                        </li>
                        {{--  --}}
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('posts.index') }}">Quản lý bài
                                viết</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('categories.index') }}">Quản
                                lý danh
                                mục</a>
                        </li>
                    </ul>
                    {{-- <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> --}}
                </div>
            </div>
        </nav>
        {{--  --}}
        {{--  --}}
        @yield('content')
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container text-center">
                <img src="" alt="">
                <span class="text-muted">&copy; {{ date('Y') }} Tạ Đức Anh PH40041 ASM1</span>
            </div>
        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
