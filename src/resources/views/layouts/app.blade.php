<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @yield('css')
    <link rel="stylesheet" href="{{asset('css/reset.css')}}" />
    <link rel="stylesheet" href="{{asset('css/header.css')}}" />

</head>
<body>
    <header>
        <nav class="header__nav" id="hnav">
        <ul class="header__nav-list">
            @if(Auth::check())
            <li><a href="/" class="nav__a">Home</a></li>
            <li><a href="/logout" class="nav__a">Logout</a></li>
            <li><a href="{{route('mypage', auth()->user())}}" class="nav__a">Mypage</a></li>
            @else
            <li><a href="/" class="nav__a">Home</a></li>
            <li><a href="/register" class="nav__a">Registration</a></li>
            <li><a href="/login" class="nav__a">Login</a></li>
            @endif
        </ul>
        </nav>
        <div class="menu">
        <div class="nav__menu" id="nav__menu">
            <span class="menu__line--top"></span>
            <span class="menu__line--middle"></span>
            <span class="menu__line--bottom"></span>
        </div>
        <div class="rese">
            <h2>Rese</h2>
        </div>
        </div>
    </header>

    <main class="content">
        @yield('content')
    </main>
        <!-- js埋め込み -->
        <script src="{{asset('js/app.js')}}"></script>
</body>
</html>