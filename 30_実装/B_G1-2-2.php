
<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>ユーザー情報入力</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
  </head>

<body>

    <form action="A_G1-2-3.php" method="post">
        <div class="container" style="min-width: 360px;"></div>
        <div class="row py-2 justify-content-center"></div>

        <div class="row mt-4">
            <div class="h4 text-center">
              ユーザー情報入力
            </div>
          </div>
          <div class="row justify-content-center"><!-- フォーム用コンテナ -->

            <div class="col-10 col-sm-8 col-md-7 col-lg-5 col-xl-4">
    ニックネーム  
    <input type="text" class="form-control col-12" name="nickname" required><br>
    学科名 
    <input type="text" class="form-control col-12" name="course" required><br>
    専攻名 
    <input type="text" class="form-control col-12" name="major"><br>
    学年  
    <select name="grade" class="form-control col-4"  required>
        <option value=1>１年生</option>
        <option value=2>２年生</option>
        <option value=3>３年生</option>
        <option value=4>４年生</option>
    </select><br>
    クラス名  
    <input type="text" class="form-control col-12" name="classname"><br>
    得意科目
    <input type="text" class="form-control col-12" name="Fsubject"><br>
 
    
    <div class="row mb-3
    justify-content-between">

<div class="col-2">
<div>
    <label>　</label>
</div>
<div>
    <input type="button" value="戻る" onclick="location.href='A_G1-1.php'">
</div>
</div>

<div class="col-2">
<div>
    <label>　</label>
</div>
<div>
    <input type="button" onclick="location.href='A_G1-2-3.php'" value="次へ">
</div>
</div>

</div>

</body>
</form>