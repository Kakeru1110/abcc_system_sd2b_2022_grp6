<?php
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $user_id = $_SESSION['user_id'];
    $cart = $cls->getCartTblByUserid($user_id);
    $cntitem = 0;
    $sumprice = 0;
    if(isset($_POST['incart'])){
        $cls->InsertCartTbl($_POST['incart'],$user_id);
        header('Location: ./cart.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="css/cart.css" rel="stylesheet" type="text/css" />
        <title>カート</title>
    </head>
    <body>
    <?php
        
        if(isset($cart)){
            $_SESSION['cart'] = $cart;
            foreach($cart as $row){
                $cart_item = $cls->getItemsTblByItem_id($row['item_id']);
                foreach($cart_item as $data){
                    echo $data['item_name'].$data['item_price']."<br>";
                    $cntitem++;
                    $sumprice += $data['item_price'];
                }
            }
        }else{
            echo "<h1>カートに商品がありません</h1>";
        }
    
        echo '<p>商品数　　'.$cntitem.'点</p>
        <p>合計金額　　'.$sumprice.'円</p>
        <form action="buyCheck.php" method="GET">
            <a class="btn" id="kounyu-btn" href="buyCheck.php?cntitem='.$cntitem.'&sumprice='.$sumprice.'">購入</a><br>
        </form>';
        ?>     
        <button class="btn" id="back-btn">商品一覧に戻る</button>
    </body>
</html>