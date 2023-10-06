<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    $_SESSION['num'] = 0;

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
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Reply</title>
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
                    <a id="nav-col-fixed" class="nav-col nav-col-out" href="G1-5.php" title="投稿"><i class="bi bi-plus-circle"></i>
                    <a class="nav-col" href="G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="nav-col" href="G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="nav-col" href="G1-10.php" title="通知"><i class="bi bi-bell"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="回答を入力して [送信] を押してください">
                        回答
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


                <form action="G1-4-3(b).php" method="post" enctype="multipart/form-data" onsubmit="return convertMark()"><!-- onsubmit="return convertMark()"-->

                <input type="hidden" name="postID" value="<?php echo $_GET["postID"] ?>">
                
                <div class="row">
                    <div>
                        <label>回答内容</label>
                    </div>
                </div>
                <div class="row tdiv">
                    
                    <div class="td col-md-3">
                        <div class="row pt-2">

                            <div class="col-6 col-md-12">
                                <div class="row justify-content-center">

                                    <label class="td source-box py-2 col-10">
                                        <input type="file" id="img" name="reply_image" accept="image/*" style="display: none;" onchange="viewImg(this)">
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
                                        <input type="file" id="src" name="reply_file" style="display: none;" onchange="viewSrc(this)">
                                        <i class="bi bi-text-left"></i> SRC <i class="bi bi-upload"></i>
                                    </label>
                                    <div id="srcBox" class="td black source-box py-2 col-10" style="display: none; box-shadow: none; outline: none">
                                    
                                    </div>

                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <textarea class="td text-input col-md-9" name="text" rows="10" required></textarea>
                    
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