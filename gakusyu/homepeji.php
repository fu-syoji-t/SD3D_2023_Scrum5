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
  課題項目: <input type="text" name="name">
  タイトル: <input type="text" name="name">
  課題内容: <input type="text" name="name">
  <input type="submit">
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