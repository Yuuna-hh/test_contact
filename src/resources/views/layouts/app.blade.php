<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('css')
    <link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">
</head>

<body>

    @if (!View::hasSection('hide_header'))
        <header class="header">
            <div class="header__inner">
                <h1 class="header__title">FashionablyLate</h1>

                @hasSection('auth-header-btn')
                    <div class="header__right">
                        @yield('auth-header-btn')
                    </div>
                @endif

            </div>
        </header>
    @endif

    <main class="main">
        @yield('content')
    </main>

</body>

</html>
