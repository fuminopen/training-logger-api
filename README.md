# Training Logger API

トレーニングの記録を管理するためのRESTful APIサービスです。ワークアウトセッション、エクササイズ、セット数などのトレーニングデータを効率的に記録・管理することができます。

## 機能概要

- トレーニングセッションの記録・管理
- 各種エクササイズの登録・管理
- 部位別トレーニング記録の管理
- ワークアウトセットの詳細な記録
- RESTful APIによるデータアクセス

## システム要件

- PHP 8.1以上
- Laravel 10.x
- MySQL 8.0以上
- Composer

## セットアップ手順

1. リポジトリのクローン
```bash
git clone https://github.com/fuminopen/training-logger-api.git
cd training-logger-api
```

2. 依存パッケージのインストール
```bash
composer install
```

3. 環境設定
```bash
cp .env.example .env
php artisan key:generate
```

4. データベースの設定
`.env`ファイルを編集し、データベース接続情報を設定します：
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=training_logger
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

5. データベースのマイグレーションとシード
```bash
php artisan migrate
php artisan db:seed
```

6. 開発サーバーの起動
```bash
php artisan serve
```

## API仕様

### エンドポイント一覧

#### ワークアウト関連
- `GET /api/workouts` - ワークアウト一覧の取得
- `POST /api/workouts` - 新規ワークアウトの作成
- `GET /api/workouts/{id}` - 特定のワークアウトの取得
- `PUT /api/workouts/{id}` - ワークアウトの更新
- `DELETE /api/workouts/{id}` - ワークアウトの削除

#### エクササイズ関連
- `GET /api/exercises` - エクササイズ一覧の取得
- `POST /api/exercises` - 新規エクササイズの作成
- `GET /api/exercises/{id}` - 特定のエクササイズの取得
- `PUT /api/exercises/{id}` - エクササイズの更新
- `DELETE /api/exercises/{id}` - エクササイズの削除

#### 部位関連
- `GET /api/body-parts` - 部位一覧の取得
- `POST /api/body-parts` - 新規部位の作成
- `GET /api/body-parts/{id}` - 特定の部位の取得
- `PUT /api/body-parts/{id}` - 部位の更新
- `DELETE /api/body-parts/{id}` - 部位の削除

### リクエスト/レスポンス例

#### ワークアウトの作成
```json
// POST /api/workouts
// Request
{
  "date": "2024-03-16",
  "note": "胸トレーニング"
}

// Response
{
  "id": 1,
  "date": "2024-03-16",
  "note": "胸トレーニング",
  "created_at": "2024-03-16T10:00:00Z",
  "updated_at": "2024-03-16T10:00:00Z"
}
```

## プロジェクト構造

```
training-logger-api/
├── app/
│   ├── Http/
│   │   └── Controllers/    # APIコントローラー
│   └── Models/            # Eloquentモデル
├── database/
│   ├── migrations/        # データベースマイグレーション
│   └── seeders/          # データベースシード
├── routes/
│   └── api.php           # APIルート定義
└── tests/                # テストファイル
```

## 開発環境のセットアップ

### テストの実行
```bash
php artisan test
```

### コーディング規約
- PSR-12に準拠したコーディングスタイル
- PHPDocによるドキュメンテーション
- テストカバレッジの維持

## 貢献ガイド

1. このリポジトリをフォーク
2. 新しいブランチを作成 (`git checkout -b feature/amazing-feature`)
3. 変更をコミット (`git commit -m 'Add some amazing feature'`)
4. ブランチにプッシュ (`git push origin feature/amazing-feature`)
5. プルリクエストを作成

## ライセンス

このプロジェクトはMITライセンスの下で公開されています。詳細は[LICENSE](LICENSE)ファイルをご覧ください。

## メンテナー

- fuminopen (@fuminopen)

## 更新履歴

### [1.0.0] - 2024-03-16
- 初期リリース
- 基本的なCRUD機能の実装
- ワークアウト、エクササイズ、部位の管理機能
