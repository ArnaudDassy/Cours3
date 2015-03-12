<?php
namespace Controllers;
class Base{
	private $postsModel = null;
	public function __construct(){
		$this->postsModel = new \Models\Posts();
	}
}