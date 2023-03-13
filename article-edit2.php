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
    <form action="#" method="post">
        編集 <input type="text" name="title" placeholder="タイトルを入力" required value="<?php echo $result['title']?>"><br>
        <textarea name="post" rows="10" cols="50" required placeholder="<?php echo $result['post']?>"></textarea><br>
        <input type="radio" name="share"  <?php echo $public?>>公開
        <input type="radio" name="share" <?php echo $private?>>非公開<br>
        <input type="submit" value="編集">
    </form>
        
    <footer>
        
    </footer>
</body>
</html>