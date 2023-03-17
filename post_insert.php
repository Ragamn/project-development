<?php
session_start();
    //データベース接続用のファイルを読み込む
    require_once 'db_connect.php';

    $title = $_POST['title'];
    $post = $_POST['post'];
    $share = $_POST['share'];
    $userid = $_SESSION['id'];
    $sql = "INSERT INTO post (userid,title, post, share) VALUES (:userid,:title, :post, :share)";

    //プリペアードステートメントを作成する
    $stm = $pdo->prepare($sql); 

    //プレースホルダに値をバインドする
    $stm->bindValue(':userid', $userid, PDO::PARAM_INT);
    $stm->bindValue(':title', $title, PDO::PARAM_STR);
    $stm->bindValue(':post', $post, PDO::PARAM_STR);
    $stm->bindValue(':share', $share, PDO::PARAM_INT);

    //SQL文を実行する
    $stm->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
    <p>登録しました</p>
    <a href="article-list.php">一覧へ戻る</a>
</body>
</html>