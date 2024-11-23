# 生徒管理システム（バックエンド）

## 概要

Laravel・MySQL で構築された生徒管理システムの RESTfulAPI

## 技術スタック

-   PHP 8.2
-   Laravel 10.x
-   MySQL 8.0
-   Docker / Docker Compose

### 主な機能

-   RESTful API アーキテクチャ
-   リクエストバリデーション
-   リソーストランスフォーメーション
-   ソフトデリート
-   データベースマイグレーション
-   Docker コンテナ化

## セットアップ

### 必要条件

-   Docker
-   Docker Compose

### インストール手順

1. 環境変数の設定

```bash
cp .env.example .env
```

2. Docker コンテナの起動

```bash
docker-compose up -d
```

3. マイグレーションの実行

```bash
docker-compose exec app php artisan migrate
```

## 開発ガイド

### テスト実行

```bash
docker-compose exec app php artisan test
```

### API 仕様

[API 仕様書](./docs/API_SPECIFICATION.md)を参照

### データベース設計

[データベース設計書](./docs/DATABASE_SCHEMA.md)を参照
