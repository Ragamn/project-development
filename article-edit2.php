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

    <form action="#" method="post">
        編集 <input type="text" name="title" placeholder="タイトルを入力" required><br>
        <textarea name="post" rows="10" cols="50" placeholder="内容を入力" required></textarea><br>
        <input type="radio" name="share" value="1" >公開
        <input type="radio" name="share" value="0">非公開<br>
        <input type="submit" value="編集">
    </form>

    <footer>
        
    </footer>
</body>
</html>