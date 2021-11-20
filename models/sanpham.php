<?php
	class sanpham{
		public static function getSanPhamByDanhMucId($madm){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham WHERE madm = '".$madm."'";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }
		public static function getSanPhamByTrademarkId($mahangsx){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham WHERE mahangsx = '".$mahangsx."'";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    public static function getRelated($madm){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham WHERE madm = '".$madm."' LIMIT 4 ";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    public static function getAll(){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    public static function getFilterAll($ten,$madm){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham where tensp like %'".$ten."'% AND madm ='".$madm."'";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    public static function getFilterName($ten){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham where tensp like '%".$ten."%'";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    public static function getFilterMadm($madm){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham where madm ='".$madm."'";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    public static function getDetailById($id){
	        $db = DB::getConnection(); 
	        $sql = "SELECT * FROM sanpham WHERE masp = '".$id."' ";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arr= array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arr[] = $row;
	        }
	        return $arr;
	    }

	    public static function getSanPhamRandom(){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 8";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    public static function getSanPhamGiamgiaTop4(){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM sanpham ORDER BY giamgia DESC LIMIT 8";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }
		public static function getSanPhamMoi(){
	        $db = DB::getConnection();
	        $sql = "SELECT * FROM sanpham WHERE madm = 'new' ORDER BY madm DESC LIMIT 8 ";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }
		public static function getSanPhamHot(){
	        $db = DB::getConnection();
	        $sql = "SELECT * FROM sanpham WHERE madm = 'hot' ORDER BY madm DESC LIMIT 8 ";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }
	  
	}


?>