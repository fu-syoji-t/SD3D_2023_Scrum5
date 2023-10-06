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
    $create_post = new DBManager();

    $text = $create_post->reConvertMark($_POST["text"]);
    
    $create_post->create_post($_SESSION["userID"],$_POST["postTitle"],$_POST["subject"],$text);

    $target = array('\'', '"');
    if(is_uploaded_file($_FILES['post_image']['tmp_name'])){

        if(!file_exists('image')){
            mkdir('image');
        }

        $file = 'image/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['post_image']['name']));//ファイルの名前だけの保存
        if(move_uploaded_file($_FILES['post_image']['tmp_name'],$file)){//$fileに名前が格納されている　一時的なファイル,保存先のファイル
            $create_post->create_post_image($file);
        }

    }
    
    if(is_uploaded_file($_FILES['post_file']['tmp_name'])){

        if(!file_exists('source')){
            mkdir('source');
        }

        /*フォルダ名をtextからsourceに変更
        $extension = explode(".",$_FILES['post_file']['name']);
        $file= 'text/'.date("YmdHis")."_".$extension[0].".txt";*/
        $file= 'source/'.date("YmdHis")."_".str_replace($target,'',basename($_FILES['post_file']['name']));
        if(move_uploaded_file($_FILES['post_file']['tmp_name'],$file)){
            $create_post->create_post_file($file);
        }

    }

?>
<script>
    //history.go(0);
    location.replace('G1-6-1-1.php');
</script>