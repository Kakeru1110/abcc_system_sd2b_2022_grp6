<?php 
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $iteminfo = $cls -> getItemsTbl();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>商品一覧</title>
        <link href="css/shohin.css" rel="stylesheet" type="text/css" />
    <body>
        <header>
        <div class="search-bar">
            <form action="" method="POST" id="form1">
            <input class="search-box" type="text" placeholder="🔍キーワード検索" name="keyword" id="sbox">
            <input type="submit" value="検索" name="keysearch" id="sbtn"><br>
            </form>
            <form action="" method="POST">
            <input type="submit" value="すべて" class="button" name="allitem">
            <input type="submit" value="洗濯機" class="button" name="sentakuki">
            <input type="submit" value="掃除機" class="button" name="souziki">
            <input type="submit" value="冷蔵庫" class="button" name="reizouko">
            <input type="submit" value="テレビ" class="button" name="tv"><br>
            </form>
        </div>
        </header>
        <div id="column" class="column05">
            <form action="itemDetail.php" method="GET">
            <ul class="img-parent">
                <?php 
                    if(isset($_POST['keysearch'])){
                        $iteminfo = $cls->getItemsTblByKeyword($_POST['keyword']);
                        foreach($iteminfo as $row){
                            echo '<li class="img-list"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/noimage.jpg"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li>';
                        }
                    }else if(isset($_POST['sentakuki'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(1);
                        foreach($iteminfo as $row){
                            echo '<li class="img-list"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/noimage.jpg"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li>';
                        }
                    }else if(isset($_POST['souziki'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(2);
                        foreach($iteminfo as $row){
                            echo '<li class="img-list"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/noimage.jpg"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li>';
                        }
                    }else if(isset($_POST['reizouko'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(3);
                        foreach($iteminfo as $row){
                            echo '<li class="img-list"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/noimage.jpg"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li>';
                        }
                    }else if(isset($_POST['tv'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(4);
                        foreach($iteminfo as $row){
                            echo '<li class="img-list"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/noimage.jpg"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li>';
                        }
                    }else{
                        foreach($iteminfo as $row){
                            echo '<li class="img-list"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/noimage.jpg"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li>';
                        }
                    }
                ?>
            </ul>
            </form>
        </div>
        <div class="btn-parent">
            <button class="menu-btn" id="shohin-btn" onclick="location.href='item.php'"><img class="ico" src="./image/noimage.jpg"></button>
            <button class="menu-btn" id="cart-btn" onclick="location.href='cart.php'"><img class="ico" src="./image/noimage.jpg"></button>
        </div>
    </body>
</html>