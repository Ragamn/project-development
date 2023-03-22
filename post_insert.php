<?php
session_start();
require_once 'function.php';

if($_POST){
        $share = $_POST['share'];
        $userid = $_SESSION['id'];
        $error_flag = true;
        $title = trim($_POST['title'],"\x20\t\n\r\0\v ");
        $post = trim($_POST['post'],"\x20\t\n\r\0\v ");
        if(isset($_POST) && !empty($_POST)){
            if(empty($title)){
                $error_flag = false;
                $_SESSION['errortitle'] = "タイトルが空です。";
            }
            if(empty($post)){
                $error_flag = false;
                $_SESSION['errorpost'] = "内容が空です。";
            }
            if(!empty($_POST['share'])){
                $share = $_POST['share'];
            }
        }
        $deleteflag = 0;
                if($error_flag == false){
                        header('Location: article-post.php');
                }else{
                if(Post($userid,$title,$post,$share,$deleteflag)){
                    echo "投稿完了";
                    unset($_SESSION['errorpost']);
                    unset($_SESSION['errortitle']);
                    header('Location:article-list.php');
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
    
    <p>登録しました</p>
    <a href="article-list.php">一覧へ戻る</a>
</body>
</html>