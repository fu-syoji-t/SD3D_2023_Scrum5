<!DOCTYPE html>
<html>
<body>
  <center>
    <p>📚 ↓ カ 🎁 🔔 説</p>
  </center>
  <div style="border-top: 2px solid #000;"></div>
  <center>
    <p>投稿</p>
  </center>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  課題科目: <input type="text" name="name">
  タイトル: <input type="text" name="name">
  <input type="submit">
  課題内容：<textarea name="contents" rows="8" cols="40">
  </textarea><br><br>
<input type="submit" value="投稿">
</form>
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 入力された名前を取得
    $name = $_POST['name'];
    echo $name;
   
}
?>
</body>
</html>