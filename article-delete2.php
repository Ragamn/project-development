<?php
    if(isset($_POST['YES'])){
        echo "削除しました。";
    }
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
        <h1>削除画面</h1>
    </header>
    <nav>
	<ul>
	<li class="current"><a href="article-list.php">Home</a></li>
	<li><a href="article-post.php">記事投稿</a></li>
	<li><a href="article-delete.php">記事削除</a></li>
	<li><a href="article-edit.php">記事編集</a></li>

	
	</ul>
	</nav>
    <h1>削除しますか？</h1>
    <form action="article-delete2.php" method="POST">
    <input type="submit" value="YES" name="YES">
    </form>
    <form action="article-delete2.php" method="POST">
    <input type="submit" value="NO" name="NO">
    </form>
    <footer>
        
    </footer>
</body>
</html>