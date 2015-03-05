<?php

class C_Categories extends C_Base
{
	private $postsModel = null;
	public function __construct(){
		$this->postsModel = new M_Posts();
	}
	public function index(){
		
		$data=[];
		$data['data'] = $this->postsModel->getPosts();
		$data['categories'] = $this->postsModel->getCategories();
		$data['view'] ='default.php';
		return $data;
	}
	public function view(){
		if($_GET['e'] == 'posts') {
				$id=$_GET['id'];
				$data=[];
				$data['data'] = $this->postsModel->getPost($id);
				$data['categories'] = $this->postsModel->getCategories();
				$data['view'] ='view_posts.php';
				return $data;
		}
		if ($_GET['e'] == 'categories') {
			$idCat=$_GET['id'];
			$data=[];
			$data['data'] = $this->postsModel->getMessagesParCat($idCat);
			$data['category'] = $this->postsModel->getTheCategory($idCat);
			$data['view'] ='view_categories.php';
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
			return $data;
		}
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$id=$_POST['id'];
			$this->postsModel->deleteMessage($id);
			header('Location: http://localhost/Cours3/index.php');
		}
	}
}