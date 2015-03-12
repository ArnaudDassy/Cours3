<?php 
namespace Models;
class Users extends Model{
	public function getUser($email,$password){
		$sql='SELECT * FROM users WHERE email=:email AND password=:password';
		$pdost = $this->connexion->prepare($sql);
		$pdost->execute([':email' => $email, 'password' => $password]);
		return $pdost->fetch();
	}
	public function createUser($email,$password){
		$sql='INSERT INTO users (email,password) VALUES (:email,:password)';
		try{
			$pdost = $this->connexion->prepare($sql);
			$pdost->execute([':email' => $email, 'password' => $password]);
			return true;
		}
		catch(PDOException $e){
			return false;
		}
	}
}