## Dockerのダウンロードとインストール
https://docs.docker.com/desktop/mac/install/

## Dockerコマンド

 - イメージのビルド
```
docker-compose build --no-cache 
```
 - イメージのビルド（キャッシュなし）
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
 - コンテナを停止・削除（ボリューム削除含む）
```
docker-compose down -v
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

## DBコマンド
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
