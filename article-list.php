<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>一覧画面</h1>
    </header>
    <nav>
	<ul>
	<li class="current"><a href="article-list.php">Home</a></li>
	<li><a href="article-post.php">記事投稿</a></li>
	<li><a href="article-delete.php">記事削除</a></li>
	<li><a href="article-edit.php">記事編集</a></li>

	
	</ul>
	</nav>
    <?php
        require_once 'db_connect.php';
        echo "<br></br>";
        $sql = "SELECT * FROM post";
        $stm = $pdo->prepare($sql);
         //SQL文を実行する
        $stm->execute();
        //結果を配列として全件表示する
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $data){
             ?>
            <a href="select-article.php?id=<?php echo $data['id']?>"><?php echo $data['title'];?></a> 
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