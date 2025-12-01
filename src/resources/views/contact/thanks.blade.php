@extends('layouts.app')

@section('title', 'Thanks')

@section('hide_header')
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">


@section('content')

<div class="thanks__wrapper">
    <div class="thanks__bg">Thank you</div>

    <p class="thanks__message">お問い合わせありがとうございました</p>

    <div class="form__btn">
        <a href="/contact" class="form__btn--submit">HOME</a>
    </div>
</div>

@endsection
