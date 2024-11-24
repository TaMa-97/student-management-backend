# API 仕様書

## ベース URL

```
http://localhost:8000/api/v1
```

## エンドポイント一覧

### 生徒情報

#### 生徒一覧の取得

```http
GET /students

レスポンス 200 OK
{
  "data": [
    {
      "id": 1,
      "name": "山田太郎",
      "parent_name": "山田花子",
      "phone": "090-1234-5678",
      "email": "yamada@example.com",
      "amount": "5000",
      "birthday": "2010-01-01",
      "created_at": "2024-01-20T12:00:00Z",
      "updated_at": "2024-01-20T12:00:00Z"
    }
  ],
  "meta": {
    "current_page": 1,
    "total": 10,
    "per_page": 15
  }
}
```

#### 生徒詳細の取得

```http
GET /students/{id}

レスポンス 200 OK
{
  "data": {
    "id": 1,
    "name": "山田太郎",
    "parent_name": "山田花子",
    "phone": "090-1234-5678",
    "email": "yamada@example.com",
    "amount": "5000",
    "birthday": "2010-01-01",
    "created_at": "2024-01-20T12:00:00Z",
    "updated_at": "2024-01-20T12:00:00Z"
  }
}
```

#### 生徒の新規登録

```http
POST /students

リクエストボディ
{
  "name": "山田太郎",
  "parent_name": "山田花子",
  "phone": "090-1234-5678",
  "email": "yamada@example.com",
  "amount": "5000",
  "birthday": "2010-01-01"
}

レスポンス 201 Created
{
  "data": {
    "id": 1,
    "name": "山田太郎",
    "parent_name": "山田花子",
    "phone": "090-1234-5678",
    "email": "yamada@example.com",
    "amount": "5000",
    "birthday": "2010-01-01",
    "created_at": "2024-01-20T12:00:00Z",
    "updated_at": "2024-01-20T12:00:00Z"
  }
}
```

#### 生徒情報の更新

```http
PUT /students/{id}

リクエストボディ
{
  "name": "山田太郎",
  "parent_name": "山田花子",
  "phone": "090-1234-5678",
  "email": "yamada@example.com",
  "amount": "5000",
  "birthday": "2010-01-01"
}

レスポンス 200 OK
{
  "data": {
    "id": 1,
    "name": "山田太郎",
    "parent_name": "山田花子",
    "phone": "090-1234-5678",
    "email": "yamada@example.com",
    "amount": "5000",
    "birthday": "2010-01-01",
    "created_at": "2024-01-20T12:00:00Z",
    "updated_at": "2024-01-20T12:00:00Z"
  }
}
```

#### 生徒の削除

```http
DELETE /students/{id}

レスポンス 204 No Content
```

### メモ

#### メモ一覧の取得

```http
GET /students/{student_id}/notes

レスポンス 200 OK
{
  "data": [
    {
      "id": 1,
      "student_id": 1,
      "content": "レッスンの進捗メモ",
      "created_at": "2024-01-20T12:00:00Z",
      "updated_at": "2024-01-20T12:00:00Z"
    }
  ],
  "meta": {
    "current_page": 1,
    "total": 5,
    "per_page": 15
  }
}
```

#### メモの作成

```http
POST /students/{student_id}/notes

リクエストボディ
{
  "content": "レッスンの進捗メモ"
}

レスポンス 201 Created
{
  "data": {
    "id": 1,
    "student_id": 1,
    "content": "レッスンの進捗メモ",
    "created_at": "2024-01-20T12:00:00Z",
    "updated_at": "2024-01-20T12:00:00Z"
  }
}
```

## エラーレスポンス

### 400 Bad Request

```json
{
  "message": "リクエストが不正です",
  "errors": {
    "field": ["入力値が不正です"]
  }
}
```

### 401 Unauthorized

```json
{
  "message": "認証されていません"
}
```

### 403 Forbidden

```json
{
  "message": "権限がありません"
}
```

### 404 Not Found

```json
{
  "message": "リソースが見つかりません"
}
```

### 422 Unprocessable Entity

```json
{
  "message": "入力データが不正です",
  "errors": {
    "field": ["この項目は必須です"]
  }
}
```

### 500 Internal Server Error

```json
{
  "message": "サーバーエラーが発生しました"
}
```
