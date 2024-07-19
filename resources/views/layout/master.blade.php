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
            $type = DB::table('users')->pluck('type');
            $user = Auth::user();
        @endphp
        {{-- @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/home') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Home</a>
                @else
                    <a href="{{ route('login') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif --}}
        {{-- Menu --}}
        @if (Route::has('login'))
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                @auth
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/home"><img
                                src="https://s1.vnecdn.net/vnexpress/restruct/i/v909/v2_2019/pc/graphics/logo.svg"
                                alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                {{-- Tìm Kiếm  --}}
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ route('posts.search') }}">Tìm
                                        theo
                                        danh mục</a>
                                </li>
                                {{-- quản lí danh mục và danh sách bài viết của admin --}}
                                @if ($user->type() == 'admin')
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ route('posts.index') }}">Quản lý
                                            bài
                                            viết</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" aria-current="page"
                                            href="{{ route('categories.index') }}">Quản
                                            lý danh
                                            mục</a>
                                    </li>
                                @endif
                                {{-- logout --}}
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            {{ __('Đăng xuất') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                                {{-- end logout --}}

                                {{-- chua dang nhap --}}
                            @else
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
                                                {{-- <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page"
                                                        href="{{ route('posts.search') }}">Tìm
                                                        theo
                                                        danh mục</a>
                                                </li> --}}
                                                <li class="nav-item">
                                                    <a class="nav-link active" aria-current="page"
                                                        href="{{ route('login') }}">Đăng
                                                        Nhập</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </nav>
                                @if (Route::has('register'))
                                    <nav class="navbar navbar-expand-lg bg-body-tertiary">
                                        <div class="container-fluid">
                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" aria-current="page"
                                                            href="{{ route('register') }}">Đăng
                                                            ký</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>
                                @endif
                            @endauth


                        </ul>
                    </div>
                </div>
            </nav>
        @endif
        {{--  --}}
        @yield('content')
        <footer class="footer mt-auto py-3 bg-light">
            <div class="container text-center">
                <p>Báo Điện Tử</p>
                <a href="/home"><img
                        src="https://s1.vnecdn.net/vnexpress/restruct/i/v909/v2_2019/pc/graphics/logo.svg"
                        alt=""></a>
                <span class="text-muted">&copy; {{ date('Y') }} Tạ Đức Anh PH40041 ASM1</span>
            </div>

        </footer>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
