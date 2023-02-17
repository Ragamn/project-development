<?php
session_start();
    require_once 'function.php';

    if($_POST){
    $error_flag = true;
    $title = trim($_POST['title'],"\x20\t\n\r\0\v　");
    $post = trim($_POST['post'],"\x20\t\n\r\0\v　");
    if(isset($_POST) && !empty($_POST)){
        if(empty($title)){
            $error_flag = false;
        }
        if(empty($post)){
            $error_flag = false;
        }
        if(!empty($_POST['share'])){
            $share = $_POST['share'];
        }else{
            $error_flag = 1;
        }
    }
    $userid = $_SESSION['id'];
    $deleteflag = 0;
    if($error_flag){
        if(isset($title) && isset($post) && isset($share) && isset($deleteflag)){
            if(Post($userid,$title,$post,$share,$deleteflag)){
                echo "投稿完了";
                header('Location:article-list.php');
            }
        } 
    }
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
        <h1>投稿画面</h1>

        <form action="article-post.php" method="post">

    </header>
    

    <form action="post_insert.php" method="post">
            <input type="text" name="title" placeholder="タイトルを入力" required><br>
            <textarea name="post" rows="10" cols="50" placeholder="内容を入力" required></textarea><br>
            <input type="radio" name="share" value="1" >公開
            <input type="radio" name="share" value="DEFAULT" checked>非公開<br>
            <input type="submit" value="送信">
        </form>

    </header>


    <footer>
        
    </footer>
</body>
</html>