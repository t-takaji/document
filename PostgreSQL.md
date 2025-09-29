### SQL文

#### 【テーブル】

##### テーブルの削除
```
-- SELECT tablename FROM pg_tables WHERE schemaname = 'public';
DROP TABLE test_table CASCADE;
```

##### 該当カラムの呼出テーブル一覧取得
```
SELECT table_name, column_name FROM information_schema.columns WHERE column_name = 'test_column';
```
##### 「hoge」を含むカラムを検索する
```
SELECT * FROM freearea t WHERE t::text LIKE '%hoge%';
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




#### 【SEQ】

##### SEQの削除
```
-- SELECT sequence_name FROM information_schema.sequences WHERE sequence_schema = 'public';
DROP SEQUENCE test_seq CASCADE;
```

##### 次のSEQの取得
```
SELECT nextval('goodsseq');
```

##### 現在のSEQの取得
```
-- nextvalした後
SELECT currval('goodsseq');
-- nextvalしない場合
SELECT last_value from '対象のシーケンス名' ;
```

##### SEQを設定
```
SELECT setval('goodsseq', 1000, false);
```

### ダンプ・リストア

### Linuxでのダンプ・リストア
#### 1. dump
##### DB
```
/usr/pgsql-9.6/bin/pg_dump -h {ホスト名} -p {ポ―ト番号} -U {ユーザ名} -F c -b -v -f {出力ファイルのパス}/db_yyyymmdd.back {DBの名前}
```
##### テーブルのみ
```
/usr/pgsql-9.6/bin/pg_dump -a -O -t {テーブル名} -F c -f {出力ファイルのパス}/db_yyyymmdd.back -h {ホスト名} -p {ポ―ト番号} -U {ユーザ名} {DBの名前}
```
#### 2. restore
##### DB
```
/usr/pgsql-9.6/bin/pg_restore --clean -h {ホスト名} -p {ポ―ト番号} -U {ユーザ名} -d dbname -v {リストアするファイルのパス}/db_yyyymmdd.back
```
##### テーブルのみ
```
/usr/pgsql-9.6/bin/pg_restore -U {ユーザ名} -d dbname -t {テーブル名} -h {ホスト名} -p {ポ―ト番号} {リストアするファイルのパス}/db_yyyymmdd.back
```

### Windowsでのダンプ・リストア

#### 1. dump  
コマンドプロンプト（管理者権限あり）で実施する。  
PostgreSQLのbin配下（例：C:\Program Files\PostgreSQL\16\bin）に移動して以下コマンドを実施  

```
pg_dump -U [ユーザー名] -h [ホスト名] -p [ポート番号] -F c -b -v -f [出力ファイル名].dump [データベース名]
```

例：pg_dump -U postgres -h localhost -p 5435 -F c -b -v -f testdb.dump testdb

#### 2. restore
```
pg_restore -U [ユーザー名] -h [ホスト名] -p [ポート番号] -d [データベース名] -v [ダンプファイル名].dump
```

例：pg_restore -U postgres -h localhost -p 5435 -d testdb -v testdb.dump


### 統計情報とインデックスの再構築
```
VACUUM VERBOSE ANALYZE;
VACUUM FULL VERBOSE ANALYZE; -- 排他的ロックしてもいい場合
REINDEX DATABASE {DBの名前};
```
