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
docker-compose ps
```
 - ログを表示
```
docker-compose logs
```
 - appコンテナの中に入る
```
docker-compose exec app bash
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
| \du | ユーザー毎のロール一覧 | display users |
| \l | DB一覧 | list |
| \c DB名 | DBに接続 | change。プロンプトがDB名になる |
| \dt | テーブル一覧（タイプ、オーナー） | display table |
| \z | テーブル一覧（アクセス権一覧） | \dpと同じ（display privilage） |
| \conninfo | 接続中のDB情報（DB名、ユーザー名、ソケット、ポート番号） | connecting infomation |
| \h | ヘルプ。SQLコマンド一覧 | SQLは大文字・小文字で区別なし |
| \s | \コマンド実行結果の履歴 | sequence |
| \q | 対話モードの終了 | quit |
