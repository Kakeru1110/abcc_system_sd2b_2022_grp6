<?php 
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $cls->userSessionCheck();
    $iteminfo = $cls -> getItemsTbl();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>商品一覧</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
        <link href="css/shohin.css" rel="stylesheet" type="text/css" />
    <body>
    <nav class="navbar navbar-dark bg-dark mb-4" aria-label="First navbar example">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img class="logoimg" src="image/logo_touka2.png"></a>
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="navbar-collapse collapse" id="navbarsExample01">
                <ul class="navbar-nav me-auto mb-2">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="item.php">ホーム</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="cart.php">買い物かご</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="loginPage.php">ログアウト</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        <div class="container">
        <div class="search-bar">
        <form action="" method="POST" id="form1">
            <input class="search-box" style="height: 40px;" type="text" placeholder="🔍キーワード検索" name="keyword" id="sbox">
            <input type="submit" value="検索" name="keysearch" id="sbtn"><br>
            </form>
            <form action="" method="POST">
            <input type="submit" value="すべて" class="button" name="allitem">
            <input type="submit" value="洗濯機" class="button" name="sentakuki">
            <input type="submit" value="冷蔵庫" class="button" name="reizouko">
            <input type="submit" value="電子レンジ" class="button" name="dennsirenzi">
            <input type="submit" value="扇風機" class="button" name="sennpuuki">
            <input type="submit" value="掃除機" class="button" name="souziki"><br>
            </form>
        </div>
        <div id="column" class="column03">
            <form action="itemDetail.php" method="GET">
		 <div class="row">
            <ul class="img-parent">
                <?php 
                    if(isset($_POST['keysearch'])){
                        $iteminfo = $cls->getItemsTblByKeyword($_POST['keyword']);      
                        foreach($iteminfo as $row){
                            echo '<div class="col-lg-4 col-md-6"><li class="img-list img-fluid"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/'.$row['item_id'].'.jpg" width="300" height="300"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li></div>';
                        }
                    }else if(isset($_POST['sentakuki'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(1);
                        foreach($iteminfo as $row){
                            echo '<div class="col-lg-4 col-md-6"><li class="img-list img-fluid"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/'.$row['item_id'].'.jpg" width="300" height="300"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li></div>';
                        }
                    }else if(isset($_POST['reizouko'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(2);
                        foreach($iteminfo as $row){
                            echo '<div class="col-lg-4 col-md-6"><li class="img-list img-fluid"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/'.$row['item_id'].'.jpg" width="300" height="300"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li></div>';
                        }
                    }else if(isset($_POST['dennsirenzi'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(3);
                        foreach($iteminfo as $row){
                            echo '<div class="col-lg-4 col-md-6"><li class="img-list img-fluid"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/'.$row['item_id'].'.jpg" width="300" height="300"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li></div>';
                        }
                    }else if(isset($_POST['sennpuuki'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(4);
                        foreach($iteminfo as $row){
                            echo '<div class="col-lg-4 col-md-6"><li class="img-list img-fluid"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/'.$row['item_id'].'.jpg" width="300" height="300"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li></div>';
                        }
                    }else if(isset($_POST['souziki'])){
                        $iteminfo = $cls->getItemsTblByCategory_id(5);
                        foreach($iteminfo as $row){
                            echo '<div class="col-lg-4 col-md-6"><li class="img-list img-fluid"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/'.$row['item_id'].'.jpg" width="300" height="300"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li></div>';
                        }
                    }else{
                        foreach($iteminfo as $row){
                            echo '<div class="col-lg-4 col-md-6"><li class="img-list img-fluid"><a href="itemDetail.php?itemid='.$row['item_id'].'"><img class="image" src="./image/'.$row['item_id'].'.jpg" width="300" height="300"><p>'.$row['item_name'].'</p><span>'.$row['item_price'].'円</span></a></li></div>';
                        }
                    }
                ?>
            </ul>
	    </div>
            </form>
            </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>