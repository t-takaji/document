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
### pg_dump, pg_restoreによるバックアップ・リストア
#### (1) dump
##### 全DB
```
/usr/pgsql-9.6/bin/pg_dump -h {ホスト名} -p {ポ―ト番号} -U {ユーザ名} -F c -b -v -f {出力ファイルのパス}/db_yyyymmdd.back {DBの名前}
```
##### テーブルのみ
```
/usr/pgsql-9.6/bin/pg_dump -a -O -t {テーブル名} -F c -f {出力ファイルのパス}/db_yyyymmdd.back -h {ホスト名} -p {ポ―ト番号} -U {ユーザ名} {DBの名前}
```
#### (2) restore

```
/usr/pgsql-9.6/bin/pg_restore --clean -h {ホスト名} -p {ポ―ト番号} -U {ユーザ名} -d dbname -v {リストアするファイルのパス}/db_yyyymmdd.back
```

### Windows
#### (1) psql によるリストア
```
cd "C:\Program Files\PostgreSQL\13\bin\
psql -U {username} -d d{bname} -f "C:\Downloads\dump.sql"
```
#### (2) pg_restore によるリストア
```
cd "C:\Program Files\PostgreSQL\13\bin\
pg_restore -U {username} -d {dbname} -t {tablename} "C:\Downloads\dump.sql"
```

### 統計情報とインデックスの再構築
```
VACUUM VERBOSE ANALYZE;
VACUUM FULL VERBOSE ANALYZE; -- 排他的ロックしてもいい場合
REINDEX DATABASE {DBの名前};
```
