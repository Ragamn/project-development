<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1 >閲覧画面</h1>
        <div class="login">
        <button type="button" class="button1" onclick="location.href='login.php'">
        ログイン
        </button>
        
        <button type="button" class="button2" onclick="location.href='create-user.php'">
        新規作成
        </button>
        </div>
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