<?php
	require_once "controllers/base_controller.php";
	require_once "models/sanpham.php";
	require_once "models/danhmuc.php";
	require_once "models/khachhang.php";
	class SanphamsController extends BaseController
	{
		public function __construct(){
			$this->folder="sanpham";
		}

		public function danhsach(){
			$this->render("danhsach");
		}
		public function danhsachtheohang(){
			$this->render("danhsachtheohang");
		}
		public function tatcasanpham(){
			$this->render("tatcasanpham");
		}

		public function timkiem(){
			if(isset($_POST["ok"])){
				$name = $_POST["name"];
				$sanpham = sanpham::getFilterName($name);
			}
			$data=array("Sanpham"=>$sanpham);
			$this->render("timkiem",$data);
		}

		public function chitiet(){
			$id=$_GET['id'];
        	$chitiet =sanpham::getDetailById($id);
        	$data =array("Sanpham"=>$chitiet);
			$this->render("chitiet",$data);
		}
	}

?>