<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>投稿画面</h1>
        <form action="post_insert.php" method="post">
            <input type="text" name="title" placeholder="タイトルを入力" required><br>
            <textarea name="post" rows="10" cols="50" placeholder="内容を入力" required></textarea><br>
            <input type="radio" name="share" value="1" >公開
            <input type="radio" name="share" value="2">非公開<br>
            <input type="submit" value="送信">
        </form>
    </header>
    <?php
        require_once 'db_connect.php';
        echo "<br></br>";
        $sql = "select * from post";
        $stm = $pdo->prepare($sql);
         //SQL文を実行する
        $stm->execute();
        //結果を配列として全件表示する
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        // echo "<pre>";
        // var_dump($result);
        // echo "<pre>";
        foreach($result as $data){
             ?>
            <a href=""><?php echo $data['title'];?></a> 
            <?php
            echo "<br></br>";
            echo $data['content'];
            echo "<br></br>";
        }
    ?>

    <footer>
        
    </footer>
</body>
</html>