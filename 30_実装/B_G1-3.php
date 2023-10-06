<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>ステータス</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
  </head>

<body>

  　<div class="h4 text-center">ステータス</div>
    <div class="container" style="min-width: 360px;">
    <div class="row py-2 justify-content-center">

      <div class="row justify-content-center"><!-- フォーム用コンテナ -->

        <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4">
<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<h3>ステータス</h3>

<?php
    require_once "A_DBManager.php";
    $get = new DBManager();
    $row = $get->get_user_info($_SESSION['userID']);
    
    echo    "ログインID　：".$row['user_loginid']."<br>
            ニックネーム：".$row['user_name']."<br>
            学科名　　　：".$row['user_course']."<br>
            専攻名　　　：".$row['user_major']."<br>
            学年　　　　：".$row['user_grade']."<br>
            クラス名　　：".$row['user_classname']."<br>
            得意科目　　：".$row['user_Fsubject']."<br><br>
            Lv　　　　　 = ".$row['user_lv']."<br>
            DP　　　　　= ".$row['user_dp']."<br>
            TRP　　　　 = ".$row['evaluation_trp']."<br>
            NRP　　　　 = ".$row['user_nrp']."<br>
            ランキング　 = ".$row['user_rank']." 位  ( ".$row["user_rate"]." )<br>
            平均被評価値 = ".$row['user_Ravg']."<br>
            平均与評価値 = ".$row['user_Savg']."<br>
            ユーザー数 　= ".$row['user_cnt'];

?>
<br>

        <div class="row mb-3
        justify-content-between">

<div class="col-4">
    <div>
        <label>　</label>
    </div>
    <div>
        <input type="button" value="ログアウト" onclick="location.href='A_LogOut.php'">
    </div>
</div>

<div class="col-4">
    <div>
        <label>　</label>
    </div>
    <div>
        <input type="button" onclick="location.href='A_G1-4-1.php'" value="みんなの投稿へ">
    </div>
</div>

</div>
</div>          
</body>
</html>
