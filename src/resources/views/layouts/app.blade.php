<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    <link rel="stylesheet" href="{{asset('css/common.css')}}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <a  class="header__logo" href="">FashionablyLate</a>
        </div>
        <nav class="header__nav">
            @yield('link')
            <!-- <form class="logout-form" action="/logout" method="post"> -->
                <!-- @csrf -->
                <!-- <button class="logout-form-button"> -->
                    <!-- ログアウト -->
                <!-- </button> -->
            <!-- </form> -->
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>