# zoombar

### 本番環境（参考）
- https://zoombar.net

### 開発環境の作り方
開発環境は、Dockerでローカルマシンを作ります。
以下インストール必要
- Visual Studio Code と git (https://taccuma.com/install-vscode-and-git-in-win10/)<br>
- Docker  (https://qiita.com/zaki-lknr/items/db99909ba1eb27803456)<br>
- Live Server (https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)<br>

以下、VS Code のターミナルで実行

### ソースダウンロード
`git clone https://github.com/kllc/zoombar.git`

### Docker コンテナ作成
Zoom Bar のフォルダで Terminalから、以下のコマンドを打つ<br>
`docker image build -t php7.2-apache-trial2 .` <br>
`docker-compose up`

### MySQL テーブル作成
`docker exec -it mysql5.7-trial2 bash`<br>
`mysql -uroot -proot`<br>
`use test`<br>
CREATE TABLE.sql に書かれている２つのCREATE文を実行

### 実行（開発環境）
Visual Studio で Go Live ボタンを押下

### 本番環境との違い
- DBが本番と違います。mysql.php を開発用に設定しています。
- reCAPTCHA （SPAM防止）が動きません。
- メール送信も動きません。登録データは以下から確認してください。
http://127.0.0.1:5500/admin.html
