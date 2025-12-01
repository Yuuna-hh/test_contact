@extends('layouts.app')

@section('title', 'Login')

@section('auth-header-btn')
    <a href="{{ route('register') }}" class="auth-header__btn">register</a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

@section('content')

<div class="auth__container">

    <h2 class="form__title">Login</h2>

    <form action="{{ route('login') }}" method="POST" class="auth__form">
        @csrf

        <!-- メール -->
        <div class="auth__row">
            <label class="auth__label">メールアドレス</label>
            <input type="text" name="email" class="auth__input" value="{{ old('email') }}">
            @error('email')
                <p class="auth__error">{{ $message }}</p>
            @enderror
        </div>

        <!-- パスワード -->
        <div class="auth__row">
            <label class="auth__label">パスワード</label>
            <input type="password" name="password" class="auth__input">
            @error('password')
                <p class="auth__error">{{ $message }}</p>
            @enderror
        </div>

        <!-- Fortify 認証エラー-->
        @if(session('status'))
            <p class="auth__error">{{ session('status') }}</p>
        @endif

        <div class="form__btn">
            <button type="submit" class="form__btn--submit">ログイン</button>
        </div>

    </form>

</div>

@endsection
