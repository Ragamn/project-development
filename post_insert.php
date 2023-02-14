<?php
    //データベース接続用のファイルを読み込む
    require_once 'db_connect.php';

    $title = $_POST['title'];
    $post = $_POST['post'];
    $share = $_POST['share'];

    $sql = "INSERT INTO post (title, post, share) VALUES (:title, :post, :share)";

    //プリペアードステートメントを作成する
    $stm = $pdo->prepare($sql); 

    //プレースホルダに値をバインドする
    $stm->bindValue(':title', $title, PDO::PARAM_STR);
    $stm->bindValue(':post', $post, PDO::PARAM_STR);
    $stm->bindValue(':share', $post, PDO::PARAM_INT);

    //SQL文を実行する
    $stm->execute();
?>
<p>登録しました</p>
<a href="index.php">一覧へ戻る</a>