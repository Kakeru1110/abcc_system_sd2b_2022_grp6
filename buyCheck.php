<?php
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>購入チェック</title>
        <link href="css/kounyucheck.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        if(isset($_POST['itembuy'])){
            $item = $cls->getItemsTblByItem_id($_POST['itembuy']);
            foreach($item as $row){
                echo    '<p>商品名　'.$row['item_name'].'<br>金額　'.$row['item_price'].'円</p>
                <p class="p-style">上記の内容にお間違えなければ購入ボタンを押してください</p>
                <form action="item.php" method="POST"><input type="submit" class="btn" id="back-btn" value="戻る"></form>
                <form action="buyFirmed.php" method="POST">
                <input type="submit" class="btn" id="buy-btn" value="購入" name="buyitem">
                </form>';
            }
        }else{
           echo '<p>商品数 '.$_GET['cntitem'].'点<br>合計金額 '.$_GET['sumprice'].'円</p>
           <p class="p-style">上記の内容にお間違えなければ購入ボタンを押してください</p>
           <form action="cart.php" method="POST"><input type="submit" class="btn" id="back-btn" value="戻る"></form>
            <form action="buyFirmed.php" method="POST">
            <input type="submit" class="btn" id="buy-btn" value="購入" name="buycart">
            </form>';
        }   
        ?>
    </body>
</html>