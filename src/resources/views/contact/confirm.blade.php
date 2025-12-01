@extends('layouts.app')

@section('title', 'Confirm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

@section('content')

<div class="form__container">

    <h2 class="form__title">Contact</h2>

    <form action="{{ route('contact.thanks') }}" method="POST" class="confirm__form">
        @csrf

        <div class="confirm__table">
            <!-- 名前 -->
            <div class="confirm__row">
                <span class="confirm__label">お名前</span>
                <span class="confirm__value">
                    {{ $inputs['last_name'] }}　{{ $inputs['first_name'] }}
                </span>
            </div>
            <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
            <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">

            <!-- 性別 -->
            <div class="confirm__row">
                <span class="confirm__label">性別</span>
                <span class="confirm__value">
                    @if ($inputs['gender'] == 1)
                        男性
                    @elseif ($inputs['gender'] == 2)
                        女性
                    @else
                        その他
                    @endif
                </span>
            </div>
            <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">

            <!-- メール -->
            <div class="confirm__row">
                <span class="confirm__label">メールアドレス</span>
                <span class="confirm__value">{{ $inputs['email'] }}</span>
            </div>
            <input type="hidden" name="email" value="{{ $inputs['email'] }}">
            
            <!-- 電話番号 -->
            <div class="confirm__row">
                <span class="confirm__label">電話番号</span>
                <span class="confirm__value">
                    {{ $inputs['tel1'] }}{{ $inputs['tel2'] }}{{ $inputs['tel3'] }}
                </span>
            </div>
            <input type="hidden" name="tel1" value="{{ $inputs['tel1'] }}">
            <input type="hidden" name="tel2" value="{{ $inputs['tel2'] }}">
            <input type="hidden" name="tel3" value="{{ $inputs['tel3'] }}">

            <!-- 住所 -->
            <div class="confirm__row">
                <span class="confirm__label">住所</span>
                <span class="confirm__value">{{ $inputs['address'] }}</span>
            </div>
            <input type="hidden" name="address" value="{{ $inputs['address'] }}">

            <!-- 建物名 -->
            <div class="confirm__row">
                <span class="confirm__label">建物名</span>
                <span class="confirm__value">{{ $inputs['building'] }}</span>
            </div>
            <input type="hidden" name="building" value="{{ $inputs['building'] }}">

            <!-- 種類 -->
            <div class="confirm__row">
                <span class="confirm__label">お問い合わせ種類</span>
                <span class="confirm__value">{{ $category_name }}</span>
            </div>
            <input type="hidden" name="category_id" value="{{ $inputs['category_id'] }}">


            <!-- 内容 -->
            <div class="confirm__row confirm__row--textarea">
                <span class="confirm__label">お問い合わせ内容</span>
                <span class="confirm__value confirm__value--textarea">{!! nl2br(e(trim($inputs['detail']))) !!}</span>
            </div>
            <input type="hidden" name="detail" value="{{ $inputs['detail'] }}">
        </div>

        <div class="form__btn">
            <button name="action" value="submit" class="form__btn--submit">送信</button>
            <button name="action" value="back" class="form__btn--back">修正</button>
        </div>

    </form>

</div>

@endsection