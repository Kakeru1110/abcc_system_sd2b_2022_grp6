<?php 
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $searchArray = $cls->getItemTblByItem_id($_POST['itemid']);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="login.css" rel="stylesheet" type="text/css" />
        <title>商品詳細画面</title>
    </head>
    <body>
        <form class="form-erea" method="POST" action="">
            <?php 
                echo $searchArray['item_name']."<br>";
                echo $searchArray['item_price']."<br>";
            ?>        
        </form>
        <script src="./login.css"></script>
    </body>
</html>