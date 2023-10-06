<?php
    session_start();
    if(isset($_SESSION['userID'])==true){
        header('Location:G1-4-1.php');
    }

    if(isset($_SESSION["checkNum1"]) == false){
        $_SESSION["checkNum1"] = 0;
        $_SESSION["checkNum2"] = 0;
    }

    unset($_SESSION['passCheck']);

    unset($_SESSION['loginID']);
    unset($_SESSION['password']);
    unset($_SESSION['nickname']);
    unset($_SESSION['course']);
    unset($_SESSION['major']);
    unset($_SESSION['grade']);
    unset($_SESSION['classname']);
    unset($_SESSION['Fsubject']);
?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body class="G1-1">
    
<script src="script/script.js"></script>

    <div class="container">
            
        <div class="row justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="ログインIDとパスワードを入力して [ログイン] を押してください">
                        ログイン
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- フォーム -->
                <form action="G1-1(b).php" method="POST">

                <div class="row mb">
                    <div>
                        <label for="loginID">ログインID</label>
                    </div>
                    <div>
                        <input type="text" name="loginID" id="loginID" placeholder="loginID" required>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="password">パスワード</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" placeholder="password" required>
                    </div>
                </div>

                <div class="row mb
                            justify-content-end">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="submit" class="black" value="ログイン">
                        </div>
                    </div>
                    
                </div>

                </form>
                <!--/フォーム -->

                <div class="row mb">
                    <div>
                        <label>　</label>
                    </div>
                    <div class="text-center h5">
                        <a href="G1-2-1.php" style="color: #63f">新規登録はこちら</a>
                    </div>
                </div>

            </div>

        </div>

    </div>
    
</body>

<script>
window.onload = function(){
    setTimeout(function (){
<?php 
if($_SESSION["checkNum1"] < $_SESSION["checkNum2"]){
    echo
'       alert("入力内容が正しくありません");';
    $_SESSION["checkNum1"] = $_SESSION["checkNum2"];
}
?>
    }, 50);
}
</script>

</html>