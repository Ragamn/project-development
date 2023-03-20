<?php
session_start();
    require_once 'function.php';

    if(isset($_SESSION['errortitle']) OR isset($_SESSION['errorpost'])){
        if(isset($_SESSION['errortitle'])){
            echo $_SESSION['errortitle'];
        }
        if(isset($_SESSION['errorpost'])){
            echo $_SESSION['errorpost'];
        }
    }
    if(isset($_SESSION)){
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
        <h1 id="h1">投稿画面</h1>
        <div class="logout">
        <input type="button" onclick="location.href='logout.php'" value="logout" name="logout">
        </div>

    </header>
    <nav>
	<ul>
	<li><a href="article-list.php">Home</a></li>
	<li class="current"><a href="article-post.php">記事投稿</a></li>
	<li><a href="article-delete.php">記事削除</a></li>
	<li><a href="article-edit.php">記事編集</a></li>

	
	</ul>
	</nav>
    <div class="create-post">
    <form action="post_insert.php" method="post">
            <input type="text" name="title" placeholder="タイトルを入力"><br>
            <textarea name="post" rows="10" cols="50" placeholder="内容を入力"></textarea><br>
            <input type="radio" name="share" value="1" >公開
            <input type="radio" name="share" value="DEFAULT" checked>非公開<br>
            <input type="submit" value="送信">
        </form>
    </div>

    </header>


    <footer>
        
    </footer>
</body>
</html>
<?php
    }else{
        header('Location: index.php');
    }
?>