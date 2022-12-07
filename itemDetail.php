<?php 
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $cls->userSessionCheck();
    $searchArray = $cls->getItemsTblByItem_id($_GET['itemid']);
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="css/shosai.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>
    <body style="background:#e4edfc;">
    <nav class="navbar navbar-dark bg-dark mb-4" aria-label="First navbar example">
            <div class="container-fluid">
              <a class="navbar-brand" href="#"><img src="image/logo_touka2.png" style="width:200px; height: 40px;"></a>
              <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
        
              <div class="navbar-collapse collapse" id="navbarsExample01">
                <ul class="navbar-nav me-auto mb-2">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="item.php">ホーム</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="cart.php">カート</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="loginPage.php">ログアウト</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
        <div class="center">
        <?php
            foreach($searchArray as $row){
                echo    '<p>商品名　'.$row['item_name'].'</p>
                <img src="./image/'.$row['item_id'].'.jpg" class="" width="300" height="300">
                <p>価格　'.$row['item_price'].'</p>
                <form action="cart.php" method="POST">
                    <button name="incart" value="'.$row['item_id'].'">カートに入れる</button>
                </form>';
            } 
        ?>
        <form action="buyCheck.php" method="POST">
            <button onclick="location.href='buyCheck.php'" class="buy btn" type="submit" value="<?php echo $_GET['itemid'];?>" name="itembuy">今すぐ購入</button>
        </form>
        <button type="button" onclick="location.href='item.php'" class="btn" id="back-btn">商品一覧へ戻る</button>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>