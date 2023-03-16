<?php
        session_start();
    if(isset($_SESSION)){
        $id = $_SESSION['id'];
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
        <h1 id="h1">編集画面</h1>
        <div class="logout">
        <input type="button" class="register" onclick="location.href='logout.php'" value="logout" name="logout">
        </div>
    </header>
    <nav>
	<ul>
	<li><a href="article-list.php">Home</a></li>
	<li><a href="article-post.php">記事投稿</a></li>
	<li><a href="article-delete.php">記事削除</a></li>
	<li class="current"><a href="article-edit.php">記事編集</a></li>
	
	</ul>
	</nav>
    <?php
        require_once 'db_connect.php';
        echo "<br></br>";
        $sql = "SELECT * FROM post WHERE share = 1 AND delete_flag = 0 AND userid = :id";
        $stm = $pdo->prepare($sql);
        $stm->bindValue(':id',$id,PDO::PARAM_INT);
         //SQL文を実行する
        $stm->execute();
        //結果を配列として全件表示する
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $data){
            ?>
            <div class="box2">
            <h1>記事<h1>
            <div class="button2">
            <?php echo $data['title'];?><button type="button" class="btn_01" onclick="location.href='article-edit2.php?id=<?php echo $data['id']?>'">編集</button>
            </div>
            <?php
            echo "<br></br>";
            echo $data['post'];
            echo "<br></br>";
            ?>
            </div>
            <?php

        }
    ?>
    <footer>
        
    </footer>
</body>
</html>
<?php
    }else{
        header('Location: index.php');
    }
?>