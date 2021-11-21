<?php
	require_once "controllers/base_controller.php";
	require_once "models/product.php";
	require_once "models/category.php";
	require_once "models/contact.php";
	require_once "models/order.php";
	require_once "models/customer.php";
	class homeController extends BaseController
	{
		public function __construct(){
			$this->folder="home";
		}

		public function index(){
			$this->render("index");
		}

		public function success(){
			$this->render("success");
		}
		public function logout(){
			session_start();
			unset($_SESSION['user']);
			unset($_SESSION['cart']);
			header("location: ./index.php");
		}

		public function paybill(){
			session_start();
			$date = date("Y/m/d");
			$userid = $_SESSION["user"]["id"];
			foreach ($_SESSION["cart"] as $key => $value) {
				$masp = $value["id"];
				$soluong = $value["soluong"];
				$total = $value["price"]*$value["soluong"];
				$themdon = Order::add($masp,$userid,$soluong,$total,$date);
				unset($_SESSION["cart"][$masp]);
				setcookie("user",serialize($_SESSION['cart']),time()+3600);
			}
			header("location:index.php?controller=home&action=success");
		}

		public function contact(){
			
			$this->render("contact");
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
			header("location:index.php?controller=home&action=cart");
			}
		}

		public function deletecartitem(){
			session_start();
			$id=$_GET["id"];
			unset($_SESSION["cart"][$id]);
			setcookie("user",serialize($_SESSION['cart']),time()+3600);
			header("location:index.php?controller=home&action=cart");
		}

		public function cart(){
			$sanpham = Product::getAll();
			session_start();
			if(isset($_COOKIE['user'])){
				$_SESSION['cart'] = (array)unserialize($_COOKIE['user']);
			}
			if(isset($_POST["id"]) && isset($_POST["soluong"])){
				$id = $_POST["id"];
				$soluong = $_POST["soluong"];
				$sanpham2 = Product::getDetailById($id);
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
			$sp=Product::getAll();
			$data=array("Product"=>$sp);
			$this->render("cart",$data);
		}
	}

?>