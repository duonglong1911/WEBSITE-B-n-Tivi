<?php
	require_once "controllers/base_controller.php";
	require_once "models/product.php";
	require_once "models/category.php";
	require_once "models/customer.php";
	class CustomersController extends BaseController
	{
		public function __construct(){
			$this->folder="customer";
		}

		public function manage(){
			$this->render("manage");
		}

		public function login(){
			$this->render("login");
		}

		public function register(){
			$this->render("register");
		}
		}

		

?>