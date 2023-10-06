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
    $update = new DBManager();
    $update->user_update($_SESSION["userID"],$_SESSION["loginID"],$_SESSION["password"],$_SESSION["nickname"],$_SESSION["course"],
                    $_SESSION["major"],$_SESSION["grade"],$_SESSION["classname"],$_SESSION["Fsubject"]);
?>
<script>
    history.go(-3);
</script>