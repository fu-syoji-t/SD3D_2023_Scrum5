<?php

    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    $_SESSION['num'] = 0;

    require_once "G1-DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];

    $post = $get->get_post($_GET["postID"]);
    if($post==null){
        header("Location:G1-6-1-1.php");
    }else if($post["post_flag"] == 0 || $post["user_id"] != $_SESSION["userID"]){
        header("Location:G1-6-2-2.php?postID=$postID");
    }

    $users = $get->get_evaluate_users($postID);

?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Evaluation</title>
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
            <div id="modalContentName" class="modal-name">モーダルコンテンツ名</div>
            
            <div class="modal-source">
                <img id="imgModal">
                <object id="textModal"></object>
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
                    <div class="header-title" title="投稿を閉じます。 回答者に「thanks」を付けて [送信] を押してください">
                        Closing
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- 用コンテナ -->

            <div class="col-lg-10 col-xl-9"><!-- 用のコンテナサイズ -->

                <div class="row mb">

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="戻る" onclick="history.back()">
                        </div>
                    </div>
                    
                </div>

                <!-- 投稿情報 -->

                <form action="G1-6-1-3(b).php?postID=<?php echo $_GET['postID'] ?>" method="post">

                <?php
            if(count($users) != 0){
                foreach($users as $user){
                    $userInfo = $get->get_user_info($user["user_id"]);
                    echo '
                <div class="row tdiv">

                    <div class="td post-title col-md-4">'.$userInfo["user_name"].'</div>

                    <div class="td col-md-8">

                        <div class="row">
                            <div class="post-title justify-content-center col-3">
                                thanks :
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-2">
                                        <input type="radio" name="radio'.$user['user_id'].'" id="r1'.$user['user_id'].'" value="1" onchange="changeLabel1('."'".$user['user_id']."'".')">
                                        <label for="r1'.$user['user_id'].'" id="L1'.$user['user_id'].'" style="text-shadow: 0 0 10px;">★</label>
                                    </div>
                                    <div class="col-2">
                                        <input type="radio" name="radio'.$user['user_id'].'" id="r2'.$user['user_id'].'" value="2" onchange="changeLabel2('."'".$user['user_id']."'".')">
                                        <label for="r2'.$user['user_id'].'" id="L2'.$user['user_id'].'"style="text-shadow: 0 0 10px;">★</label>
                                        </div>
                                    <div class="col-2">
                                        <input type="radio" name="radio'.$user['user_id'].'" id="r3'.$user['user_id'].'" value="3" checked onchange="changeLabel3('."'".$user['user_id']."'".')">
                                        <label for="r3'.$user['user_id'].'" id="L3'.$user['user_id'].'" style="text-shadow: 0 0 10px;">★</label>
                                        </div>
                                    <div class="col-2">
                                        <input type="radio" name="radio'.$user['user_id'].'" id="r4'.$user['user_id'].'" value="4" onchange="changeLabel4('."'".$user['user_id']."'".')">
                                        <label for="r4'.$user['user_id'].'" id="L4'.$user['user_id'].'">☆</label>
                                        </div>
                                    <div class="col-2">
                                        <input type="radio" name="radio'.$user['user_id'].'" id="r5'.$user['user_id'].'" value="5" onchange="changeLabel5('."'".$user['user_id']."'".')">
                                        <label for="r5'.$user['user_id'].'" id="L5'.$user['user_id'].'">☆</label>
                                    </div>
                                </div>
                            </div>

                        </div>
                
                    </div>
                
                </div>';
                }
            }else{
                echo
                    '<div class="text-center">
                        掲示を終了します
                    </div>';
            }

                ?>

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
<script>
<?php
for($i=1;$i<=5;$i++){
    echo
'function changeLabel'.$i.'(id){
    var label;
';
    for($j=1;$j<=5;$j++){
        echo
'    label = document.getElementById("L'.$j.'"+id);
    ';
        if($j<=$i){
            echo
    'label.textContent = "★";
    label.style.textShadow = "0 0 10px";
';
        }else{
            echo
    'label.textContent = "☆";
    label.style.textShadow = "0 0 0px";
';
        }
    }
    echo 
'}

';
}
?>
</script>
<style>
    input[type=radio]{
        display: none;
    }
    .td label{
        color: #fc7;/*fc7 75f*/
        padding: 0;
        margin:  5px 0;
        text-align: center;
        font-size: min(8vw, 2.25rem);
        width: 100%;
    }
    .col-2{
        padding: 0;
    }
</style>

<script src="script/script.js"></script>

</html>