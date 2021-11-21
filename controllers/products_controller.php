<?php
	require_once "controllers/base_controller.php";
	require_once "models/product.php";
	require_once "models/category.php";
	require_once "models/customer.php";
	class ProductsController extends BaseController
	{
		public function __construct(){
			$this->folder="product";
		}

		public function list(){
			$this->render("list");
		}
		public function listtrademark(){
			$this->render("listtrademark");
		}
		public function allproduct(){
			$this->render("allproduct");
		}

		public function find(){
			if(isset($_POST["ok"])){
				$name = $_POST["name"];
				$product = Product::getFilterName($name);
			}
			$data=array("Product"=>$product);
			$this->render("find",$data);
		}

		public function detail(){
			$id=$_GET['id'];
        	$detail =Product::getDetailById($id);
        	$data =array("Product"=>$detail);
			$this->render("detail",$data);
		}
	}

?>