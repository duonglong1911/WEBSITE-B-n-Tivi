<?php
	require_once "controllers/base_controller.php";
	require_once "models/sanpham.php";
	require_once "models/danhmuc.php";
	require_once "models/lienhe.php";
	require_once "models/donhang.php";
	require_once "models/khachhang.php";
	class homeController extends BaseController
	{
		public function __construct(){
			$this->folder="home";
		}

		public function index(){
			$this->render("index");
		}

		public function hoanthanh(){
			$this->render("hoanthanh");
		}
		public function dangxuat(){
			session_start();
			unset($_SESSION['user']);
			header("location: ./index.php");
		}

		public function thanhtoan(){
			session_start();
			$date = date("Y/m/d");
			$userid = $_SESSION["user"]["id"];
			foreach ($_SESSION["cart"] as $key => $value) {
				$masp = $value["id"];
				$soluong = $value["soluong"];
				$total = $value["price"]*$value["soluong"];
				$themdon = donhang::add($masp,$userid,$soluong,$total,$date);
				unset($_SESSION["cart"][$masp]);
				setcookie("user",serialize($_SESSION['cart']),time()+3600);
			}
			header("location:index.php?controller=home&action=hoanthanh");
		}

		public function lienhe(){
			
			$this->render("lienhe");
		}

		public function updatecart(){
		session_start();
		if(isset($_POST["id"]) && isset($_POST["soluong"])){
			$id = $_POST["id"];
			$soluong = $_POST["soluong"];
			$cart = $_SESSION["cart"];
			if(array_key_exists($id, $cart)){
						$cart[$id] = array(
						'id' => $id,
						'name' => $cart[$id]["name"],
						'price' => $cart[$id]["price"],
						'img' => $cart[$id]["img"],
						'giamgia' => $cart[$id]["giamgia"],
						'soluong' => $soluong
				);
			}
			$_SESSION["cart"] = $cart;
			// print_r($_SESSION["cart"]);
			setcookie("user",serialize($_SESSION['cart']),time()+3600);
			header("location:index.php?controller=home&action=giohang");
			}
		}

		public function deletecartitem(){
			session_start();
			$id=$_GET["id"];
			unset($_SESSION["cart"][$id]);
			setcookie("user",serialize($_SESSION['cart']),time()+3600);
			header("location:index.php?controller=home&action=giohang");
		}

		public function giohang(){
			$sanpham = sanpham::getAll();
			session_start();
			if(isset($_COOKIE['user'])){
				$_SESSION['cart'] = (array)unserialize($_COOKIE['user']);
			}
			if(isset($_POST["id"]) && isset($_POST["soluong"])){
				$id = $_POST["id"];
				$soluong = $_POST["soluong"];
				$sanpham2 = sanpham::getDetailById($id);
				foreach ($sanpham2 as $key => $sanpham) {
					
				}
				if(!isset($_SESSION["cart"])){
					$cart = array();
					$cart[$id] = array(
							'id' => $id,
							'name' => $sanpham["tensp"],
							'sale' => $sanpham["giamgia"],
							'price' => $sanpham["giasp"]-($sanpham["giasp"]*$sanpham["giamgia"]/100),
							'img' => $sanpham["anhsp"],
							'soluong' => $soluong
					);
				}else{
					$cart = $_SESSION["cart"];
					if(array_key_exists($id, $cart)){
						if($size!=$cart[$id]['size']){
							$cart[$id] = array(
									'id' => $id,
									'name' => $sanpham["tensp"],
									'sale' => $sanpham["giamgia"],
									'price' => $sanpham["giasp"]-($sanpham["giasp"]*$sanpham["giamgia"]/100),
									'img' => $sanpham["anhsp"],
									'soluong' => $soluong
							);
						}else{
							$cart[$id] = array(
									'id' => $id,
									'name' => $sanpham["tensp"],
									'sale' => $sanpham["giamgia"],
									'price' => $sanpham["giasp"]-($sanpham["giasp"]*$sanpham["giamgia"]/100),
									'img' => $sanpham["anhsp"],
									
								
								'soluong' => (int)$cart[$id]['soluong']+=$soluong
							);
						}
					}else{
						$cart[$id] = array(
									'id' => $id,
									'name' => $sanpham["tensp"],
									'sale' => $sanpham["giamgia"],
									'price' => $sanpham["giasp"]-($sanpham["giasp"]*$sanpham["giamgia"]/100),
									'img' => $sanpham["anhsp"],
									'soluong' => $soluong
						);
					}
				}
				$_SESSION["cart"] = $cart;
				setcookie("user",serialize($_SESSION['cart']),time()+3600);
			}
			$sp=Sanpham::getAll();
			$data=array("Sanpham"=>$sp);
			$this->render("giohang",$data);
		}
	}

?>