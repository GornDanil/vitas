<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <base href="https://www.test.test/" />
    <link type="image/x-icon" rel="icon" href="favicon.ico">
    <link href="https://test.test/css/app.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/dd5d56edeb.js" crossorigin="anonymous"></script>
    <title>@yield('title')</title>

</head>
<body>
    <header>
        <div class="header container">
            <a href="{{ route('home') }}" class="brand">
                <img src="{{ asset('images/logo.png') }}" alt="Pasta" class="brand-logo">
                <h4 class="brand-title">Paste</h4>
            </a>

            <div class="nav-menu">
                @if(Auth::user())
                    <a href="{{ route('my-pastes') }}" class="nav-link">Мои пасты</a>
                    <a href="{{ route('logout') }}" class="nav-link btn_white">Выйти</a>
                @else
                    <a href="{{ route('login') }}" class="nav-link btn_border-white">Войти</a>
                    <a href="{{ route('registration') }}" class="nav-link btn_white">Зарегистрироваться</a>
                @endif
                    <a href="{{ route('new-paste') }}" class="btn new_paste"><span>+</span> Новая паста</a>
            </div>
        </div>
    </header>

    <div class="wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>


    <footer>
        <div class="footer container">
            <p class="dev-by">
                Developed by Veretenov Vitaly, 2022
            </p>
        </div>
    </footer>

</body>
</html>

