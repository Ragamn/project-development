<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>編集画面</h1>
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
        $sql = "SELECT * FROM post WHERE share = 1 AND delete_flag = 0";
        $stm = $pdo->prepare($sql);
         //SQL文を実行する
        $stm->execute();
        //結果を配列として全件表示する
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $data){
             ?>
            <?php echo $data['title'];?><button type="button" onclick="location.href='article-edit2.php?id=<?php echo $data['id']?>'">編集</button>
            <?php
            echo "<br></br>";
            echo $data['post'];
            echo "<br></br>";
        }
    ?>
    <footer>
        
    </footer>
</body>
</html>