<?php
	$controllers=array(
			"home"=>["index","contact","cart","error","deletecartitem","updatecart","paybill","success","logout"],
			"products"=>["list","detail","find","listtrademark","allproduct"],
			"customers"=>["login","register","manage","loginprocess"]
		);

	if(!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller]))
	{
		$controller ='home';
		$action= 'index';
	}

	//gọi tới file tương ứng với tên controller trong thư mục controllers đồng thời quy định cacsh đặt tên cho file
	include_once ('controllers/'. $controller.'_controller.php');
	//tiến hành thay thế kí tự gạch dưới= không có gì để quy định đặt tên cho lớp của controller đang truy cập
	$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
	$controller = new $klass();
	$controller->$action();
?>

