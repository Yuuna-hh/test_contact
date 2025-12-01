
@extends('layouts.app')

@section('title', 'Admin')

@section('auth-header-btn')
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
        <button type="submit" class="auth-header__btn">logout</button>
    </form>
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

@section('content')

<div class="admin__container">

    <h2 class="form__title">Admin</h2>

    <!-- 検索 -->
    <form action="{{ route('admin.search') }}" method="GET" class="admin-bar__search">

        <!-- 名前orメール -->
        <input type="text" name="keyword" class="admin-search__input"
            placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}">

        <!-- 性別 -->
        <select name="gender" class="admin-search__select">
            <option value="">性別</option>
            <option value="all" {{ request('gender') === 'all' ? 'selected' : '' }}>全て</option>
            <option value="1" {{ request('gender') == 1 ? 'selected' : '' }}>男性</option>
            <option value="2" {{ request('gender') == 2 ? 'selected' : '' }}>女性</option>
            <option value="3" {{ request('gender') == 3 ? 'selected' : '' }}>その他</option>
        </select>

        <!-- お問い合わせ種類 -->
        <select name="category_id" class="admin-search__select">
            <option value="">お問い合わせの種類</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->content }}
                </option>
            @endforeach
        </select>

        <!-- 日付 -->
        <input type="date" name="date" class="admin-search__date" value="{{ request('date') }}">

        <!-- ボタン -->
        <button class="admin-search__btn">検索</button>
        <a href="{{ route('admin.admin') }}" class="admin-search__reset">リセット</a>
    </form>

    <!-- エクスポートとページネーション -->
    <div class="admin-bar__export">
        <div>
            <a href="{{ route('admin.export', request()->query()) }}" class="admin-export__btn">エクスポート</a>
        </div>
        <div class="admin-bar__pagination">
            {{ $contacts->links('pagination::bootstrap-4') }}
        </div>
    </div>

    <!-- 一覧テーブル -->
    <table class="admin-table cross-highlight">
        <thead>
            <tr>
                <th>お名前</th>
                <th>性別</th>
                <th>メールアドレス</th>
                <th>お問い合わせの種類</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td>{{ $contact->gender_label }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->category->content }}</td>
                <td class="admin-detail">
                    <a href="#modal-{{ $contact->id }}" class="admin-detail__btn">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- モーダル -->
@foreach($contacts as $contact)
    <div id="modal-{{ $contact->id }}" class="modal">
        <div class="modal__overlay"></div>
        <div class="modal__body">
            <table class="modal__table">
                <tr><th>お名前</th><td>{{ $contact->last_name }} {{ $contact->first_name }}</td></tr>
                <tr><th>性別</th><td>{{ $contact->gender_label }}</td></tr>
                <tr><th>メール</th><td>{{ $contact->email }}</td></tr>
                <tr><th>電話番号</th><td>{{ $contact->tel }}</td></tr>
                <tr><th>住所</th><td>{{ $contact->address }}</td></tr>
                <tr><th>建物名</th><td>{{ $contact->building }}</td></tr>
                <tr><th>お問い合わせの種類</th><td>{{ $contact->category->content }}</td></tr>
                <tr><th>お問い合わせ内容</th><td>{{ $contact->detail }}</td></tr>
            </table>
            <div class="modal__actions">

                <a href="#!" class="modal__close">✕</a>

                <form action="{{ route('admin.delete', $contact->id) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="modal__delete-btn">削除</button>
                </form>
            </div>
        </div>
    </div>
@endforeach

@endsection
