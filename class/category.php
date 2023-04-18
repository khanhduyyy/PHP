<?php
	class category
	{
		function getAll()
		{
			include("./connection.php");
			$sql="SELECT * FROM `category`";
			$result = $conn->query($sql);
			$category=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["CategoryID"];
				$category[$id]['CategoryID']=$row["CategoryID"];
				$category[$id]['Name']=$row["Name"];
				$category[$id]['Description']=$row["Description"];
			}
			return $category;
		}
		/*function add($cate)
		{
			include("../vegetable/connection.php");
			$sql=" INSERT INTO `category`(`CategoryID`, `Name`, `Description`) VALUES ('".$cate[0]."','".$cate[1]."','".$cate[2]."')";
			if(!$conn->query($sql))
			{
				echo $conn->error;	
			}
		}*/
		function countCategory()
		{
			include("../vegetable/connection.php");
			$sql="SELECT COUNT(CategoryID) as c FROM `category` WHERE 1";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc())
			{
				$count=$row["c"];
			}
			return $count;
		}
		function getIDCatebyName($name)
		{
			include("connection.php");
			$sql="SELECT CategoryID FROM `category` WHERE Name='".$name."'";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc())
			{
				$idCate=$row["CategoryID"];
			}
			return $idCate;
		}
	}
	/*$cate=new category;
	$c=$cate->getIDCatebyName('Spices');
	var_dump($c);*/
?>