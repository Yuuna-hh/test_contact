
# お問い合わせフォーム

## 環境構築

### Dockerビルド

- git clone git@github.com:Yuuna-hh/test_contact.git
- docker-compose up -d --build

### Laravelセットアップ

- docker-compose exec php bash

- composer install
依存パッケージインストール

- cp .env.example .env
.envファイル作成と編集（DB接続情報など）

- php artisan key:generate
アプリケーションキー生成

- php artisan migrate
- php artisan db:seed
マイグレーションと初期データ投入

- php artisan config:clear
- php artisan cache:clear
- php artisan config:cache
キャッシュのクリア（必要に応じて）

## URL一覧（開発環境）

- お問い合わせフォーム入力：http://localhost/
- お問い合わせ確認：http://localhost/confirm
- サンクスページ：http://localhost/thanks
- ユーザー登録：http://localhost/register
- ログイン：http://localhost/login
- 管理画面：http://localhost/admin
- phpMyAdmin：http://localhost:8080

/reset, /search, /export, /delete は
画面表示を伴わない処理エンドポイントのため、画面として存在するのは上記のみです。

## 使用技術（実行環境）

- PHP 8.3.6
- Laravel 8.83.29
- MySQL 8.0.26
- nginx 1.21.1

## コーディング規約

本アプリケーションはCOACHTECHが定める以下のPHPコーディング規約に基づいて開発しています。
- https://estra-inc.notion.site/1263a94a2aab4e3ab81bad77db1cf186

## ER図

<img width="351" height="281" alt="test_contact_ER" src="https://github.com/user-attachments/assets/0f4c1be9-2806-43bb-b883-81e5bdfcbf8b" />
