<?php
	class Customer{
		public static function getKhachhangById($makh){
	        $db = DB::getConnection();    
	        $sql = "SELECT * FROM khachhang WHERE makh = '".$makh."' ";
	        $stmt = $db->prepare($sql);
	        $stmt->execute();
	        $arrDT = array();
	        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
	            $arrDT[] = $row;
	        }
	        return $arrDT;
	    }

	    
	    public static function dangnhap($tendangnhap,$matkhau){
	        $db=DB::getConnection();
	        $sql="SELECT * FROM khachhang WHERE tendangnhap = '".$tendangnhap."' AND matkhau = '".$matkhau."' ";
	       	$stmt = $db->prepare($sql);
			$stmt->execute();
			$arr= array();
			while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
				$arr[] = $row;
			}
			return $arr;
	    }

	    public static function dangky($tendangnhap,$tenkh,$matkhau,$dienthoai,$diachi,$email){
	        $db=DB::getConnection();
	        $sql="INSERT INTO khachhang (tendangnhap,tenkh,matkhau,dienthoai,diachi,email) values('".$tendangnhap."','".$tenkh."','".$matkhau."','".$dienthoai."','".$diachi."','".$email."')";
	        $ktra= $db->prepare($sql);
	        if($ktra->execute()==true)
	        {
	            return true;
	        }else{
	            return false;
	        }
	    }

	    public static function lienhesubmit($makh,$content){
	        $db=DB::getConnection();
	        $sql="INSERT INTO lienhe (makh,noidung) values($makh,$content)";
	        $ktra= $db->prepare($sql);
	        if($ktra->execute()==true)
	        {
	            return true;
	        }else{
	            return false;
	        }
	    }
	}


?>