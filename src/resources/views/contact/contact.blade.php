@extends('layouts.app')

@section('title', 'Contact')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

@section('content')

<div class="form__container">

    <h2 class="form__title">Contact</h2>

    <form action="{{ route('contact.confirm') }}" method="POST">
        @csrf

        <!-- お名前 -->
        <div class="contact__row">
            <label class="contact__label">お名前 <span class="required">※</span></label>
            <div class="contact__field">
                <div class="contact__name-fields">
                    <div class="contact__name-item">
                        <input type="text" name="last_name" class="form__input"
                            value="{{ old('last_name') }}" placeholder="例：山田">
                        @error('last_name')
                            <div class="contact__error">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="contact__name-item">
                        <input type="text" name="first_name" class="form__input"
                            value="{{ old('first_name') }}" placeholder="例：太郎">
                        @error('first_name')
                            <div class="contact__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- 性別 -->
        <div class="contact__row">
            <label class="contact__label">性別 <span class="required">※</span></label>
            <div class="contact__field contact__radio-wrap">
                <label><input type="radio" name="gender" value="1" {{ old('gender', 1) == 1 ? 'checked' : '' }}> 男性</label>
                <label><input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}> 女性</label>
                <label><input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}> その他</label>
                @error('gender')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- メール -->
        <div class="contact__row">
            <label class="contact__label">メールアドレス <span class="required">※</span></label>
            <div class="contact__field">
                <input type="text" name="email" class="form__input" value="{{ old('email') }}" placeholder="例：test@sample.com">
                @error('email')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <!-- 電話番号 -->
        <div class="contact__row">
            <label class="contact__label">電話番号 <span class="required">※</span></label>
            <div class="contact__field">
                <div class="contact__tel-fields">
                    <div class="contact__tel-item">
                        <input type="text" name="tel1" class="form__input" value="{{ old('tel1') }}" placeholder="080">
                        @error('tel1')
                            <div class="contact__error">{{ $message }}</div>
                        @enderror
                    </div>

                    <span class="dash">-</span>

                    <div class="contact__tel-item">
                        <input type="text" name="tel2" class="form__input" value="{{ old('tel2') }}" placeholder="1234">
                        @error('tel2')
                            <div class="contact__error">{{ $message }}</div>
                        @enderror
                    </div>

                    <span class="dash">-</span>

                    <div class="contact__tel-item">
                        <input type="text" name="tel3" class="form__input" value="{{ old('tel3') }}" placeholder="5678">
                        @error('tel3')
                            <div class="contact__error">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <!-- 住所 -->
        <div class="contact__row">
            <label class="contact__label">住所 <span class="required">※</span></label>
            <div class="contact__field">
                <input type="text" name="address" class="form__input" value="{{ old('address') }}" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3">
                @error('address')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- 建物名 null OK -->
        <div class="contact__row">
            <label class="contact__label">建物名</label>
            <div class="contact__field">
                <input type="text" name="building" class="form__input" value="{{ old('building') }}" placeholder="例：千駄ヶ谷マンション101">
            </div>
        </div>

        <!-- 種類 -->
        <div class="contact__row">
            <label class="contact__label">お問い合わせ種類 <span class="required">※</span></label>
            <div class="contact__field">
                <select name="category_id" class="form__select js-select">
                    <option value="" class="placeholder-option">選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->content }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <script>
            document.querySelectorAll('.js-select').forEach(select => {
                function updateColor() {
                    if (select.value === "") {
                        select.classList.remove('is-selected');
                    } else {
                        select.classList.add('is-selected');
                    }
                }
                updateColor(); // ← old() が反映されている時も正しく色が付く
                select.addEventListener('change', updateColor);
            });
        </script>

        <!-- 内容 -->
        <div class="contact__row contact__row--textarea">
            <label class="contact__label">お問い合わせ内容 <span class="required">※</span></label>
            <div class="contact__field">
                <textarea name="detail" class="form__textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                @error('detail')
                    <div class="contact__error">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form__btn">
            <button type="submit" class="form__btn--submit">確認画面</button>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
</div>

@endsection
