
<!DOCTYPE html>
<html lang="ja">
  <head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <title>新規登録</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>

    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style1.css">
  </head>
  <div class="container" style="min-width: 360px;">
    <div class="row mt-4">
        <div class="h4 text-center">
          新規登録
        </div>
      </div>
      <div align="center" class="example">
        <div class="w-50 p-3">
            <div align="left"class="example">
                <label for="txt" class="form-label">ログインID</label>
            </div>
            <!--ログインID入力-->
            <input type="text" class="form-control" id="txt1" placeholder="loginID"><br>


            <div align="left"class="example">
                <label for="txt" class="form-label">パスワード</label>
            </div>
            <!--パスワード入力-->
            <input type="text" class="form-control" id="txt2" placeholder="password">

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
                            <input type="button" onclick="location.href='A_G1-2-2.php'" value="次へ">
                        </div>
                    </div>
                    
                </div>
        </div>
</form>