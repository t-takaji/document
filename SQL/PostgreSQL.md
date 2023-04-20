#### テーブル一覧取得
```
SELECT tablename FROM pg_tables WHERE schemaname = 'public';
```

#### 「:has」を含むカラムを検索する
```
SELECT * FROM freearea t WHERE t::text LIKE '%:has%';
```

#### 置換（a.com -> b.com）※'g'であるだけ繰り返す。なしで最初に見つけたものだけ。
```
UPDATE company SET companyname = regexp_replace(companyname,'a.com','b.com', 'g');
```
