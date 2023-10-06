<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    require_once "G1-DBManager.php";
    $get = new DBManager();
    $posts = array_reverse($get->get_my_posts($_SESSION["userID"]));
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>MyPosts</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body class="G1-6-1-1">
    
<script src="script/script.js"></script>

    <i id="scrollToTop" class="bi bi-arrow-up"></i>

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
                    <a id="nav-col-fixed" class="nav-col" href="G1-5.php" title="投稿"><i class="bi bi-plus-circle"></i>
                    <a class="nav-col" href="G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="nav-col" href="G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="nav-col" href="G1-10.php" title="通知"><i class="bi bi-bell"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="掲示中の投稿一覧です">
                        じぶんの投稿
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- 用コンテナ -->

            <div class="col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->

                <div class="row mb
                            justify-content-between">

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="Open" onclick="location.href='G1-6-1-1.php'" style="outline: 4px solid #888;">
                        </div>
                    </div>

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                        <input type="button" value="Closed" onclick="location.href='G1-6-2-1.php'">
                        </div>
                    </div>
                    
                </div>

                <!-- 投稿情報 -->
                <?php

                $count = 0;

                foreach($posts as $post){
                    if($post["post_flag"] == 0){
                        continue;
                    }
                    $count++;
                    $postID = $post["post_id"];
                    if(count($get->get_evaluate_users($postID)) > 0){
                        $repUserCnt = count($get->get_evaluate_users($postID)); 
                    }else{
                        $repUserCnt = null;
                    }
                    if(count($get->get_replies($postID)) > 0){
                        $replyCnt = count($get->get_replies($postID)); 
                    }else{
                        $replyCnt = null;
                    }

                    echo '
                <div class="row tdiv" onclick="location.href=\'G1-6-1-2.php?postID='.$postID.'\'">

                    <div class="td col-md-3 d-none d-md-block">
                        <div class="row justify-content-center pt-2">';
                            if($post["post_image_path"]!=null){
                                echo 
                            '<div class="td source-box col-10" onclick="toImgModal(event, \''.$post['post_image_path'].'\')">
                                <img src="'.$post["post_image_path"].'">
                            </div>';
                            }
                            if($post["post_file_path"]!=null){
                                echo 
                            '<div class="td black source-box py-2 col-10" onmouseover="changeText(this)" 
                            onmouseout="restoreText(this,\''.substr($post["post_file_path"],22).'\')" 
                            onclick="toSourceDownload(event,\''.$post["post_file_path"].'\')">
                                '.substr($post["post_file_path"],22).'
                            </div>';
                            }
                        
                        echo '
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="td">'.date('Y/m/d　H:i',strtotime($post["post_date"])).'</div>
                            <div class="td">科目 : '.$post["post_subject"].'</div>
                            <div class="td post-title" style="height: 86px">'.$post["post_title"].'</div>
                            <div class="td row m-0">
                                <div class="col-6 col-md-8 p-0"></div>
                                <div class="col-3 col-md-2 p-0"><i class="bi bi-person"></i>　'.$repUserCnt.'</div>
                                <div class="col p-0"><i class="bi bi-chat-left-text"></i>　'.$replyCnt.'</div>
                            </div>
                        </div>
                    </div>

                </div>';
                }
                
                if($count == 0){
                    echo
                        '<div class="text-center">
                            掲示中の投稿はありません
                        </div>';
                }
            
                ?>

            </div>

        </div>

    </div>

</body>

<script src="script/script.js"></script>

</html>