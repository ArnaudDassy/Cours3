<?php
namespace Controllers;
class Posts extends Base
{
	private $postsModel = null;
	public function __construct(){
		$this->postsModel = new \Models\Posts();
	}
	public function index(){
		
		$data=[];
		$data['data'] = $this->postsModel->getPosts();
		$data['categories'] = $this->postsModel->getCategories();
		$data['view'] ='default.php';
		if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
			$data['connected'] = 'formConnected.php';
		}
		else{
			$data['connected'] = 'formNotConnected.php';
		}
		return $data;
	}
	public function view(){
		if ($_SERVER['REQUEST_METHOD'] != 'GET') {
			die('pas du get');
		}

		else{
			
			if(!isset($_GET['id'])){
				die('pas d\'id pour ce post');
			}
			if (!is_numeric($_GET['id'])) {
				die('l\'id n\'est pas un nombre');
			}
			$id=$_GET['id'];
			$data=[];
			$data['data'] = $this->postsModel->getPost($id);
			$data['categories'] = $this->postsModel->getCategories();
			$data['view'] ='view_posts.php';
			if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
			$data['connected'] = 'formConnected.php';
			}
			else{
				$data['connected'] = 'formNotConnected.php';
			}
			return $data;
		}
	}
	public function update(){

		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$id=$_GET['id'];
			$data=[];
			$data['data'] = $this->postsModel->getPost($id);
			$data['categories'] = $this->postsModel->getCategories();
			$data['view'] ='update_posts.php';
			if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
			$data['connected'] = 'formConnected.php';
			}
			else{
			$data['connected'] = 'formNotConnected.php';
			}
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors= [];
			if (empty($_POST['signature'])) {
				$errors['signature'] = true;
			}
			if (empty($_POST['body'])) {
				$errors['body'] = true;
			}
			if($_POST['newCategory'] != ''){
				$this->postsModel->createCategory($_POST['newCategory']);
				$this->postsModel->modifyMessage($_POST['signature'],$_POST['body'],$_POST['id'], $_POST['newCategory']);
				header('Location: http://localhost/Cours3/index.php');
			}
			elseif(count($errors) === 0){	
				$this->postsModel->modifyMessage($_POST['signature'],$_POST['body'],$_POST['id'], $_POST['category']);
				header('Location: http://localhost/Cours3/index.php');
			}
		}

	}
	public function create(){
		
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$data=[];
			$data['categories'] = $this->postsModel->getCategories();
			$data['view'] ='create_posts.php';
			if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
					$data['connected'] = 'formConnected.php';
			}
			else{
				$data['connected'] = 'formNotConnected.php';
			}
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$errors= [];
			if (empty($_POST['signature'])) {
				$errors['signature'] = true;
			}
			if (empty($_POST['body'])) {
				$errors['body'] = true;
			}
			if($_POST['newCategory'] != ''){
				$this->postsModel->createCategory($_POST['newCategory']);
				$this->postsModel->createMessage($_POST['signature'],$_POST['body'], $_POST['newCategory']);
				header('Location: http://localhost/Cours3/index.php');
			}
			elseif(count($errors) === 0){	
				$this->postsModel->createMessage($_POST['signature'],$_POST['body'], $_POST['category']);
				header('Location: http://localhost/Cours3/index.php');
			}
		}
	}
	public function delete(){
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			$id=$_GET['id'];
			$data=[];
			$data['data'] = $this->postsModel->getPost($id);
			$data['categories'] = $this->postsModel->getCategories();
			$data['view'] ='delete_posts.php';
			if(isset($_SESSION['connected']) || isset($_COOKIE['connected'])){
					$data['connected'] = 'formConnected.php';
			}
			else{
				$data['connected'] = 'formNotConnected.php';
			}
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id=$_POST['id'];
			$this->postsModel->deleteMessage($id);
			header('Location: http://localhost/Cours3/index.php');
		}
	}
}