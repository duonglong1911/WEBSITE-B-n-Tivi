<?php
	class Order{
		public static function add($masp,$makh,$soluong,$thanhtien,$ngaymua){
		    $db=DB::getConnection();
		    $sql="INSERT INTO donhang(masp,makh,soluong,thanhtien,ngaymua) VALUES ('".$masp."','".$makh."','".$soluong."','".$thanhtien."','".$ngaymua."') ";
		    $ktra=$db->prepare($sql);
		    if($ktra->execute()==true){
		        return true;
		    }
		    else
		    {
		        return false;
		    }
		}

		public static function getDonhangByMakh($makh){
			$a = DB::getConnection();
			$sql="SELECT * FROM donhang where makh = $makh ";
			$ktra = $a->prepare($sql);
			$ktra->execute();
			$arr=array();
			while($row=$ktra->fetch(PDO::FETCH_ASSOC))
			{
				$arr[]=$row;
			}
			return $arr;
		}
	}


?>