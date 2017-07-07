<!DOCTYPE html>
<html>
 <head>
  <meta charset="utf-8">
  <title>ログイン画面</title>
  <link rel="stylesheet" type="text/css" href="index.css">
  <link rel="stylesheet" type="text/css" href="decorate.css">
 </head>

 <body>
 <div class="container">
 <div class="content">

<?php
//データベース接続設定
$dbServer = '127.0.0.1';
$dbUser = $_SERVER['MYSQL_USER'];
$dbPass = $_SERVER['MYSQL_PASSWORD'];
$dbName = $_SERVER['MYSQL_DB'];
# MySQL用のDSN文字列です。
$dsn = "mysql:host={$dbServer};dbname={$dbName};charset=utf8";


//データベースへの接続
$db = new PDO($dsn, $dbUser, $dbPass);


//送信データの取得
$name = $_POST['name'];
$mail = $_POST['mail'];
$pass = $_POST['pass'];


//検索実行
$sql = 'INSERT INTO app (name, mail, pass) VALUES (:name, :mail, :pass)';
$prepare = $db->prepare($sql);
$prepare->bindValue(':name', $name, PDO::PARAM_STR);
$prepare->bindValue(':mail', $mail, PDO::PARAM_STR);
$prepare->bindValue(':pass', $pass, PDO::PARAM_STR);
$prepare->execute();


//結果の確認
echo '<a href="login.php"><h2>会員登録完了</h2></a>';
?>

 </div>
 </div>
 </body>
</html>
