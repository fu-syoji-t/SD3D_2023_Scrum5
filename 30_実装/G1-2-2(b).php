<?php
    session_start();
    if(isset($_SESSION['userID'])==true){
        header('Location:G1-4-1.php');
    }

    $_SESSION['nickname'] = $_POST['nickname'];
    $_SESSION['course'] = $_POST['course'];
    $_SESSION['major'] = $_POST['major'];
    $_SESSION['grade'] = $_POST['grade'];
    $_SESSION['classname'] = $_POST['classname'];
    $_SESSION['Fsubject'] = $_POST['Fsubject'];

    header('Location:G1-2-3.php');
?>