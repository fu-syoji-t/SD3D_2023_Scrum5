<?php
    session_start();
    require_once "G1-DBManager.php";
    $login = new DBManager();
    $search = $login->login($_POST["loginID"],$_POST["password"]);

    if(count($search)==0){
        $_SESSION["checkNum2"] = $_SESSION["checkNum1"] + 1;
        echo '<script> history.back(); </script>';
    }else{
        unset($_SESSION["checkNum1"]);
        unset($_SESSION["checkNum2"]);
        foreach($search as $row){
            $_SESSION['userID']=$row['user_id'];
            header('Location:G1-3.php');
        }
    }
?>