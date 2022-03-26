## Laravelコマンド
 - Laravelバージョン確認
```
php artisan --version
```
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
