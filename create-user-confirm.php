<?php
    session_start();

    if($_SESSION['gender'] == 1){
        $_SESSION['gender'] = "女";
    }elseif($_SESSION['gender'] == 2){
        $_SESSION['gender'] = "男";
    }else{
        $_SESSION{'gender'} = "その他";
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>ユーザ登録の確認</title>
</head>
<body>
    <header>
        <h1>ユーザー作成確認画面</h1>
    </header>
    ユーザー名:<?php echo $_SESSION['username'];?>
    年齢:<?php echo $_SESSION['age'];?>
    性別:<?php echo $_SESSION['gender'];?>
    パスワード: *******
    <button type="button" onclick="location.href='index.php'">OK</button>
    <footer>
        
    </footer>
</body>
</html>