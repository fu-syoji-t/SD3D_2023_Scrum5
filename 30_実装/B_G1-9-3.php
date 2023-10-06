<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>編集内容確認</title>
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

                <div class="row mt-4">
                    <div class="h4 text-center">
                    編集内容確認
                    </div>
                </div>
            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

            
            <div align="left"class="example">
                <label for="txt" class="form-label">ログインID</label>
            </div>
            <input type="text" class="form-control" id="txt1" value="loginID" disabled style="border: none; background-color:transparent">


            <div align="left"class="example">
                <label for="txt" class="form-label">パスワード</label>
            </div>
            <input type="text" class="form-control" id="txt2" placeholder="●●●●●●●●">
            

            <div align="left"class="example">
                <label for="txt" class="form-label">ニックネーム</label>
            </div>
            <input type="text" class="form-control" id="txt3" placeholder="ニックネーム">


            <div align="left"class="example">
                <label for="txt" class="form-label">学科名</label>
            </div>
            <input type="text" class="form-control" id="txt4" placeholder="学科名">


            <div class="row mb-3">
                    <div>
                        <label for="grade">学年</label>
                    </div>
                    <div>
                        <select class="select" name="grade" id="grade"  required>
                            <option value="" style="color: #bbb">- - - - -</option>
                            <option value=1>１年生</option>
                            <option value=2>２年生</option>
                            <option value=3>３年生</option>
                            <option value=4>４年生</option>
                        </select>
                    </div>
                </div>       


            <div align="left"class="example">
                <label for="txt" class="form-label">クラス名</label>
            </div>
            <input type="text" class="form-control" id="txt5" placeholder="クラス名">


            <div align="left"class="example">
                <label for="txt" class="form-label">得意科目</label>
            </div>
            <input type="text" class="form-control" id="txt6" placeholder="得意科目">


            <div class="row mb-3
                            justify-content-between">

                    <div class="col-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="戻る" onclick="location.href='B_G1-9-2.php'">
                        </div>
                    </div>

                    <div class="col-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" onclick="location.href=''" value="変更">
                        </div>
                    </div>
                    
            </div>


            </div>

        </div>

    </div>
    
</body>
</html>