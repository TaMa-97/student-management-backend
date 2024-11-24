# データベース設計書

## 概要

MySQL 8.0（InnoDB エンジン、UTF-8 文字セット）を使用

## テーブル構成

### students（生徒）

| カラム      | 型              | 制約               | 説明                         |
| ----------- | --------------- | ------------------ | ---------------------------- |
| id          | BIGINT UNSIGNED | PK, AUTO_INCREMENT | 一意の識別子                 |
| name        | VARCHAR(255)    | NOT NULL           | 生徒名                       |
| parent_name | VARCHAR(255)    | NOT NULL           | 保護者名                     |
| phone       | VARCHAR(255)    | NOT NULL           | 電話番号                     |
| email       | VARCHAR(255)    | NULL               | メールアドレス               |
| address     | TEXT            | NULL               | 住所                         |
| birthday    | DATE            | NULL               | 生年月日                     |
| amount      | VARCHAR(255)    | NOT NULL           | 月謝（5000/10000）           |
| avatar      | VARCHAR(255)    | NULL               | プロフィール画像 URL         |
| created_at  | TIMESTAMP       | NOT NULL           | 作成日時                     |
| updated_at  | TIMESTAMP       | NOT NULL           | 更新日時                     |
| deleted_at  | TIMESTAMP       | NULL               | 削除日時（ソフトデリート用） |

インデックス:

- PRIMARY KEY (id)
- INDEX idx_email (email)
- INDEX idx_deleted_at (deleted_at)

### notes（メモ）

| カラム     | 型              | 制約               | 説明                         |
| ---------- | --------------- | ------------------ | ---------------------------- |
| id         | BIGINT UNSIGNED | PK, AUTO_INCREMENT | 一意の識別子                 |
| student_id | BIGINT UNSIGNED | FK, NOT NULL       | 生徒 ID（外部キー）          |
| content    | TEXT            | NOT NULL           | メモ内容                     |
| created_at | TIMESTAMP       | NOT NULL           | 作成日時                     |
| updated_at | TIMESTAMP       | NOT NULL           | 更新日時                     |
| deleted_at | TIMESTAMP       | NULL               | 削除日時（ソフトデリート用） |

インデックス:

- PRIMARY KEY (id)
- FOREIGN KEY fk_notes_student (student_id) REFERENCES students(id)
- INDEX idx_student_id (student_id)
- INDEX idx_deleted_at (deleted_at)

## リレーション

### students -> notes

- 1 対多のリレーション
- 1 人の生徒に対して複数のメモを持つことが可能
- 生徒が削除された場合、関連するメモも自動的にソフトデリートされる

## データの整合性

### ソフトデリート

両テーブルともソフトデリートを実装:

- deleted_at が NULL の場合はアクティブなレコード
- deleted_at に日時が入っている場合は削除済みレコード

### タイムスタンプ

両テーブルで管理:

- created_at: レコード作成時に自動設定
- updated_at: レコード更新時に自動更新

### 外部キー制約

- notes.student_id は students.id を参照
- ON DELETE CASCADE
- ON UPDATE CASCADE

## マイグレーション

Laravel のマイグレーション機能で管理:

```bash
php artisan migrate        # マイグレーションの実行
php artisan migrate:fresh  # マイグレーションのリセットと再実行
```
