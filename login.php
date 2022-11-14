<?php
$pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8','webuser', 'abccsd2');
		$sql = "SELECT * FROM users_tbl WHERE user_id = ?";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$_POST['???id'],PDO::PARAM_STR);
		$ps->execute();

        $userdata = $ps->fetchAll();
foreach($userdata as $row){
    if($_POST['???pass'] == true){
        echo 'ログイン成功！ようこそシラハマーズさん';
    } else {
        echo 'パスワードが一致しません';
    }
}