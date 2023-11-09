#### テーブル一覧取得
```
SELECT tablename FROM pg_tables WHERE schemaname = 'public';
```

### 該当カラムの呼出テーブル一覧取得
```
SELECT table_name, column_name FROM information_schema.columns WHERE column_name = 'xxxseq';
```

#### sequence取得
```
SELECT * FROM information_schema.sequences WHERE sequence_name IN ('hoge_seq');
```

#### 「:has」を含むカラムを検索する
```
SELECT * FROM freearea t WHERE t::text LIKE '%:has%';
```

#### 置換（a.com -> b.com）※'g'であるだけ繰り返す。なしで最初に見つけたものだけ。
```
UPDATE company SET companyname = regexp_replace(companyname,'a.com','b.com', 'g');
```

#### UPDATEして更新内容を確認する
```
UPDATE <TBL名> SET <カラム名> = 'hoge' RETURNING *;
```

#### 1日の最大受注数を取得

```
SELECT cast( ordertime as date ), COUNT(*) AS row_count
FROM ordersummary
GROUP BY cast( ordertime as date )
HAVING COUNT(*) = (
    SELECT MAX(row_count)
    FROM (
        SELECT COUNT(*) AS row_count
        FROM ordersummary
        GROUP BY cast( ordertime as date )
    ) AS counts
);
```

### sqlファイルによるリストア
```
cd "C:\Program Files\PostgreSQL\13\bin\
psql -U postgres -d dbname -f "C:\Downloads\dump.sql"
```
