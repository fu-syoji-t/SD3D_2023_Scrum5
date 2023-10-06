<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }
?>

<input type="button" onclick="location.href='A_G1-4-1.php'" value="みんなの投稿">
<input type="button" onclick="location.href='A_G1-6-1-1.php'" value="じぶんの投稿">
<input type="button" onclick="location.href='A_G1-7.php'" value="ランキング">
<input type="button" onclick="location.href='A_G1-8.php'" value="開催イベント">
<input type="button" onclick="location.href='A_G1-9-1.php'" value="ステータス">
<input type="button" onclick="location.href='A_G1-10.php'" value="ヘルプ">

<h3>開催イベント</h3>

<?php  
    require_once "A_DBManager.php";
    $get = new DBManager();
    $events = $get->get_events();

    foreach($events as $event){
        echo   '<div>
                '.date('m/d H:i',strtotime($event["event_start"])).' ～ 
                '.date('m/d H:i',strtotime($event["event_end"])).'<br>
                <h3>'.$event["event_title"].'</h3>
                '.$event["event_content"].'
                </div>';
    }
?>

<style>
    div{
        border: 1px solid;
        width: 500px;
    }
</style>