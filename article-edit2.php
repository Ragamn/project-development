<?php
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
        <h1>編集画面</h1>
    </header>
    
    <?php
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            require_once 'db_connect.php';
            echo "<br></br>";
            $sql = "SELECT * FROM post WHERE id = :id";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_INT);
             //SQL文を実行する
            $stm->execute();
            //結果を配列として全件表示する
            $result = $stm->fetch(PDO::FETCH_ASSOC);
            $private=" ";
            if(in_array(1,$result,true)){
                $public="checked";
            }else if(in_array(0,$result,true)){
                $private="checked";
            }
        }
       
    ?>
    <form action="article-edit2.php" method="post">
        編集 <input type="text" name="title" placeholder="タイトルを入力" required value="<?php echo $result['title']?>"><br>
        <textarea name="post" rows="10" cols="50" required ><?php echo $result['post']?></textarea><br>
        <input type="radio" name="share"  <?php echo $public?>>公開
        <input type="radio" name="share" <?php echo $private?>>非公開<br>
        <input type="submit" value="編集">
    </form>
        
    <footer>
        
    </footer>
</body>
</html>