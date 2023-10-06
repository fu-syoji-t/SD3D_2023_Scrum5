<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>登録内容確認</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
</head>

<body>
<div class="container" style="min-width: 360px;">
<form action="A_G1-2-3(b).php" method="post">
    
    <div class="row mt-4">
        <div class="h4 text-center">
          登録内容確認
        </div>
      </div>
      <div class="row justify-content-center"><!-- フォーム用コンテナ -->

        <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4">
  

    <input type="hidden" name="loginID" value="<?php echo $_POST["loginID"] ?>">
    <input type="hidden" name="password" value="<?php echo $_POST["password"] ?>">
    <input type="hidden" name="nickname" value="<?php echo $_POST["nickname"] ?>">
    <input type="hidden" name="course" value="<?php echo $_POST["course"] ?>">
    <input type="hidden" name="major" value="<?php echo $_POST["major"] ?>">
    <input type="hidden" name="grade" value="<?php echo $_POST["grade"] ?>">
    <input type="hidden" name="classname" value="<?php echo $_POST["classname"] ?>">
    <input type="hidden" name="Fsubject" value="<?php echo $_POST["Fsubject"] ?>">

    <?php echo
        'ログインID：'.$_POST['loginID'].'<br>
         パスワード：'.$_POST['password'].'<br>
         ニックネーム：'.$_POST['nickname'].'<br>
         学科：'.$_POST['course'].'<br>
         専攻：'.$_POST['major'].'<br>
         学年：'.$_POST['grade'].'<br>
         クラス：'.$_POST['classname'].'<br>
         得意科目：'.$_POST['Fsubject'].'<br>';
    ?>
 
 <div class="row mb-3
    justify-content-between">

<div class="col-2">
<div>
    <label>　</label>
</div>
<div>
    <input type="button" value="戻る" onclick="location.href='A_G1-2-2.php'">
</div>
</div>

<div class="col-2">
<div>
    <label>　</label>
</div>
<div>
    <input type="button" onclick="location.href='A_G1-4-1.php'" value="登録">
</div>
</div>

</div>

</body>    
</form>