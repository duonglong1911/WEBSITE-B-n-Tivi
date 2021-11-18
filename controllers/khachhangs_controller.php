<?php
	require_once "controllers/base_controller.php";
	require_once "models/sanpham.php";
	require_once "models/danhmuc.php";
	require_once "models/khachhang.php";
	class KhachhangsController extends BaseController
	{
		public function __construct(){
			$this->folder="khachhang";
		}

		public function quanly(){
			$this->render("quanly");
		}

		public function dangnhap(){
			$this->render("dangnhap");
		}

		public function dangky(){
			$this->render("dangky");
		}

		public function loginprocess(){
				
			}
		}

		

?>