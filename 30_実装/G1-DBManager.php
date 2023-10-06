<?php
    class DBManager{

        private function dbConnect(){
            /* パスワード設定
            xampp mysqlを起動
            Shell >> mysql -u root -p を入力
            パスワードが設定されていない場合　何も入力せずenter
            SET PASSWORD FOR root@localhost=password('root'); でパスワードを設定

            xampp >> config.inc.php
            >>
            $cfg['Servers'][$i]['password'] = 'root';　ここに同じパスワードを入力
            */

            // $pdo = new PDO('mysql:host=mysql215.phy.lolipop.lan;dbname=LAA1418719-23dev3early;charset=utf8mb4','LAA1418719','teamd');
            $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8mb4','root','root');
            return $pdo;
        }

        function create($loginID,$password,$nickname,$course,$major,$grade,$classname,$Fsubject){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO users (user_loginID,user_password,user_name,user_course,
                                        user_major,user_grade,user_classname,user_Fsubject)
                                VALUES(?,?,?,?,?,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
            $ps->bindValue(3,$nickname,PDO::PARAM_STR);
            $ps->bindValue(4,$course,PDO::PARAM_STR);
            $ps->bindValue(5,$major,PDO::PARAM_STR);
            $ps->bindValue(6,$grade,PDO::PARAM_STR_CHAR);
            $ps->bindValue(7,$classname,PDO::PARAM_STR);
            $ps->bindValue(8,$Fsubject,PDO::PARAM_STR);
            $ps->execute();

            $sql = "INSERT INTO `evaluation` (`user_id`,`evaluation_trp`,`evaluation_receivednum`,
                                `evaluation_receivedvalue`,`evaluation_sentnum`,`evaluation_sentvalue`)
                                VALUES((SELECT MAX(user_id) FROM users),0,0,0,0,0)";
            $ps = $pdo->prepare($sql)->execute();
        }

        function login($loginID,$password){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM users WHERE user_loginID = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            if(!empty($search)){
                foreach($search as $row){
                    if(password_verify($password,$row["user_password"]) == true){
                        return $search;
                    }
                }
            }
            return $search=[];
        }

        function get_users(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM users";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function get_users_info(){
            /*---------------
            table[users]
            table[evaluation]
            +++++++++++++++
            user_lv
            user_dp
            user_nrp
            user_rank
            user_ratio
            user_rate
            user_Ravg
            user_Savg
            ---------------*/
            $pdo = $this->dbConnect();
            $sql = "SELECT u.*, e.*, 
                           (SELECT COUNT(*) + 1 
                            FROM evaluation AS e2 
                            WHERE e2.evaluation_trp > e.evaluation_trp) AS user_rank
                    FROM users AS u
                    LEFT OUTER JOIN evaluation AS e ON u.user_id = e.user_id
                    ORDER BY e.evaluation_trp DESC";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();

            $sql = "SELECT COUNT(*) AS user_cnt FROM users";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $cnt = $ps->fetch();
            $user_cnt = $cnt["user_cnt"];

            foreach($search as &$row){
                $row["user_lv"] = $Lv = floor(sqrt(($row['evaluation_trp']+2)*5-9));     # $rowに「user_lv」を追加
                $row["user_dp"] = (INT)($Lv/10)+1;                                       # $rowに「user_dp」を追加
                $row["user_nrp"] = (INT)((($Lv+1)*($Lv+1)+3)/5)-$row['evaluation_trp'];  # $rowに「user_nrp」を追加
                
                

                $row["user_ratio"] = (int)($row["user_rank"]/$user_cnt*100); # $rowに「user_ratio」を追加
                $ratio = $row["user_ratio"];
                $rate = ["SSS","SS","S","A","B","C","D","E","F","G","G"];
                $user_rate = $rate[$ratio/10];

                $row["user_rate"] = $user_rate;                                     # $rowに「user_rate」を追加

                if($ratio == 100){
                    $row["user_rate"] .= "－";
                }else if($ratio%10 < 3){                                            # $row["user_rate"]に「+」,「-」を追加
                    $row["user_rate"] .= "✛";
                }else if($ratio%10 >= 7){
                    $row["user_rate"] .= "－";
                }

                if($row['evaluation_receivednum']!=0){                              # $rowに「user_Ravg」を追加
                    $row["user_Ravg"] = number_format($row['evaluation_receivedvalue']/$row['evaluation_receivednum'],1);
                }else{
                    $row["user_Ravg"] = number_format(0.0,1) ;
                }
                if($row['evaluation_sentnum']!=0){                                  # $rowに「user_Savg」を追加
                    $row["user_Savg"] = number_format($row['evaluation_sentvalue']/$row['evaluation_sentnum'],1);
                }else{
                    $row["user_Savg"] = number_format(0.0,1) ;
                }
                
            }
            
            return $search;
        }

        function get_user_info($userID){
            /*---------------
            table[users]
            table[evaluation]
            +++++++++++++++
            user_lv
            user_dp
            user_nrp
            user_rank
            user_ratio
            user_rate
            user_Ravg
            user_Savg
            ---------------*/
            $pdo = $this->dbConnect();
            $sql = "SELECT u.*, e.*, 
                            (SELECT COUNT(*) + 1 
                            FROM evaluation AS e2 
                            WHERE e2.evaluation_trp > e.evaluation_trp) AS user_rank
                    FROM users AS u
                    LEFT OUTER JOIN evaluation AS e ON u.user_id = e.user_id
                    WHERE u.user_id = ?
                    ORDER BY e.evaluation_trp DESC";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetch();
            $row = $search;

            $sql = "SELECT COUNT(*) AS user_cnt FROM users";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetch();
            $ary = $search;
            $row["user_cnt"] = $ary["user_cnt"];

            $row["user_lv"] = $Lv = floor(sqrt(($row['evaluation_trp']+2)*5-9));     # $rowに「user_lv」を追加
            $row["user_dp"] = (INT)($Lv/10)+1;
            $row["user_allnrp"] = (INT)((($Lv+1)*($Lv+1)+3)/5) - (INT)(($Lv*$Lv+3)/5);  # $rowに「user_dp」を追加
            $row["user_nrp"] = (INT)((($Lv+1)*($Lv+1)+3)/5)-$row['evaluation_trp'];  # $rowに「user_nrp」を追加

            $row["user_ratio"] = (int)($row["user_rank"]/$row["user_cnt"]*100); # $rowに「user_ratio」を追加
            $ratio = $row["user_ratio"];
            $rate = ["SSS","SS","S","A","B","C","D","E","F","G","G"];
            $user_rate = $rate[$ratio/10];

            $row["user_rate"] = $user_rate;                                     # $rowに「user_rate」を追加

            if($ratio == 100){
                $row["user_rate"] .= "－";
            }else if($ratio%10 < 3){                                            # $row["user_rate"]に「+」,「-」を追加
                $row["user_rate"] .= "✛";
            }else if($ratio%10 >= 7){
                $row["user_rate"] .= "－";
            }else{
                $row["user_rate"] = $row["user_rate"]."　";
            }
           
            if($row['evaluation_receivednum']!=0){                              # $rowに「user_Ravg」を追加
                $row["user_Ravg"] = number_format($row['evaluation_receivedvalue']/$row['evaluation_receivednum'],1);
            }else{
                $row["user_Ravg"] = number_format(0.0,1) ;
            }
            if($row['evaluation_sentnum']!=0){                                  # $rowに「user_Savg」を追加
                $row["user_Savg"] = number_format($row['evaluation_sentvalue']/$row['evaluation_sentnum'],1);
            }else{
                $row["user_Savg"] = number_format(0.0,1) ;
            }
            return $row;
        }

        function create_post($userID,$title,$subject,$text){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `posts`(`user_id`, `post_flag`, `post_title`, `post_subject`, `post_text`) 
                                VALUES (?,1,?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->bindValue(2,$title,PDO::PARAM_STR);
            $ps->bindValue(3,$subject,PDO::PARAM_STR);
            $ps->bindValue(4,$text,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_post_image($image_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `post_images`(`post_id`, `post_image_path`) 
                                        VALUES ((SELECT MAX(post_id) FROM posts),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$image_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_post_file($file_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `post_files`(`post_id`, `post_file_path`) 
                                        VALUES ((SELECT MAX(post_id) FROM posts),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$file_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_posts(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM posts";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function get_post($postID){
            $pdo = $this->dbConnect();
            $sql = "SELECT p.post_id AS post_id, p.user_id, p.post_flag, post_date, post_title, post_subject, post_text, post_image_path, post_file_path
                    FROM posts AS p
                    LEFT OUTER JOIN post_images AS p_i
                    ON p.post_id = p_i.post_id
                    LEFT OUTER JOIN post_files AS p_f
                    ON p.post_id = p_f.post_id
                    WHERE p.post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetch();

            return $search;
        }

        function create_reply($postID,$userID,$text){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `replies`(`post_id`, `user_id`, `reply_text`)
                                  VALUES (?,?,?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_INT);
            $ps->bindValue(2,$userID,PDO::PARAM_STR);
            $ps->bindValue(3,$text,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_reply_image($image_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `reply_images`(`reply_id`, `reply_image_path`) 
                                        VALUES ((SELECT MAX(reply_id) FROM replies),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$image_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function create_reply_file($file_path){
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `reply_files`(`reply_id`, `reply_file_path`) 
                                        VALUES ((SELECT MAX(reply_id) FROM replies),?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$file_path,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_replies($postID){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM replies
                    WHERE post_id = ?
                    ORDER BY reply_id ASC";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function get_reply($replyID){
            $pdo = $this->dbConnect();
            $sql = "SELECT * 
                    FROM replies AS r
                    LEFT OUTER JOIN reply_images AS r_i
                    ON r.reply_id = r_i.reply_id
                    LEFT OUTER JOIN reply_files AS r_f
                    ON r.reply_id = r_f.reply_id
                    WHERE r.reply_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$replyID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetch();

            return $search;
        }

        function get_my_posts($userID){
            $pdo = $this->dbConnect();
            $sql = "SELECT p.post_id AS post_id, p.user_id, p.post_flag, post_date, post_title, post_subject, post_text, post_image_path, post_file_path
                    FROM posts AS p
                    LEFT OUTER JOIN post_images AS p_i
                    ON p.post_id = p_i.post_id
                    LEFT OUTER JOIN post_files AS p_f
                    ON p.post_id = p_f.post_id
                    WHERE user_id = ?
                    ORDER BY p.post_id ASC";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_INT);
            $ps->execute();
            $search = $ps->fetchAll();

            return $search;
        }

        function get_evaluate_users($postID){
            $pdo = $this->dbConnect();
            $sql = "SELECT DISTINCT user_id FROM replies
                    WHERE post_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function evaluate($postID,$s_userID,$r_userID,$dp,$num){
            $AddTrp = $dp * $num;
            $user = $this->get_user_info($r_userID);
            $beforeTrp = $user['evaluation_trp'];
            $pdo = $this->dbConnect();
            $sql = "INSERT INTO `notices`(`post_id`, `user_id`, `notice_readFlag`, `notice_getRP`, 
                                        `notice_beforeTrp`, `notice_evaluateNum`) 
                                VALUES ( ?, ?, 1, ?, ?, ?)";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_INT);
            $ps->bindValue(2,$r_userID,PDO::PARAM_INT);
            $ps->bindValue(3,$AddTrp,PDO::PARAM_INT);
            $ps->bindValue(4,$beforeTrp,PDO::PARAM_INT);
            $ps->bindValue(5,$num,PDO::PARAM_INT);
            $ps->execute();
           
            $sql = "UPDATE `evaluation`
                    SET `evaluation_trp`=`evaluation_trp`+ ? ,
                        `evaluation_receivednum`=`evaluation_receivednum`+ 1,
                        `evaluation_receivedvalue`=`evaluation_receivedvalue`+ ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$AddTrp,PDO::PARAM_INT);
            $ps->bindValue(2,$num,PDO::PARAM_INT);
            $ps->bindValue(3,$r_userID,PDO::PARAM_INT);
            $ps->execute();

            $sql = "UPDATE `evaluation`
                    SET `evaluation_sentnum`=`evaluation_sentnum`+ 1,
                        `evaluation_sentvalue`=`evaluation_sentvalue`+ ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$num,PDO::PARAM_INT);
            $ps->bindValue(2,$s_userID,PDO::PARAM_INT);
            $ps->execute();
        }

        function post_close($userID,$postID,$dp){
            $user = $this->get_user_info($userID);
            $beforeTrp = $user['evaluation_trp'];
            $pdo = $this->dbConnect();
            if($dp != 0){
                $sql = "INSERT INTO `notices`(`post_id`, `user_id`, `notice_readFlag`, `notice_getRP`, 
                                            `notice_beforeTrp`, `notice_evaluateNum`) 
                                    VALUES ( ?, ?, 1, ?, ?, ?)";
                $ps = $pdo->prepare($sql);
                $ps->bindValue(1,$postID,PDO::PARAM_INT);
                $ps->bindValue(2,$userID,PDO::PARAM_INT);
                $ps->bindValue(3,$dp*3,PDO::PARAM_INT);
                $ps->bindValue(4,$beforeTrp,PDO::PARAM_INT);
                $ps->bindValue(5, 3,PDO::PARAM_INT);
                $ps->execute();
            }
            
            $sql = "UPDATE `posts`
                    SET `post_flag`= 0 
                    WHERE post_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$postID,PDO::PARAM_STR);
            $ps->execute();

            $sql = "UPDATE `evaluation`
                    SET `evaluation_trp`=`evaluation_trp`+ ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$dp*3,PDO::PARAM_STR);
            $ps->bindValue(2,$userID,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_events(){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM `events`";
            $ps = $pdo->prepare($sql);
            $ps->execute();
            $search = $ps->fetchAll();

            return $search;
        }

        function user_update($userID,$loginID,$password,$nickname,$course,$major,$grade,$classname,$Fsubject){
            $pdo = $this->dbConnect();
            $sql = "UPDATE `users`
                    SET `user_loginID`= ? , `user_password`= ?, `user_name`= ? ,`user_course`= ? ,`user_major`= ? ,
                        `user_grade`= ? ,`user_classname`= ? ,`user_Fsubject`= ?
                    WHERE user_id = ? ";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$loginID,PDO::PARAM_STR);
            $ps->bindValue(2,password_hash($password,PASSWORD_DEFAULT),PDO::PARAM_STR);
            $ps->bindValue(3,$nickname,PDO::PARAM_STR);
            $ps->bindValue(4,$course,PDO::PARAM_STR);
            $ps->bindValue(5,$major,PDO::PARAM_STR);
            $ps->bindValue(6,$grade,PDO::PARAM_STR_CHAR);
            $ps->bindValue(7,$classname,PDO::PARAM_STR);
            $ps->bindValue(8,$Fsubject,PDO::PARAM_STR);
            $ps->bindValue(9,$userID,PDO::PARAM_STR);
            $ps->execute();
        }

        function get_notices($userID){
            $pdo = $this->dbConnect();
            $sql = "SELECT * FROM notices
                    WHERE user_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$userID,PDO::PARAM_STR);
            $ps->execute();
            $search = $ps->fetchAll();
            return $search;
        }

        function read_notice($noticeID){
            $pdo = $this->dbConnect();
            $sql = "UPDATE `notices`
                    SET `notice_readFlag`= 0
                    WHERE notice_id = ?";
            $ps = $pdo->prepare($sql);
            $ps->bindValue(1,$noticeID,PDO::PARAM_INT);
            $ps->execute();
        }

        function reConvertMark($text){
            $text = str_replace('<', '&lt;', $text);
            $text = str_replace('>', '&gt;', $text);

            $text = str_replace("z slash z","/",$text);
            $text = str_replace("z point z","`",$text);
            $text = str_replace("z s-elect z","select",$text);
            $text = str_replace("z S-elect z","Select",$text);
            $text = str_replace("z S-ELECT z","SELECT",$text);
            $text = str_replace("z i-nsert z","insert",$text);
            $text = str_replace("z I-nsert z","Insert",$text);
            $text = str_replace("z I-NSERT z","INSERT",$text);
            $text = str_replace("z u-pdate z","update",$text);
            $text = str_replace("z U-pdate z","Update",$text);
            $text = str_replace("z U-PDATE z","UPDATE",$text);
            $text = str_replace("z d-elete z","delete",$text);
            $text = str_replace("z D-elete z","Delete",$text);
            $text = str_replace("z D-ELETE z","DELETE",$text);
            $text = str_replace("z c-reate z","create",$text);
            $text = str_replace("z C-reate z","Create",$text);
            $text = str_replace("z C-REATE z","CREATE",$text);
            $text = str_replace("z a-lter z","alter",$text);
            $text = str_replace("z A-lter z","Alter",$text);
            $text = str_replace("z A-LTER z","ALTER",$text);
            $text = str_replace("z d-rop z","drop",$text);
            $text = str_replace("z D-rop z","Drop",$text);
            $text = str_replace("z D-ROP z","DROP",$text);

            return $text;
        }
/*
        function reConvertMark($text){
            $text = htmlspecialchars($text);

            $text = SQLite3::escapeString($text);

            return $text;
        }
*/
    }
?>