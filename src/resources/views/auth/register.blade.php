@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
@endsection

@section('link')
<nav class="header__nav">
    <form class="login-link" action="/login" method="get">
    @csrf
        <button class="login-link-button" type="submit">login</button>
    </form>
</nav>
@endsection

@section('content')
    <div class="register">
        <div class="register__content">
            <div class="register__text">
                <h2 class="register__ttl">Register</h2>
            </div>
            <form class="register__form" action="/register" method="post">
                @csrf
                <div class="register__form-content">
                    <p class="register__form-text">お名前</p>
                    <div class="register__form-item">
                        <input class="register__form-input" type="text" name="name" placeholder="例: 山田太郎" value="{{old('name')}}">
                    </div>
                    @error('name')
                    <p class="register__form-error">{{$message}}</p>
                    @enderror
                    <p class="register__form-text">メールアドレス</p>
                    <div class="register__form-item">
                        <input class="register__form-input" type="email" name="email" placeholder="例: test@example.com" value="{{old('email')}}">
                    </div>
                    @error('email')
                        <p class="register__form-error">{{$message}}</p>
                    @enderror
                    <p class="register__form-text">パスワード</p>
                    <div class="register__form-item">
                        <input class="register__form-input" type="password" name="password" placeholder="例: coachtech1106">
                    </div>
                    @error('password')
                        <p class="register__form-error">{{$message}}</p>
                    @enderror
                    <div class="register__form-button">
                        <button class="register__form-submit" type="submit">
                        登録
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>  
@endsection 