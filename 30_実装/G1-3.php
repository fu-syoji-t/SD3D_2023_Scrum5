<?php
    session_start();
    if(isset($_SESSION['userID'])==false){
        header('Location:A_G1-1.php');
    }

    require_once "G1-DBManager.php";
    $get = new DBManager();
    $row = $get->get_user_info($_SESSION['userID']);

?>

<!DOCTYPE html>
<html>

<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>Status</title>
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
                    <div class="header-title" title="ステータスを確認して [皆の投稿] を押してください">
                        ステータス
                    </div>
                </div>
                <!--/見出し -->

            </div>

        </div>

        <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4"><!-- フォーム用のコンテナサイズ -->

                <!-- ステータス -->

                <div class="row">
                    <div>
                        <label for="Fsubject">ステータス</label>
                    </div>
                    <div class="row status">
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">現在のレベル</div><div class="status-td col-3 col-md-1">( Level )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['user_lv'] ?>　</div><div class="status-td col-3 col-md-2"></div>
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">与ポイント</div><div class="status-td col-3 col-md-1">( D　 P )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['user_dp'] ?>　</div><div class="status-td col-3 col-md-2"></div>
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">累計獲得RP</div><div class="status-td col-3 col-md-1">( T R P )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['evaluation_trp'] ?>　</div><div class="status-td col-3 col-md-2"></div>
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">次のLvまで</div><div class="status-td col-3 col-md-1">( N R P )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['user_nrp'] ?>　</div><div class="status-td col-3 col-md-2">( <?php echo $row['user_allnrp'] ?> )</div>
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">ランキング</div><div class="status-td col-3 col-md-1">( RANK )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['user_rank'] ?>位</div><div class="status-td col-3 col-md-2">／<?php echo $row['user_cnt'] ?></div>
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">ユーザレート</div><div class="status-td col-3 col-md-1">( RATE )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['user_rate'] ?></div><div class="status-td col-3 col-md-2"></div>
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">被評価平均</div><div class="status-td col-3 col-md-1">( R-Avg )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['user_Ravg'] ?>　</div><div class="status-td col-3 col-md-2"></div>
                        <div class="status-td col-3 col-md-1"></div><div class="status-td col-4  d-none d-md-block">与評価平均</div><div class="status-td col-3 col-md-1">( S-Avg )</div><div class="status-td text-right col-3 col-md-4"><?php echo $row['user_Savg'] ?>　</div><div class="status-td col-3 col-md-2"></div>
                    </div>
                </div>

                <div class="row mb
                            justify-content-between">

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" value="ログアウト" onclick="location.href='G1-LogOut.php'">
                        </div>
                    </div>

                    <div class="col-4">
                        <div>
                            <label>　</label>
                        </div>
                        <div>
                            <input type="button" class="black" value="皆の投稿" onclick="location.href='G1-4-1.php'">
                        </div>
                    </div>
                    
                </div>

                <div class="row mb">
                    <div>
                        <label for="nickname">ニックネーム</label>
                    </div>
                    <div>
                        <input type="text" class="input-display" name="nickname" id="nickname" value="<?php echo $row['user_name'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="course">学科</label>
                    </div>
                    <div>
                        <input type="text" name="course" id="course" value="<?php echo $row['user_course'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="major">専攻</label>
                    </div>
                    <div>
                        <input type="text" name="major" id="major" value="<?php echo $row['user_major'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="grade">学年</label>
                    </div>
                    <div>
                        <select name="grade" id="grade" disabled>
                            <option value="" style="color: #bbb">選択してください</option>
                            <option value=1 <?php if($row["user_grade"]==1){echo "selected";} ?>>１年生</option>
                            <option value=2 <?php if($row["user_grade"]==2){echo "selected";} ?>>２年生</option>
                            <option value=3 <?php if($row["user_grade"]==3){echo "selected";} ?>>３年生</option>
                            <option value=4 <?php if($row["user_grade"]==4){echo "selected";} ?>>４年生</option>
                        </select>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="classname">クラス</label>
                    </div>
                    <div>
                        <input type="text" name="classname" id="classname" value="<?php echo $row['user_classname'] ?>" disabled>
                    </div>
                </div>

                <div class="row mb">
                    <div>
                        <label for="Fsubject">得意科目</label>
                    </div>
                    <div>
                        <input type="text" name="Fsubject" id="Fsubject" value="<?php echo $row['user_Fsubject'] ?>" disabled>
                    </div>
                </div>
                
                <!--/ステータス -->

            </div>

        </div>

    </div>
    
</body>

</html>