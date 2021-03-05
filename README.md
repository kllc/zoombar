# zoombar

### ダウンロード
`git clone https://github.com/kllc/zoombar.git`

### 開発環境の作り方
以下３つインストール必要
- Visual Studio Code <br>
- Docker  (https://qiita.com/zaki-lknr/items/db99909ba1eb27803456)<br>
- Live Server (https://marketplace.visualstudio.com/items?itemName=ritwickdey.LiveServer)

### Docker コンテナ作成
Zoom Bar のフォルダで Terminalから、以下のコマンドを打つ<br>
`docker image build -t php7.2-apache-trial2 .` <br>
`docker-compose up`

### 実行（開発環境）
Visual Studio で Go Live ボタンを押下
