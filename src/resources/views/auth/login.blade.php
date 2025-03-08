@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('link')
<nav class="header__nav">
    <form class="register-link" action="/register" method="get">
    @csrf
        <button class="register-link-button" type="submit">register</button>
    </form>
</nav>

@endsection

@section('content')
    <div class="login">
        <div class="login__content">
            <div class="login__text">
                <h2 class="login__ttl">Login</h2>
            </div>
            <form class="login__form" action="/login" method="post">
                @csrf
                <div class="login__form-content">
                    <p class="login__form-text">メールアドレス</p>
                    <div class="login__form-item">
                        <input class="login__form-input" type="email" name="email" placeholder="例: test@example.com" value="{{old('email')}}">
                    </div>
                    @error('email')
                    <p class="login__error">{{$message}}</p>
                    @enderror
                    <p class="login__form-text">パスワード</p>
                    <div class="login__form-item">
                        <input class="login__form-input" type="password" name="password" placeholder="例: coachtech1106">
                    </div>
                    @error('password')
                        <p class="login__error">{{$message}}</p>
                    @enderror
                    <div class="login__form-button">
                        <button class="login__form-submit" type="submit">
                        ログイン
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    @endsection