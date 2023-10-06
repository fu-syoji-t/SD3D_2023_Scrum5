<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }
    
    require_once "G1-DBManager.php";
    $get = new DBManager();
    $users = $get->get_users_info();
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Ranking</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    
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
                    <div class="header-title" title="全ユーザーのランキングです">
                        ランキング
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-md-10 col-lg-9 col-xl-7"><!-- 用のコンテナサイズ -->
            
                <!-- ランキング -->
                <?php
                foreach($users as $user){
                    echo '
                <div class="row tdiv">
                    <div class="td rank col-2                                           ">'.$user['user_rank'].' 位</div>
                    <div class="col-10">
                        <div class="row">
                            <div class="td      col-8   col-md-4                    ">TRP : '.$user['evaluation_trp'].'</div>
                            <div class="td              col-md-6 d-none d-md-block  ">'.$user['user_name'].'</div>
                            <div class="td rate col-4   col-md-2                    ">'.$user['user_rate'].'</div>
                            <div class="td      col-4   col-md-3                    ">L v : '.$user['user_lv'].'</div>
                            <div class="td      col-8     d-md-none                 ">'.$user['user_name'].'</div>
                            <div class="td              col-md-3 d-none d-md-block  ">D P : '.$user['user_dp'].'</div>
                            <div class="td      col-6   col-md-3                    ">被評 : '.$user['user_Ravg'].'</div>
                            <div class="td      col-6   col-md-3                    ">与評 : '.$user['user_Savg'].'</div>
                            <div class="td              col-md-5 d-none d-md-block  ">'.$user['user_course'].'</div>
                            <div class="td              col-md-7 d-none d-md-block  ">'.$user['user_major'].'</div>
                            <div class="td              col-md-2 d-none d-md-block  ">'.$user['user_grade'].' 年</div>
                            <div class="td              col-md-3 d-none d-md-block  ">'.$user['user_classname'].'</div>
                            <div class="td              col-md-7 d-none d-md-block  ">'.$user['user_Fsubject'].'</div>
                        </div>
                        
                    </div>
                    
                </div>';

                }

                ?>
                <!-- /ランキング -->

            </div>

        </div>

    </div>
    
</body>

<script src="script/script.js"></script>

</html>