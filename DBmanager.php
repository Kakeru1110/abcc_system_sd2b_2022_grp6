<?php
class DBManager {
	//接続のメソッド
	private function dbConnect(){
		$pdo = new PDO('mysql:host=localhost;dbname=webdb;charset=utf8',
							'webuser', 'abccsd2');
		return $pdo;
	}

public function DBtouroku($userID, $userpass){
		$pdo = $this->dbConnect();

		$sql = "INSERT INTO user_tbl("仮")(userID,userpass)VALUES(?,?)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$_POST['userID'],PDO::PARAM_STR);
		$ps->bindValue(2,$_POST['userpass'],PDO::PARAM_STR);
		$ps->execute();

	}
}

public function getUsersTblById($getid){
	$pdo = $this->dbConnect();

	$sql = "SELECT * FROM users WHERE user_id = ?";
	$ps = $pdo->prepare($sql);
	$ps->bindValue(1,$getid,PDO::PARAM_INT);
	$ps->execute();

	$searchArray = $ps->fetchAll();
	return $searchArray;
};

public function 