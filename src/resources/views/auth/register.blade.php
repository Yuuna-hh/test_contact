@extends('layouts.app')

@section('title', 'Register')

@section('auth-header-btn')
    <a href="{{ route('login') }}" class="auth-header__btn">login</a>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

@section('content')

<div class="auth__container">

    <h2 class="form__title">Register</h2>

    <form action="{{ route('register') }}" method="POST" class="auth__form">
        @csrf

        <!-- お名前 -->
        <div class="auth__row">
            <label class="auth__label">お名前</label>
            <input type="text" name="name" class="auth__input" value="{{ old('name') }}">
            @error('name')
                <p class="auth__error">{{ $message }}</p>
            @enderror
        </div>

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

        <div class="form__btn">
            <button type="submit" class="form__btn--submit">登録</button>
        </div>
    </form>

</div>

@endsection
