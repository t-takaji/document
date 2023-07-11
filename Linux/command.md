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
#### 日時指定してファイルを検索する  
```
find ./ -newermt '2021/12/20 19:06:00' -and ! -newermt '2021/12/20 19:08:00'
```
#### 日時指定してファイルを検索する（特定ディレクトリを対象に含めない）
```
find . -path "./demo" -prune -o -type f -newermt "2023-03-29 13:00:00" -ls
```

#### 特定の拡張子のファイルを検索する  
```
find /foo/bar/ -name "*.jpeg"
```

#### 指定ディレクトリで「キーワード」を再帰的に検索
```
grep -r [検索対象] [ディレクトリ]
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

#### tar.gz解凍（-h：シンボリックリンク）
```
tar zxf {ファイル名} -C {展開先} -h
```

#### 改行コード変換
```
dos2unix *.sh
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
