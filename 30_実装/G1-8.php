<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }
    
    require_once "G1-DBManager.php";
    $get = new DBManager();
    $events = $get->get_events();
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Events</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    
<script src="script/script.js"></script>

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
                    <div class="header-title" title="開催イベントの一覧です">
                        イベント
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-md-10 col-lg-9 col-xl-7"><!-- 用のコンテナサイズ -->
            
                <!-- 開催イベント -->
                <?php
                foreach($events as $event){
                    if($event["event_end"] > date("Y-m-d H:i:s")){
                        echo '
                <div class="row event">
                    <div class="h5 text-center my-3">'.$event["event_title"].'</div>
                    <div class="h5 text-center mb-3">'.substr(date("n/j H:i",strtotime($event["event_start"])),0,17).' ～ '.substr(date("Y n/j H:i",strtotime($event["event_end"])),5,16).'</div>
                    <div class="px-3 event-content">'.$event["event_content"].'</div>
                </div>';
                    }
                }

                ?>
                <!-- /開催イベント -->

            </div>

        </div>

    </div>
    
</body>

</html>
<style>
/*
.tdiv{
    border: 1.5px solid #000;
    border-radius: 5.5px;
    margin-bottom: 1.2rem;
}*/
.tdiv{
    background-color: rgba(255,255,255, 0.5);
    border: 1.5px solid #000;
    border-radius: 5.5px;
    margin-bottom: 1.2rem;
}
.event-content{
    
    white-space: pre;
    white-space: wrap;
}
</style>