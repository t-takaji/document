## Install Docker for Mac
1. 「docker for mac」でGoogle検索
2. 「Install Docker Desktop on Mac」のリンクからダウンロードする


## Docker Command

 - イメージのビルド
```
docker-compose build --no-cache 
```
 - コンテナの作成と起動
```
docker-compose up -d
```
 - コンテナを停止・削除
```
docker-compose down
```
 - コンテナの一覧を表示
```
docker ps
```
 - ログを表示
```
docker-compose logs
```
 - appコンテナの中に入る
```
docker exec -it app bash
```

## Laravel Command
 - マイグレーションファイルの内容をデータベースに反映
```
php artisan migrate
```
 - ルーティングの確認
```
php artisan route:list
```
 - コントローラー作成
```
php artisan make:controller UsersController
```
 - リクエスト作成（バリデーションとか定義する）  
```
php artisan make:request SearchRequest
```
 - シーダー作成
```
php artisan make:seeder UsersTableSeeder
```
- seederを使ってダミーデータを入れる
```
php artisan db:seed --class=TestDataSeeder
```
## DB Command
```
psql -U postgres
```

| コマンド | 内容 | 補足 |
| :--- | :--- | :--- |
| \\? | ヘルプ。\コマンド一覧 | \hとは異なる |
| \l | DB一覧 | list |
| \c DB名 | DBに接続 | change。プロンプトがDB名になる |
| \dt | テーブル一覧（タイプ、オーナー） | display table |
| \h | ヘルプ。SQLコマンド一覧 | SQLは大文字・小文字で区別なし |
| \s | \コマンド実行結果の履歴 | sequence |
| \q | 対話モードの終了 | quit |
