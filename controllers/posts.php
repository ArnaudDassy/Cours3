<?php

class C_Posts {
	public function index(){
		die('je suis dans index');
	}
	public function view(){
		if ($_SERVER['REQUEST_METHOD'] != 'GET') {
			die('pas du get');
		}

		else{
			include('./models/posts.php');
			
			if(!isset($_GET['id'])){
				die('pas d\'id pour ce post');
			}
			if (!is_numeric($_GET['id'])) {
				die('l\'id n\'est pas un nombre');
			}
			$id=$_GET['id'];
			return getPost($id);
		}
	}
	public function update(){

		if(!isset($_REQUEST['id'])){
			die('pas d\'id');
		}
		$id=$_REQUEST['id'];
		if ($_SERVER['REQUEST_METHOD'] ==='POST') {

		}
		else{
			include('./models/posts.php');
			$post=getPost($id);
		}
	}
}