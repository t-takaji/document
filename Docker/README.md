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
 - ルーティングの確認
```
php artisan route:list
```
