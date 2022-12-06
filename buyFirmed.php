<?php
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    if(isset($_POST['buycart'])){
        $cls->DeleteCartTblByUserid($_SESSION['user_id']);
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>購入確定</title>
        <link href="css/kounyukakutei.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <p class="p-style">購入が確定されました</p>
        <button type="button" onclick="location.href='item.php'" class="btn" id="back-btn">商品一覧へ戻る</button>
    </body>
</html>