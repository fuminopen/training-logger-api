# トレーニングロガーAPI開発ガイド

## ビルド・実行コマンド
- 開発環境起動: `make up`（バックグラウンド）または `make up-foreground`（フォアグラウンド）
- 環境停止: `make down`
- シェルアクセス: `make shell`
- テスト実行: `php artisan test` または `./vendor/bin/phpunit`
- 特定テスト実行: `php artisan test --filter=テストクラス名` または `./vendor/bin/phpunit --filter=テストクラス名`
- コード整形: `./vendor/bin/pint`

## コーディング規約
- PSR-4オートローディング準拠
- Laravel MVCアーキテクチャに従う（Controllers, Models, Resources, Form Requests）
- リソース固有のファイルはサブディレクトリで整理（例: `BodyPart/StoreBodyPartRequest.php`）
- テストは機能ごとにディレクトリ分け（Feature/BodyPart, Feature/Exercise, etc）
- データベース操作にはEloquentモデルとクエリビルダーを使用
- API返却値はResourceクラスで整形
- 入力バリデーションはForm Requestクラスで実装
- テストはRefreshDatabaseトレイトを使用してDBをリセット