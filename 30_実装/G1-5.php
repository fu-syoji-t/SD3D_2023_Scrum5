<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    $_SESSION['num'] = 0;

?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Post</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    
<script src="script/script.js"></script>

    <div id="modal" class="modal">
        <div class="modal-content">
            <div id="modalNameDiv" class="row">
                <div id="modalContentName" class="modal-name">モーダルコンテンツ名</div>
                <div></div>
            </div>
            
            <div class="modal-source">
                <img id="imgModal">
            </div>
        </div>
    </div>

    <div class="container">
            
        <div class="row justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6"><!-- ヘッダー用のコンテナサイズ -->

                <!-- ナビ -->
                <div class="nav">
                    <a class="nav-col" href="G1-4-1.php" title="みんなの投稿"><i class="bi bi-house-door"></i></a>
                    <a class="nav-col" href="G1-6-1-1.php" title="じぶんの投稿"><i class="bi bi-person-lines-fill"></i></i></a>
                    <a class="nav-col" href="G1-7.php" title="ランキング"><i class="bi bi-trophy"></i></a>
                    <a id="nav-col-fixed" class="nav-col nav-col-out" href="G1-5.php" title="投稿"><i class="bi bi-plus-circle"></i>
                    <a class="nav-col" href="G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="nav-col" href="G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="nav-col" href="G1-10.php" title="通知"><i class="bi bi-bell"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="投稿を入力して [送信] を押してください">
                        投稿
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- 用コンテナ -->

            <div class="col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->

                <!-- 投稿内容 -->

                <form action="G1-5(b).php" method="post" enctype="multipart/form-data" onsubmit="return convertMark()">

                <div class="row">

                    <div class="mb col-lg-5">
                        <label for="subject">授業科目</label>
                        <input type="text" id="subject" name="subject" maxlength="30" required>
                    </div>

                    <div class="mb col-lg-7">
                        <label for="postTitle">タイトル</label>
                        <input type="text" id="postTitle" name="postTitle" maxlength="30" required>
                    </div>

                </div>

                <div>
                    <label>投稿内容</label>
                </div>

                <div class="row tdiv">

                <div class="td col-md-3">
                        <div class="row pt-2">

                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center">

                                    <label class="td source-box py-2 col-10">
                                        <input type="file" id="img" name="post_image" accept="image/*" style="display: none;" onchange="viewImg(this)">
                                        <i class="bi bi-image"></i> IMG <i class="bi bi-upload"></i>
                                    </label>
                                    <div id="imgBox" class="td source-box col-10" style="display: none;" onclick="previewImg()">
                                        <img id="preview">
                                    </div>

                                </div>
                            </div>

                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center">

                                    <label class="td source-box py-2 col-10">
                                        <input type="file" id="src" name="post_file" style="display: none;" onchange="viewSrc(this)">
                                        <i class="bi bi-text-left"></i> SRC <i class="bi bi-upload"></i>
                                    </label>
                                    <div id="srcBox" class="td black source-box py-2 col-10" style="display: none; box-shadow: none; outline: none">
                                    
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <textarea class="td text-input col-md-9" name="text" rows="10" required style="max-height: 70vh;"></textarea>
                    
                </div>

                <div class="row mb justify-content-end">

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="submit" class="black" value="送信">
                        </div>
                    </div>

                </div>

                </form>

            </div>

        </div>

    </div>

</body>

<script src="script/script.js"></script>

</html>