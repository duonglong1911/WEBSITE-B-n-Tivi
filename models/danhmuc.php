<?php
require_once ("Database.php");
class Danhmuc
{
	// $conn = Database::getConnection();

	public static function getAll(){
		$db = DB::getConnection(); 
		$sql="SELECT * FROM danhmuc";
		$ktra = $db->prepare($sql);
		$ktra->execute();
		$arr=array();
		while($row=$ktra->fetch(PDO::FETCH_ASSOC))
		{
			$arr[]=$row;
		}
		return $arr;
	}


	public static function getDetailById($id){
        $db = DB::getConnection(); 
        $sql = "SELECT * FROM danhmuc WHERE madm = '".$id."'";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $arr= array();
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $arr[] = $row;
        }
        return $arr;
    }

   
}