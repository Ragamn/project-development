<?php
    require_once 'db_connect.php';

    function User_register($username,$gender,$age,$password){
        try{
            $sql = $sql = "insert into account (username,gender,age,password) values (:username,:gender,:age,:password)";
            $stm = db_connect()->prepare($sql);
            $stm->bindValue(':username',$username,PDO::PARAM_STR);
            $stm->bindValue(':gender',$gender,PDO::PARAM_INT);
            $stm->bindValue(':age',$age,PDO::PARAM_INT);
            $stm->bindValue(':password',$password,PDO::PARAM_STR);

            $stm->execute();
            return true;
        }catch(PDOException $e){
             $e->getMessage();
        }finally{
            $pdo = null;
        }
    }
    
    function Login($username,$password){
        try{
            $sql = "SELECT * FROM account WHERE username = :username AND password = :password";
            $stm = db_connect()->prepare($sql);
            $stm->bindValue(':username',$username,PDO::PARAM_STR);
            $stm->bindValue(':password',$password,PDO::PARAM_STR);

            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);;
        }catch(PDOException $e){
            echo $e->getMessage();
        }finally{
            $pdo = null;
        }
    }

    function Post($userid,$title,$post,$share,$deleteflag){
        try{
            $sql = "INSERT INTO post(userid,title,post,share,delete_flag) VALUES (:userid,:title,:post,:share,:deleteflag)";
            $stm = db_connect()->prepare($sql);
            $stm->bindValue(':userid',$userid,PDO::PARAM_INT);
            $stm->bindValue(':title',$title,PDO::PARAM_STR);
            $stm->bindValue(':post',$post,PDO::PARAM_STR);
            $stm->bindValue(':share',$share,PDO::PARAM_INT);
            $stm->bindValue(':deleteflag',$title,PDO::PARAM_STR);

            $stm->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
        }finally{
            $pdo = null;
        }
    }

    function Update($title,$post,$share,$id){
        try{
            $sql = "UPDATE post SET title = :title, post = :post, share=:share WHERE id = :id";
            $stm = db_connect()->prepare($sql);
            $stm->bindValue(':title',$title,PDO::PARAM_STR);
            $stm->bindValue(':post',$post,PDO::PARAM_STR);
            $stm->bindValue(':share',$share,PDO::PARAM_INT);
            $stm->bindValue(':id',$id,PDO::PARAM_INT);

            $stm->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
        }finally{
            $pdo = null;
        }
    }

    function Post_delete($id){
        try{
            $sql = "UPDATE post SET delete_flag = 1 WHERE id = :id";
            $stm = db_connect()->prepare($sql);
            $stm->bindValue(':id',$id,PDO::PARAM_INT);

            $stm->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
        }finally{
            $pdo = null;
        }
    }