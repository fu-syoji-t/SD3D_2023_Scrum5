<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    $_SESSION['num']++;
    if($_SESSION['num'] != 1){
        exit;
    }
    
    require_once "G1-DBManager.php";
    $get = new DBManager();
    $postID = $_GET["postID"];
    $post = $get->get_post($postID);
    $postUser = $get->get_user_info($post["user_id"]);

    $users = $get->get_evaluate_users($postID);
    $dp = $postUser["user_dp"];
    foreach($users as $user){
        $num = $_POST["radio".$user['user_id']];
        /* $userInfo = $get->get_user_info($user["user_id"]);
        echo $userInfo["evaluation_trp"];                 header location前のechoはエラーになる
        echo '<br>'.$dp*$num.'<br>';*/                      
        $get->evaluate($postID,$postUser["user_id"],$user["user_id"],$dp,$num);
        /*$userInfo = $get->get_user_info($user["user_id"]);
        echo $userInfo["evaluation_trp"];                   ヘッダー情報は、コンテンツの前に送信せよ
        echo '<br>---------------<br>';*/
    }
    if(count($users) == 0){
        $dp = 0;
    }
    $get->post_close($postUser["user_id"],$postID,$dp);
?>
<script>
    history.go(-3);
</script>