<?php
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
        <h1>ユーザー作成確認画面</h1>
    </header>
    ユーザー名:<?php echo $_SESSION['username'];?>
    年齢:<?php echo $_SESSION['age'];?>
    性別:<?php echo $_SESSION['gender'];?>
    パスワード: *******
    <footer>
        
    </footer>
</body>
</html>