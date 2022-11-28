<?php
 
//セッションを使う
session_start();

// 変数の初期化
$email = '';
$password = '';
$err_msg = array();

require_once 'DBmanager.php';
$cls = new DBManager();
$searchArray = $cls->getUsersTblById($_POST['email']);


  $err_msg['email'] = '';
  $err_msg['password'] = '';
 
// POST送信があるかないか判定
if (!empty($_POST)) {
  // 各データを変数に格納
  $email = $_POST['email'];
  $password = $_POST['password'];
 
  // eメールアドレスバリデーションチェック
  // 空白チェック
  if ($email == '') {
    $err_msg['email'] = '入力必須です';
  }
  // 文字数チェック
  if (strlen($email) != 7 ) {
    $err_msg['email'] = '7桁で入力してください';
  }
  // パスワードバリデーションチェック
  // 空白チェック
  if ($password == '') {
    $err_msg['password'] = '入力してください';
  }
  // 文字数チェック
  if (strlen($password) > 255 || strlen($password) < 5) {
    $err_msg['password'] = '６文字以上２５５文字以内で入力してください';
  }
  // 形式チェック
  if (!preg_match("/^[a-zA-Z0-9]+$/", $password)) {
    $err_msg['password'] = '半角英数字で入力してください';
  }
  if($err_msg['email'] == "" && $err_msg['password'] == "" ){
    foreach($searchArray as $row){
      if($_POST['email'] == $row['user_id']){
        $data = $row['user_password'];
      }
    }
    if($data == $password){
      //セッションにemailアドレスを挿入する
      $_SESSION['email'] = $email;
      //マイページへ遷移
      header('Location:item.php');
      exit;
    }else{
      $err_msg['email'] = 'eメールアドレスまたはパスワードが違います';
    }
    }
}

 
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="login.css" rel="stylesheet" type="text/css" />
        <title>ログイン画面</title>
    </head>
    <body>
        <form class="form-erea" method="POST" action="">
            メールアドレス・会員ID<br>
            <div class="err_msg"><?php echo $err_msg['email']; ?></div>
            <input type="text" class="forms" name="email"><br><br>
            パスワード<br>
            <div class="err_msg"><?php echo $err_msg['password']; ?></div>
            <input type="password" class="forms" name="password"><br>
            <input type="submit" class="loginbtn" value="ログイン">
        </form>
        <script src="./css/login.css"></script>
    </body>
</html>