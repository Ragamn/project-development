<?php
session_start();
    $_SESSION = [];

    //セッションの鍵(cookie)を削除
    if(isset($_COOKIE[session_name()])){
         setcookie(session_name(),"",time() -1800);
    }

    //セッションファイルの破棄
    session_destroy();

?>