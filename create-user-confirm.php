<?php
    session_start();
    require_once 'function.php';
    $error_flag = true;
    $_POST['username'] = trim($_POST['username'],"\x20\t\n\r\0\v　");
    $_POST['age'] = trim($_POST['age'],"\x20\t\n\r\0\v　");
    $_POST['password'] = trim($_POST['password'],"\x20\t\n\r\0\v　");
    if(isset($_POST) && !empty($_POST)){
        if(!empty($_POST['username'])){
            $username = $_POST['username'];
        }
        if(!empty($_POST['age'])){
            $age = $_POST['age'];
        }else{
            $error_flag = false;
            $_SESSION['errorage'] = "年齢が空です。";
        }
        if(!empty($_POST['gender'])){
            $gender = $_POST['gender'];
        }
        if(!empty($_POST['password'])){
            $password = $_POST['password'];
        }else{
            $error_flag = false;
            $_SESSION['errorpass'] = "パスワードが空です。";
        }
    }
    if(!empty($_POST) && $error_flag){
        if(User_register($username,$age,$gender,$password)){
            $_SESSION['username'] = $username;
            $_SESSION['age'] = $age;
            $_SESSION['gender'] = $gender;
            $_SESSION['password'] = $password;
            unset($_SESSION['errorusername']);
            unset($_SESSION['errorage']);
            unset($_SESSION['errorpass']);
            if($_SESSION['gender'] == 1){
                $_SESSION['gender'] = "女";
            }elseif($_SESSION['gender'] == 2){
                $_SESSION['gender'] = "男";
            }else{
                $_SESSION{'gender'} = "その他";
            }
        }else{ 
        if(empty($_POST['username'])){
            $_SESSION['errorusername']="名前が空です。";
            $error_flag = false;
        }else{
            $_SESSION['errorusername']="既に使用されている名前です。";
            $error_flag = false;
        }
        }
    }
    if($error_flag == false){
        header('Location: create-user.php');
    }else{
    ?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="img/favicon.ico">
    <title>ユーザ登録の確認</title>
</head>
<body>
    <header>
        <h1 id="h1">ユーザー作成確認画面</h1>
    </header>
    ユーザー名:<?php echo $_SESSION['username'];?>
    年齢:<?php echo $_SESSION['age'];?>
    性別:<?php echo $_SESSION['gender'];?>
    パスワード: *******
    <button type="button" onclick="location.href='create-user-confirm.php'">OK</button>
    <footer>
        
    </footer>
</body>
</html>
<?php }?>