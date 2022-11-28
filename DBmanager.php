<?php
class DBManager {
	//接続のメソッド
	private function dbConnect(){
		$pdo = new PDO('mysql:host=mysql208.phy.lolipop.lan;dbname=LAA1417860-grp6;charset=utf8',
							'LAA1417860', 'Kakeru1011');
		return $pdo;
	}

public function DBtouroku($userID, $userpass){
		$pdo = $this->dbConnect();

		$sql = "INSERT INTO user_tbl(userID,userpass)VALUES(?,?)";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$_POST['userID'],PDO::PARAM_STR);
		$ps->bindValue(2,$_POST['userpass'],PDO::PARAM_STR);
		$ps->execute();

	}

	public function getUsersTblById($getid){
		$pdo = $this->dbConnect();
	
		$sql = "SELECT * FROM users WHERE user_id = ?";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$getid,PDO::PARAM_INT);
		$ps->execute();
	
		$searchArray = $ps->fetchAll();
		return $searchArray;
	}

	public function getItemsTblByCategory_id($getcategoryid){
		$pdo = $this->dbConnect();
	
		$sql = "SELECT * FROM items WHERE category_id = ?";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$getcategoryid,PDO::PARAM_INT);
		$ps->execute();
	
		$searchArray = $ps->fetchAll();
		return $searchArray;
	}

	public function getItemsTblByItem_id($getitem_id){
		$pdo = $this->dbConnect();
	
		$sql = "SELECT * FROM items WHERE item_id = ?";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,$getitemid,PDO::PARAM_INT);
		$ps->execute();
	
		$searchArray = $ps->fetchAll();
		return $searchArray;
	}

	public function getItemTblByKeyword($getkeyword){
		$pdo = $this->dbConnect();
	
		$sql = "SELECT * FROM items WHERE item_name LIKE ?";
		$ps = $pdo->prepare($sql);
		$ps->bindValue(1,'%'.$getkeyword.'%',PDO::PARAM_INT);
		$ps->execute();
	
		$searchArray = $ps->fetchAll();
		return $searchArray;
	}

	public function InsertCartTbl($getitemid,$getuserid){

	}

	public function UpdateCartTbl($getitemid){

	}
}