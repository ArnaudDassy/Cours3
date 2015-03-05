<?php 
	function getMessages($dbConnection){
		$sql ='SELECT * FROM messages ORDER BY id DESC';
		$res=$dbConnection->query($sql);
		return $res->fetchAll();
	}
	function getCategories($dbConnection){
		$sql ='SELECT * FROM categories';
		$res=$dbConnection->query($sql);
		return $res->fetchAll();
	}
	function createMessage($dbConnexion,$signature,$body,$category){
		$sql = 'INSERT INTO messages (signature, body,id_cat_message) VALUES (:signature,:body,:id_cat_message)';
		$sqlIdCategory = "SELECT id_cat FROM categories WHERE name_cat='$category'";
		$resSqlIdCategory = $dbConnexion->query($sqlIdCategory);
		$resFetchSqlIdCategory = $resSqlIdCategory->fetch();
		try{
		$res = $dbConnexion->prepare($sql);
		$res->execute([':signature' => $signature, ':body' => $body,':id_cat_message' => $resFetchSqlIdCategory['id_cat']]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	function createCategory($dbConnexion,$name_cat){
		$sql = 'INSERT INTO categories (name_cat) VALUES (:name_cat)';
		try{
		$res = $dbConnexion->prepare($sql);
		$res->execute([':name_cat' => $name_cat]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}
	function getTheCategory($dbConnexion,$id_cat_message){
		$sql = "SELECT name_cat FROM categories INNER JOIN messages ON messages.id_cat_message=categories.id_cat WHERE id='$id_cat_message'";
		$res=$dbConnexion->query($sql);
		$resFetch= $res->fetch();
		return $resFetch['name_cat'];
	}
	function getMessagesParCat($dbConnexion,$category){
		$sql="SELECT * FROM `messages` INNER JOIN `categories` ON messages.id_cat_message=categories.id_cat WHERE name_cat='$category'";
		$res=$dbConnexion->query($sql);
		return $res->fetchAll();
	}
	function getModifiedMessage($dbConnexion,$id){
		$sql="SELECT * FROM messages WHERE id='$id'";
		$res=$dbConnexion->query($sql);
		return $res->fetch();
	}
	function modifyMessage($dbConnexion,$signature,$body,$id,$category){
		$sql = "UPDATE golden2.messages SET signature = :signature, body = :body,id_cat_message = :id_cat_message WHERE messages.id= :id";
		$sqlIdCategory = "SELECT id_cat FROM categories WHERE name_cat='$category'";
		$resSqlIdCategory = $dbConnexion->query($sqlIdCategory);
		$resFetchSqlIdCategory = $resSqlIdCategory->fetch();
		try{
			$res = $dbConnexion->prepare($sql);
			$res->execute([':signature' => $signature, ':body' => $body, ':id' => $id,':id_cat_message' => $resFetchSqlIdCategory['id_cat']]);
		}catch(PDOException $e){
			die($e->getMessage());
		}
	}