<?php
    session_start();
    require_once 'db_connect.php';

    $error_flag = 0;
    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['name'])){
            $username = $_POST['name'];
        }else{
            $error_flag = 1;
        }
        if(!empty($_POST['password'])){
            $password = $_POST['password'];
        }else{
            $error_flag = 1;
        }
    }
    $id=1;
    if(isset($username) && isset($password)){
        $sql = "SELECT * FROM account WHERE id = :id";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id',$id,PDO::PARAM_INT);
         //SQL文を実行する
         $stm->execute();
        //結果を配列として全件表示する
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        //var_dump($result);
        echo $result['username'];
        echo $result['password'];
        if($username === $result['username'] && $password === $result['password']){
            echo "ログイン成功";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>ログイン画面</h1>
    </header>
<form action="login.php" method="POST">

<div class="cp_iptxt">
<input class="ef" type="text" placeholder="" name="name">
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