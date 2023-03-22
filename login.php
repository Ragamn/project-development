<?php
    session_start();
    require_once 'function.php';

    $error_flag = 0;
    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['username'])){
            $username = $_POST['username'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['password'])){
            $password = $_POST['password'];
        }else{
            $error_flag = 1;
        }
    }
    if(isset($username) && isset($password)){
        $result = Login($username,$password);
        if($username === $result['username'] && $password === $result['password']){
            $_SESSION['id'] = $result['id'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['gender'] = $result['gender'];
            $_SESSION['age'] = $result['age'];
            header('Location:article-list.php');
        }
    } 
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>ログイン画面</title>
</head>
<body>
    <header>
        <h1 id="h1">ログイン画面</h1>
        <div class="exit">
        <input type="button" onclick="location.href='index.php'" value="戻る" name="exit">
        </div>
    </header>
<form action="login.php" method="POST">

<div class="cp_iptxt">
<input class="ef" type="text" placeholder="" name="username">
<label>お名前</label>
<span class="focus_bg"></span>
</div>
<div class="cp_iptxt">
<input class="ef" type="text" placeholder="" name="password">
<label>パスワード</label>
<span class="focus_bg"></span>
</div>
<input type="submit" class="send-login">
</form>

    <footer>
        
    </footer>
    
</body>
</html>