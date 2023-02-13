<?php
/*
データベースに接続
セッションを使うようにする
POSTがあるか確認する
    ユーザー名があるか確認
    年齢 (数字であるかどうか)
    性別
    PW
これらのデータがすべてそろったらデータベースに挿入
ログイン画面に遷移する
*/
















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
        <h1>ユーザー新規作成画面</h1>
    </header>
<div class="create-user">
    <form action="create-user-confirm.php">
    ユーザー名
    <input type="text" name="name">
    年齢
    <input type="text" name="age">
    性別
    <input type="radio" name="gender" value="女">女
    <input type="radio" name="gender" value="男">男
    <input type="radio" name="gender" value="その他">その他
    パスワード
    <input type="password" name="pw">
    <input type="submit">
    </form>
</div>
    <footer>
        
    </footer>
</body>
</html>