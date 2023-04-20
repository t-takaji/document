#### テーブル一覧取得
```
SELECT tablename FROM pg_tables WHERE schemaname = 'public';
```

#### 「:has」を含むカラムを検索する
```
SELECT * FROM freearea t WHERE t::text LIKE '%:has%';
```
