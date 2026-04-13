### ブランチ間の差分（ファイルのみ）
```
git diff  origin/master origin/production --name-only
```

### ブランチ間の差分
```
git diff  origin/master origin/production
```

### ブランチ間の差分（特定のファイルのみ）
```
git diff  origin/master origin/production -- <ファイル名> <ファイル名>
```

### 最終コミット者とコメント（特定のファイルのみ）
```
git log -1 --date=format:"%Y/%m/%d %H:%M:%S" --pretty=format:"%an | %ad | %s" origin/master -- <ファイル名>
```
