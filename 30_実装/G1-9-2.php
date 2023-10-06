<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    if(isset($_SESSION["passCheck"]) == false){
        $_SESSION["passCheck"] = 0;
    }

    require_once "G1-DBManager.php";
    $get = new DBManager();
    $row = $get->get_user_info($_SESSION['userID']);

?>
<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Edit User Info</title>
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
                    <a id="nav-col-fixed" class="nav-col nav-col-out" href="G1-5.php" title="投稿"><i class="bi bi-plus-circle"></i>
                    <a class="nav-col" href="G1-8.php" title="開催イベント"><i class="bi bi-flag"></i></a>
                    <a class="nav-col" href="G1-9-1.php" title="ステータス"><i class="bi bi-person-circle"></i></a>
                    <a class="nav-col" href="G1-10.php" title="通知"><i class="bi bi-bell"></i></a>
                </div>
                <!--/ナビ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="ユーザ情報を編集して [確認] を押してください">
                        ユーザ情報編集
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- ステータス -->
                <div class="row mb">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="戻る" onclick="history.back()">
                        </div>
                    </div>
                </div>
                
                <form action="G1-9-2(b).php" method="post">

                <div class="row mb">
                    <div>
                        <label for="loginID">ログインID（半角英数）</label>
                    </div>
                    <div>
                        <input type="text" class="input-display" name="loginID" id="loginID" value="<?php echo $row['user_loginID'] ?>" placeholder="loginID" required>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="password">パスワード（半角英数・６文字以上）</label>
                    </div>
                    <div>
                        <input type="password" class="input-display" name="password" id="password" placeholder="password" required>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="nickname">ニックネーム（必須）</label>
                    </div>
                    <div>
                        <input type="text" class="input-display" name="nickname" id="nickname" value="<?php echo $row['user_name'] ?>" placeholder="nickname" required>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="course">学科（必須）</label>
                    </div>
                    <div>
                        <input type="text" name="course" id="course" value="<?php echo $row['user_course'] ?>" placeholder="course" required>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="major">専攻</label>
                    </div>
                    <div>
                        <input type="text" name="major" id="major" value="<?php echo $row['user_major'] ?>" placeholder="major">
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="grade">学年（必須）</label>
                    </div>
                    <div>
                        <select name="grade" id="grade" required>
                            <option value="" style="color: #bbb">選択してください</option>
                            <option value=1 <?php if($row["user_grade"]==1){echo "selected";} ?>>１年生</option>
                            <option value=2 <?php if($row["user_grade"]==2){echo "selected";} ?>>２年生</option>
                            <option value=3 <?php if($row["user_grade"]==3){echo "selected";} ?>>３年生</option>
                            <option value=4 <?php if($row["user_grade"]==4){echo "selected";} ?>>４年生</option>
                        </select>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="classname">クラス</label>
                    </div>
                    <div>
                        <input type="text" name="classname" id="classname" value="<?php echo $row['user_classname'] ?>" placeholder="classname">
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="Fsubject">得意科目</label>
                    </div>
                    <div>
                        <input type="text" name="Fsubject" id="Fsubject" value="<?php echo $row['user_Fsubject'] ?>" placeholder="favorite subject">
                    </div>
                </div>

                <div class="row mb justify-content-end">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="submit" class="black" value="確認">
                        </div>
                    </div>
                </div>
                
                </form>

                <!--/ステータス -->

            </div>

        </div>

    </div>
    
</body>

<script>
    window.onload = function(){
        setTimeout(function (){
<?php 
    if($_SESSION['passCheck'] == 1){
        echo
'            alert("ログインIDは 半角英数字で設定してください");';
    }else if($_SESSION['passCheck'] == 2){
        echo
'            alert("このログインIDは すでに使用されています");';
    }else if($_SESSION['passCheck'] == 3){
        echo
'            alert("パスワードは 6文字以上の必要があります");';
    }
?>
        }, 50);
    }
</script>

</html>