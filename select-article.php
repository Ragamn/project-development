<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1 id="h1">記事画面</h1>
        <div class="logout">
        <input type="button" onclick="location.href='logout.php'" value="logout" name="logout">
        </div>
    </header>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            require_once 'db_connect.php';
            echo "<br></br>";
            $sql = "SELECT * FROM post WHERE id = :id";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_STR);
             //SQL文を実行する
             $stm->execute();
            //結果を配列として全件表示する
            $result = $stm->fetchAll(PDO::FETCH_ASSOC);    
           }
    ?>
        <?php foreach($result as $data): ?>
            <h1>
            <h3>タイトル</h3><?php echo $data['title']?>
            <h3>内容</h3><?php echo $data['post'];?>
            </h1>
        <?php endforeach; ?>
    <!-- <footer>
        
    </footer> -->
</body>
</html>