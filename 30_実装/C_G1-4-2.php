<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>回答一覧</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
  </head>
  <body>
    <div class="container" style="min-width: 360px;"><!-- コンテナ　ディスプレイ幅360px以下の画面ではレイアウト比率を固定にする -->

      <div class="row py-2 justify-content-center">
        <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5">
          <!-- ナビ -->
          <div class="row nav">
            <a class="col" href="test02_00.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
            <a class="col" href="test02_01.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
            <a class="col" href="test02_02.php" title="ランキング"><i class="bi bi-trophy"></i></a>
            <a class="col" href="test02_03.php" title="開催イベント"><i class="bi bi-flag"></i></a>
            <a class="col" href="test02_04.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
            <a class="col" href="test02_05.php" title="ヘルプ？"><i class="bi bi-question-circle"></i></a>
          </div>
          <!--/ナビ -->
    
          <!-- 見出し -->
          <div class="row mt-4">
            <div class="h4 text-center">
              回答一覧
            </div>
          </div>
        </div>
      </div>

      <div class="row justify-content-center"><!-- フォーム用コンテナ -->
        <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->
          <!-- フォーム -->
          <form action="test01.php" method="POST">
          <!--戻る-->
          <div class="row mb-3 justify-content-between">
            <div class="col-4">
              <div>
                <label>　</label>
              </div>
              <div>
                <input type="button" value="戻る" onclick="history.back()">
              </div>
            </div>
            <!--投稿-->
            <div class="col-4">
              <div>
                <label>　</label>
              </div>
              <div>
                <input type="submit" class="black" value="回答">
              </div>
            </div>
          </div>

          <!--ニックネーム-->
          <div class="row mb-3 justify-content-between">
            <div class="col-4">
              <div>
                ニックネーム
              </div>
            </div>
            <!--日付-->
            <div class="col-4">
              <div>
                2023/05/31 12:00
              </div>
            </div>
          </div>

          <div class="row mb-3 justify-content-between">
            <div class="col-4">
              <div>
                Lv:999(SSS+)
              </div>
            </div>
            <div class="col-4">
              <div>
                DP:4
              </div>
            </div>
            <div class="col-4">
              <div>
                与評４
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <div>
                ○○○○演習
              </div>
            </div>
          </div>
          <div class="row mb-3 justify-content-center">
            <div class="col-4">
              <div>
                ○○がわからないので教えてください
              </div>
            </div>
          </div>

          <div class="row mb-3">
            <div class="col-4">
              <div class="img-wrap">
                <img src="imaging/img1.jpg">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <div>
                ファイル
              </div>
            </div>
          </div>
          <div class="row mb-3 justify-content-between">
            <div class="col-4">
              <div>
                ニックネーム
              </div>
            </div>
            <!--日付-->
            <div class="col-4">
              <div>
                2023/05/31
              </div>
            </div>
          </div>

          <div class="row mb-3 justify-content-between">
            <div class="col-4">
              <div>
                Lv:999(SSS+)
              </div>
            </div>
            <div class="col-4">
              <div>
                DP:4
              </div>
            </div>
            <div class="col-4">
              <div>
                与評４
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <div class="img-wrap">
                <img src="imaging/img1.jpg">
              </div>
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-4">
              <div>
                ファイル
              </div>
            </div>
          </div>
  </body>
</html>