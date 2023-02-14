<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1>検索画面</h1>
    </header>
    <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            require_once 'db_connect.php';
            echo "<br></br>";
            $sql = "SELECT * FROM post WHERE id = :id";
            $stm = $pdo->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_STR);
             //SQL文を実行する
             $stm->execute();
            //結果を配列として全件表示する
            $result = $stm->fetchAll(PDO::FETCH_ASSOC); 
            foreach($result as $data){
               echo "<br></br>";
               echo $data['post'];
               echo "<br></br>";
           }
        }
    ?>
    <footer>
        
    </footer>
</body>
</html>