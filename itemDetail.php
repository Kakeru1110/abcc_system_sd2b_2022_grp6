<?php 
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $searchArray = $cls->getItemsTblByItem_id($_GET['itemid']);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/shosai.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
            foreach($searchArray as $row){
                echo    '<p>商品名　'.$row['item_name'].'</p>
                <img src="./image/noimage.jpg" class="">
                <p>価格　'.$row['item_price'].'</p>
                <form action="cart.php" method="POST">
                    <button name="incart" value="'.$row['item_id'].'">カートに入れる</button>
                </form>';
            } 
        ?>
        <form action="buyCheck.php" method="POST">
            <button onclick="location.href='buyCheck.php'" class="buy btn" type="submit" value="<?php echo$_GET['itemid'];?>" name="itembuy">今すぐ購入</button>
        </form>
    </body>
</html>