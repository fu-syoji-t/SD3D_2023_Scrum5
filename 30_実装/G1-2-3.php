<?php
    session_start();
    if(isset($_SESSION['userID'])==true){
        header('Location:G1-4-1.php');
    }else if($_SESSION['loginID'] == false
            || $_SESSION['password'] == false
            || $_SESSION['nickname'] == false
            || $_SESSION['course'] == false
            //|| $_SESSION['major'] == false
            || $_SESSION['grade'] == false
            //|| $_SESSION['classname'] == false
            /*|| $_SESSION['Fsubject'] == false*/){
        header('Location:G1-1.php');
    }

    $_SESSION['num'] = 0;

?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Check</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
    <link rel="stylesheet" href="css/style2.css">
</head>

<body>
    
<script src="script/script.js"></script>

    <div class="container">
            
        <div class="row justify-content-center"><!-- ヘッダー用コンテナ -->

            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5"><!-- ヘッダー用のコンテナサイズ -->

                <!-- 見出し -->
                <div class="row">
                    <div class="header-title" title="登録内容を確認して [登録] を押してください">
                        登録内容確認
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- フォーム -->
                <form action="G1-2-3(b).php" method="POST">

                <div class="row mb">
                    <div>
                        <label for="loginID">ログインID</label>
                    </div>
                    <div>
                        <input type="text" name="loginID" id="loginID" value="<?php echo $_SESSION['loginID'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="password">パスワード</label>
                    </div>
                    <div>
                        <input type="password" name="password" id="password" value="<?php echo $_SESSION['password'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="nickname">ニックネーム</label>
                    </div>
                    <div>
                        <input type="text" name="nickname" id="nickname" value="<?php echo $_SESSION['nickname'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="course">学科</label>
                    </div>
                    <div>
                        <input type="text" name="course" id="course" value="<?php echo $_SESSION['course'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="major">専攻</label>
                    </div>
                    <div>
                        <input type="text" name="major" id="major" value="<?php echo $_SESSION['major'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="grade">学年</label>
                    </div>
                    <div>
                        <select class="select" name="grade" id="grade" disabled>
                            <option value="" style="color: #bbb">選択してください</option>
                            <option value=1 <?php if($_SESSION["grade"]==1){echo "selected";} ?>>１年生</option>
                            <option value=2 <?php if($_SESSION["grade"]==2){echo "selected";} ?>>２年生</option>
                            <option value=3 <?php if($_SESSION["grade"]==3){echo "selected";} ?>>３年生</option>
                            <option value=4 <?php if($_SESSION["grade"]==4){echo "selected";} ?>>４年生</option>
                        </select>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="classname">クラス</label>
                    </div>
                    <div>
                        <input type="text" name="classname" id="classname" value="<?php echo $_SESSION['classname'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="Fsubject">得意科目</label>
                    </div>
                    <div>
                        <input type="text" name="Fsubject" id="Fsubject" value="<?php echo $_SESSION['Fsubject'] ?>" disabled>
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
                            <input type="submit" class="black" value="登録">
                        </div>
                    </div>
                    
                </div>

                </form>
                <!--/フォーム -->

            </div>

        </div>

    </div>
    
</body>

<script src="script/script.js"></script>

</html>