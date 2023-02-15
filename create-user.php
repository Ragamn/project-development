<?php
    require_once 'function.php';
//セッションを使うようにする
session_start();
//POSTがあるか確認する
$error_flag = 0;
    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['username'])){
            $username = $_POST['username'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['age'])){
            $age = $_POST['age'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['gender'])){
            $gender = $_POST['gender'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['password'])){
            $password = $_POST['password'];
        }else{
            $error_flag = 1;
        }
    }

if(!empty($_POST)){
    if(User_register($username,$age,$gender,$password)){
        $_SESSION['username'] = $username;
        $_SESSION['age'] = $age;
        $_SESSION['gender'] = $gender;
        $_SESSION['password'] = $password;
        header('Location:create-user-confirm.php');
    }
}
    //ユーザー名があるか確認
    //年齢 (数字であるかどうか)
    //性別
    //PW
//これらのデータがすべてそろったらデータベースに挿入
//ログイン画面に遷移する

















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
    <form action="create-user.php" method="post">
    ユーザー名
    <input type="text" name="username">
    年齢
    <input type="text" name="age">
    性別
    <input type="radio" name="gender" value=1>女
    <input type="radio" name="gender" value=2>男
    <input type="radio" name="gender" value=3>その他
    パスワード
    <input type="password" name="password">
    <input type="submit">
    </form>
</div>
    <footer>
        
    </footer>
</body>
</html>