<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:G1-1.php');
    }

    $_SESSION['loginID'] = $_POST['loginID'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['nickname'] = $_POST["nickname"];
    $_SESSION['course'] = $_POST["course"];
    $_SESSION['major'] = $_POST["major"];
    $_SESSION['grade'] = $_POST["grade"];
    $_SESSION['classname'] = $_POST["classname"];
    $_SESSION['Fsubject'] = $_POST["Fsubject"];


    $pattern = '/^[a-zA-Z0-9_.+-]+$/';

    require_once "G1-DBManager.php";
    $passCheck = new DBManager();
    $user = $passCheck->get_user_info($_SESSION['userID']);
    if($_POST['loginID'] != $user['user_loginID']){
        $users = $passCheck->get_users();
        $userLoginID = [];
        foreach($users as $user){
            array_push($userLoginID, $user['user_loginID']);
        }
        $exixtLoginID = in_array($_POST['loginID'], $userLoginID);
    }else{
        $exixtLoginID = false;
    }

    if (preg_match($pattern, $_POST['loginID']) === 0) {
        $_SESSION['passCheck'] = 1;
        echo '<script> history.back(); </script>';
    }else if($exixtLoginID){
        $_SESSION['passCheck'] = 2;
        echo '<script> history.back(); </script>';
    }else if(mb_strlen($_SESSION['password']) < 6){
        $_SESSION['passCheck'] = 3;
        echo '<script> history.back(); </script>';
    }else{
        unset($_SESSION['passCheck']);
        header('Location:G1-9-3.php');
    }
?>