<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    require_once "G1-DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($postID);
    $userID = $post["user_id"];

    if($post==null){
        header("Location:G1-4-1.php");
    }else if($userID == $_SESSION["userID"]){
        header('Location:G1-6-1-2.php?postID='.$postID);
    }

    $user = $get->get_user_info($userID);

    $replies = $get->get_replies($postID);
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Replies</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    
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
                    <div class="header-title" title="回答するときは [回答] を押してください">
                        回答一覧
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
                            <input type="button" value="戻る" onclick="history.back()">
                        </div>
                    </div>

                    <div class="col-4 col-md-3">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                        <input type="button" class="black" onclick="location.href='G1-4-3.php?postID=<?php echo $_GET['postID'] ?>'" value="回答">
                        </div>
                    </div>
                    
                </div>

                <!-- 投稿情報 -->
                <div class="row tdiv">

                    <div class="td col-6 col-md-9"><?php echo $user["user_name"] ?></div>
                    <div class="td text-center col-6 col-md-3"><?php echo date('Y/m/d　H:i',strtotime($post["post_date"])) ?></div>

                    <div class="td col-6 col-md-4"><?php echo $user["user_course"] ?></div>
                    <div class="td col-2 col-md-2"><?php echo $user["user_grade"] ?>年</div>
                    <div class="td col-4 col-md-3"><?php echo $user["user_classname"] ?></div>
                    <div class="td col-md-3 d-none d-md-block">　L v　:　<?php echo $user["user_lv"] ?></div>
                
                    <div class="td col-md-9">科目 : <?php echo $post["post_subject"] ?></div>
                    <div class="td col-md-3 d-none d-md-block">　DP　:　<?php echo $user["user_dp"] ?></div>
                
                    <div class="td post-title col-md-9"><?php echo $post["post_title"] ?></div>
                    <div class="col-md-3 d-none d-md-block">
                        <div class="row">
                            <div class="td m-0">　被評 :　<?php echo $user["user_Ravg"] ?></div>
                            <div class="td m-0">　与評 :　<?php echo $user["user_Savg"] ?></div>
                        </div>
                    </div>

                    <?php
                    if($post["post_image_path"]!=null || $post["post_file_path"]!=null){
                        echo '
                    <div class="td col-md-3">
                        <div class="row justify-content-center pt-2">';
                        if($post["post_image_path"]!=null){
                            echo '
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td source-box col-10" onclick="openImg('."'".$post['post_image_path']."'".')">
                                        <img src="'.$post["post_image_path"].'">
                                    </div>
                                </div>
                            </div>';
                        }
                        if($post["post_file_path"]!=null){
                            echo '
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td black source-box py-2 col-10" onmouseover="changeText(this)" 
                                    onmouseout="restoreText(this,\''.substr($post["post_file_path"],22).'\')" 
                                    onclick="sourceDownload(\''.$post["post_file_path"].'\')">
                                        '.substr($post["post_file_path"],22).'
                                    </div>
                                </div>
                            </div>';
                        }
                        echo '
                        </div>
                    </div>';
                    }
                    ?>

                    <div id="text-p<?php echo $post['post_id'] ?>" class="td text-display col" onclick="textOpenSwitch(this.id)"><?php echo $post["post_text"] ?></div>
                    
                </div>

                <?php
                if(count($replies) == 0){
                    echo
                        '<div class="text-center">
                            まだ回答されていません
                        </div>';
                }

                foreach($replies as $reply){
                    $user = $get->get_user_info($reply["user_id"]);
                    $replyID = $reply["reply_id"];
                    $reply = $get->get_reply($replyID);
                    echo '
                <div class="row tdiv">

                    <div class="td col-6 col-md-9">'.$user["user_name"].'</div>
                    <div class="td text-center col-6 col-md-3">'.date('Y/m/d　H:i',strtotime($reply["reply_date"])).'</div>';
                    if($reply["reply_image_path"]!=null || $reply["reply_file_path"]!=null){
                        echo '
                    <div class="td col-md-3">
                        <div class="row justify-content-center pt-2">';
                        if($reply["reply_image_path"]!=null){
                            echo '
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td source-box col-10" onclick="openImg('."'".$reply["reply_image_path"]."'".')">
                                        <img src="'.$reply["reply_image_path"].'">
                                    </div>
                                </div>
                            </div>';
                        }
                        if($reply["reply_file_path"]!=null){
                            echo '
                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center">
                                    <div class="td black source-box py-2 col-10" onmouseover="changeText(this)" 
                                    onmouseout="restoreText(this,\''.substr($reply["reply_file_path"],22).'\')" 
                                    onclick="sourceDownload(\''.$reply["reply_file_path"].'\')">
                                        '.substr($reply["reply_file_path"],22).'
                                    </div>
                                </div>
                            </div>';
                        }
                        echo '
                        </div>
                    </div>';
                    }
                    echo '
                    <div id="text-r'.$replyID.'" class="td text-display col" onclick="textOpenSwitch(this.id)">'.$reply["reply_text"].'</div>

                </div>';
                }
                ?>

            </div>

        </div>

    </div>

</body>

<script src="script/script.js"></script>

</html>