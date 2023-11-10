## 調査
#### grepしながらtail
```
tail -f /var/log/tomcat/hoge/Application.log | grep -e "HOGE" --line-buffered
```
#### 1日以上前のcsvファイルを削除する
```
find /var/log/xxx/ -mtime +0 -name "*.csv" | xargs rm
```
#### 過去90日分のlogファイルだけ残す（カレントディレクトリのみ対象）
```
find /var/log/tomcat/hoge/ -maxdepth 1 -mtime +90 -name "*.log" | xargs rm
```
#### 更新日時が3日以内のファイルを検索する
```
find . -mtime -3 -ls
```
#### 日時指定してファイルを検索する（カレントディレクトリ）  
```
find . -newermt '2021/12/20 19:06:00' -and ! -newermt '2021/12/20 19:08:00'
```
#### 日時指定してファイルを検索する（特定ディレクトリを対象に含めない）
```
find . -path "./demo" -prune -o -type f -newermt "2023-03-29 13:00:00" -ls
```

#### 特定の拡張子のファイルを検索する  
```
find /foo/bar/ -name "*.jpeg"
```

#### カレントディレクトリで「キーワード」を検索
```
find . -name "*.properties" -or -name "*.dicon" | xargs grep "キーワード"
```

#### 指定ディレクトリで「キーワード」を再帰的に検索（.で全件検索）
```
grep -r [キーワード] [ディレクトリ]
```

#### 容量確認（-k：KB、-m：MB）
```
du -m /var/log/tomcat/
```

#### ディレクトリ階層を表示する（tree使える場合）
```
tree -d
```

#### ディレクトリ階層を表示する（tree使えない場合）
```
find . -type d | sed -e "s/[^-][^\/]*\// |/g" -e "s/|\([^ ]\)/|-\1/"
```

#### xxx.tar.gzを解凍する。（中身そのまま展開されるのでディレクトリで固めないこと）※-h：シンボリックリンク
```
tar zxf xxx.tar.gz -C ../xxx -h
```

#### 改行コード変換
```
dos2unix *.sh
```

## 通信
#### グローバルIPアドレス確認
```
curl inet-ip.info
```
#### curl
```
-H   ：リクエストヘッダを指定する
-X   ：HTTPメソッドの指定(GET/POST)
-d   ：HTTPBodyにパラメーターを設定してPOST、ファイルで指定する場合は@ファイル名とする
-i   ：HTTPレスポンスヘッダーの取得(HTTPヘッダを出力)
-k   ：SSL接続(HTTPS)で証明書エラーをスキップ
-u   ：Basic認証

コマンド例）
curl -X POST -H "Content-Type: application/x-www-form-urlencoded;charset=UTF-8" -d "" -i -k -u BASICID:BASICPW https://xxxx
curl -X POST -H "Content-Type: application/json;charset=UTF-8" -d @test.json -i -k -u BASICID:BASICPW https://xxxx

test.json例）
{"to":{"number":"09000000000"},"content":{"message":"test"}}
```

## cron
#### 確認
```
crontab -l
```

#### 設定
```
crontab -e
```
※以降は「i」で編集モード、「ESC」で戻る、「:wq」で保存などEmacsと操作同じ  

## kill
#### プロセスID確認
```
ps -ef | grep java | grep /usr/local/tomcat/prj/ | grep BatchKicker
```

#### kill
```
kill [プロセスID]
```
