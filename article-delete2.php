<?php
session_start();
if(isset($_SESSION)){
    require_once 'function.php';
    if($_GET){
        $id=$_GET['id'];
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>削除</title>
</head>
<body>
    <header>
        <h1 id="h1">削除画面</h1>
        <div class="logout">
        <input type="button" class="register" onclick="location.href='logout.php'" value="logout" name="logout">
        </div>
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
    if(isset($_POST['YES'])){
        $error_flag = true;
        if($error_flag){
                if(Post_delete($id)){
                    ?>
                    <h2><?php echo "削除完了";
                    ?></h2>
                    <button type="button" onclick="location.href='article-list.php'">戻る</button>
                    <?php
                }
            }
        }
        if(!isset($_POST['YES'])){
        ?>
    <h1>削除しますか？</h1>
    <form action="article-delete2.php?id=<?php echo $id?>" method="POST">
    <input type="submit" value="YES" name="YES">
    </form>
    <form action="article-delete.php" method="POST">
    <input type="submit" value="NO" name="NO">
    </form>
    <?php } ?>
    <footer>

    </footer>
</body>
</html>
<?php
    }else{
        header('Location: index.php');
    }
?>