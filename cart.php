<?php
    session_start();
    require_once 'DBmanager.php';
    $cls = new DBManager();
    $cls->userSessionCheck();
    $user_id = $_SESSION['user_id'];
    $cart = $cls->getCartTblByUserid($user_id);
    $cntitem = 0;
    $sumprice = 0;
    if(isset($_POST['incart'])){
        $cls->InsertCartTbl($_POST['incart'],$user_id);
        header('Location: ./cart.php');
        exit();
    }
    foreach($cart as $row){
        $id = $row['cart_id'];
        if(isset($_POST["$id"])){
            $cls->DeleteCartTblByCartid($id);
            header('Location: ./cart.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
<link href="https://fonts.googleapis.com/css?family=M+PLUS+Rounded+1c" rel="stylesheet">
        <link href="css/cart.css" rel="stylesheet" type="text/css" />  
        <title>カート</title>
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
                    <a class="nav-link active" href="cart.php">買い物かご</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" href="loginPage.php">ログアウト</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    <div class="cart">
      <h1>買い物かご</h1>
      <ul class="list_design027">
    <?php
        
        if(isset($cart)){
            $_SESSION['cart'] = $cart;
            foreach($cart as $row){
                $id = $row['cart_id'];
                $cart_item = $cls->getItemsTblByItem_id($row['item_id']);
                foreach($cart_item as $data){
                    echo '<li><img class="image" src="./image/'.$data['item_id'].'.jpg" width="300" height="300"><span>'.$data['item_name'].'　'.$data['item_price'].'円 <form action="" method="POST"><input type="submit" class="deletebtn" value="カートから削除" name="'.$id.'"></form></span></li>';
                    $cntitem++;
                    $sumprice += $data['item_price'];
                }
            }
        }else{
            echo "<h1>カートに商品がありません</h1>";
        }
    
        echo '</ul><p>商品数　　'.$cntitem.'点</p>
        <p>合計金額　　'.$sumprice.'円</p>
        <form action="buyCheck.php" method="GET">
            <a class="btn" id="kounyu-btn" href="buyCheck.php?cntitem='.$cntitem.'&sumprice='.$sumprice.'">購入</a><br>
        </form>';
        ?>     
        <button class="btn" id="back-btn" onclick="location.href='item.php'">商品一覧に戻る</button>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>