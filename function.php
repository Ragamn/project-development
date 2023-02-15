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
            echo $e->getMessage();
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