<?php

//データベースに接続
require_once 'db_connect.php';

//セッションを使うようにする
session_start();
//POSTがあるか確認する
$error_flag = 0;
    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['name'])){
            $username = $_POST['name'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['age'])){
            $password = $_POST['age'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['gender'])){
            $password = $_POST['gender'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['pw'])){
            $password = $_POST['pw'];
        }else{
            $error_flag = 1;
        }
    }

if(!empty($_POST)){
    require_once 'db_connect.php';
    echo "<br></br>";
    $sql = "insert into account (username,gender,age,password)values (:name,:gender,:age,:pw);";
    $stm = $pdo->prepare($sql);
    $stm->bindValue(':name',$name,PDO::PARAM_STR);
    $stm->bindValue(':age',$age,PDO::PARAM_INT);
    $stm->bindValue(':gender',$gender,PDO::PARAM_INT);
    $stm->bindValue(':pw',$pw,PDO::PARAM_STR);
     //SQL文を実行する
    $stm->execute();
}
    //ユーザー名があるか確認
    //年齢 (数字であるかどうか)
    //性別
    //PW
//これらのデータがすべてそろったらデータベースに挿入
//ログイン画面に遷移する

;















?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>ユーザー新規作成画面</h1>
    </header>
<div class="create-user">
    <form action="create-user.php">
    ユーザー名
    <input type="text" name="name">
    年齢
    <input type="text" name="age">
    性別
    <input type="radio" name="gender" value=1>女
    <input type="radio" name="gender" value=2>男
    <input type="radio" name="gender" value=3>その他
    パスワード
    <input type="password" name="pw">
    <input type="submit">
    </form>
</div>
    <footer>
        
    </footer>
</body>
</html>