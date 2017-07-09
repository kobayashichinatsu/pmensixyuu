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

try {
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];

    //検索実行
    $sql = 'SELECT * FROM app WHERE mail=? AND pass=?';
    $stmt = $db->prepare($sql);
    $data = array();
    $data[] = $mail;
    $data[] = $pass;
    $stmt->execute($data);


    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $db = null;


    if($rec==false){
        echo '<h3>学籍番号かパスワードが<br>間違っています。</h3><br><br><br>';
        echo '<a href="login.php">戻る</a>';
    }
    else{
        header('Location:login_success.php');
    }
    }
    catch(Exception $e){
        echo 'ただいま障害により大変ご迷惑をお掛けしております。';
        exit();
    }

?>
 </div>
 </div>
 </body>
</html>