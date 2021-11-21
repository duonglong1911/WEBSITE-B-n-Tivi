<?php
require_once ("Database.php");
	class Contact{
		
	    public static function lienhesubmit($makh,$content){
	        $db=DB::getConnection();
	        $sql="INSERT INTO lienhe (makh,noidung) values('".$makh."','".$content."')";
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