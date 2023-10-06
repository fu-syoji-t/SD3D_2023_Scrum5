<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }
    
    require_once "G1-DBManager.php";
    $get = new DBManager();
    $notices = array_reverse($get->get_notices($_SESSION['userID']));
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Notice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body class="G1-10">
    
<script src="script/script.js"></script>

    <i id="scrollToTop" class="bi bi-arrow-up"></i>

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
                    <div class="header-title" title="RPの獲得履歴です">
                        通知
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-md-10 col-lg-9 col-xl-7"><!-- 用のコンテナサイズ -->
                
                <!-- 履歴一覧 -->
                <?php
                foreach($notices as $notice){
                    if($notice['notice_readFlag'] == 1){
                        $changeBell = '<i class="bi bi-bell-fill"></i>';
                        $get->read_notice($notice['notice_id']);
                    }else{
                        $changeBell = '<i class="bi bi-bell"></i>';
                    }
                    $post = $get->get_post($notice['post_id']);
                    if($post['user_id'] == $_SESSION['userID']){
                        $noticeCAT = "投稿報酬";
                        $tailText = "の掲示を終了";
                    }else{
                        $noticeCAT = "回答報酬";
                        $tailText = "への回答";
                    }
                    $beforeLv = floor(sqrt(($notice['notice_beforeTrp']+2)*5-9));
                    $afterLv = floor(sqrt(($notice['notice_beforeTrp']+$notice['notice_getRP']+2)*5-9));
                    if($afterLv - $beforeLv > 0){
                        $LevelUp = "Level Up!!";
                    }else{
                        $LevelUp = null;
                    }
                    echo '
                <div class="row tdiv" onclick="location.href=\'G1-6-1-2.php?postID='.$post['post_id'].'\'">
                    <div class="td rank col-2" style="font-size: 1.4rem">'.$changeBell.'</div>
                    <div class="col-10">
                        <div class="row">
                            <div class="td col-6            ">'.$noticeCAT.'</div>
                            <div class="td col-6 text-center">'.substr(date("n/j H:i",strtotime($notice['notice_date'])),0,17).'</div>
                            <div class="td      col-md-6    ">'.$notice['notice_getRP'].' RP 獲得</div>
                            <div class="td      col-md-6    ">L v : '.$beforeLv.' → '.$afterLv.'　'.$LevelUp.'</div>
                            <div class="td d-none d-md-block">「 '.$post['post_title'].' 」'.$tailText.'</div>
                        </div>
                    </div>
                </div>';

                }

                ?>
                <!-- /履歴一覧 -->

            </div>

        </div>

    </div>
    
</body>

<script src="script/script.js"></script>

</html>