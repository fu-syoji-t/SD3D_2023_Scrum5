<?php
    session_start();
    if(isset($_SESSION['userID'])==true){
        header('Location:G1-4-1.php');
    }

    if(isset($_SESSION["passCheck"]) == false){
        $_SESSION["passCheck"] = 0;
    }

    require_once "G1-DBManager.php";
    $pass = new DBManager();
    $users = $pass->get_users();
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
    
<script src="script/script.js"></script>

    <div class="container">
            
        <div class="row justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="ログインIDとパスワードを入力して [次へ] を押してください">
                        新規登録
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- フォーム -->
                <form action="G1-2-1(b).php" method="POST" name="pass">

                <div class="row mb">
                    <div>
                        <label for="loginID">ログインID（半角英数）</label>
                    </div>
                    <div>
                        <input type="text" name="loginID" id="loginID" placeholder="loginID" required>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="password">パスワード（半角英数・６文字以上）</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="password" required>
                    </div>
                </div>

                <div class="row mb
                            justify-content-between">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="戻る" onclick="history.back()">
                        </div>
                    </div>

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="submit" class="black" value="次へ">
                        </div>
                    </div>
                    
                </div>

                </form>

                <!--/フォーム -->

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
    
    setTimeout(function() {
        var loginID = document.getElementById("loginID");
        var password = document.getElementById("password");
        var exist = <?php if(isset($_SESSION["loginID"])){ echo "true"; }else{ echo "false"; } ?>;
        if(exist == false){
            loginID.value = "";
            password.value = "";
        }
    },1000);
</script>

</html>