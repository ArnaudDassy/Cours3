<?php 

class Model{
	protected $connexion = null;


	public function __construct(){
		include('db.php');
		try{
			$this->connexion = new PDO(DSN,USERNAME,PASSWORD, $options);
			$this->connexion->query('SET CHARACTER SET UTF8');
			$this->connexion->query('SET NAMES UTF8');
		}catch(PDOException $error){
			die($error->getMessage());
		}
	}
}