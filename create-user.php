<?php
    require_once 'function.php';
//セッションを使うようにする
session_start();
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
            <h1 id="h1">ユーザー新規作成画面</h1>
            <div class="login">
                <button type="button" class="login" onclick="location.href='login.php'">
                    ログイン
                </button>
                
                <button type="button" class="register" onclick="location.href='create-user.php'">
                    新規作成
                </button>
            </div>
    </header>
    <?php
    if(isset($_SESSION['errorusername'])){
        echo $_SESSION['errorusername'];
    }
    if(isset($_SESSION['errorage'])){
        echo $_SESSION['errorage'];
    }
    if(isset($_SESSION['errorerrorpass'])){
        echo $_SESSION['errorerrorpass'];
    }
    ?>
    <div class="create-user">
    <form action="create-user-confirm.php" method="post">
        <div class="label">
            <p>ユーザー名</p>
            <input type="text" name="username">
        </div>
        <div class="label">
            <p>年齢</p>
            <input type="text" name="age">
        </div>
        <div class="label">
            <p>性別</p>
    <input type="radio" name="gender" value=1>女
    <input type="radio" name="gender" value=2>男
    <input type="radio" name="gender" value=3 checked>その他
    </div>
    <div class="label">
    <p>パスワード</p>
    <input type="password" name="password">
    <input type="submit">
    </div>
    </form>
</div>
    <button type="button" onclick="location.href='index.php'">戻る</button>
    <footer>
        
    </footer>
</body>
</html>