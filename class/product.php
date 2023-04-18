<?php  
	class product
	{
		public function getAll()
		{
			include("connection.php");
			$sql="SELECT * FROM `product`";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["ProductID"];
				$Product[$id]['ProductID']=$row["ProductID"];
				$Product[$id]['CategoryID']=$row["CategoryID"];
				$Product[$id]['InventoryID']=$row["InventoryID"];
				$Product[$id]['ProductName']=$row["ProductName"];
				$Product[$id]['Amount']=$row["Amount"];
				$Product[$id]['Image']=$row["Image"];
				$Product[$id]['Price']=$row["Price"];
			}
			return $Product;
		}
		public function getListByCateID($cateid)
		{
			include("connection.php");
			$sql="SELECT * FROM `Product` Where CategoryID=".$cateid."";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["ProductID"];
				$Product[$id]['ProductID']=$row["ProductID"];
				$Product[$id]['CategoryID']=$row["CategoryID"];
				$Product[$id]['InventoryID']=$row["InventoryID"];
				$Product[$id]['ProductName']=$row["ProductName"];
				$Product[$id]['Amount']=$row["Amount"];
				$Product[$id]['Image']=$row["Image"];
				$Product[$id]['Price']=$row["Price"];
			}
			return $Product;
		}
		public function get3ProductsListByCateID($cateid)
		{
			include("connection.php");
			$sql="SELECT * FROM `Product` Where CategoryID=".$cateid." Limit 0,3";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["ProductID"];
				$Product[$id]['ProductID']=$row["ProductID"];
				$Product[$id]['CategoryID']=$row["CategoryID"];
				$Product[$id]['InventoryID']=$row["InventoryID"];
				$Product[$id]['ProductName']=$row["ProductName"];
				$Product[$id]['Amount']=$row["Amount"];
				$Product[$id]['Image']=$row["Image"];
				$Product[$id]['Price']=$row["Price"];
			}
			return $Product;
		}
		public function getProductBySearch($name)
		{
			include("connection.php");
			$sql="SELECT * FROM `Product` Where ProductName like '%".$name."%'";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["ProductID"];
				$Product[$id]['ProductID']=$row["ProductID"];
				$Product[$id]['CategoryID']=$row["CategoryID"];
				$Product[$id]['InventoryID']=$row["InventoryID"];
				$Product[$id]['ProductName']=$row["ProductName"];
				$Product[$id]['Amount']=$row["Amount"];
				$Product[$id]['Image']=$row["Image"];
				$Product[$id]['Price']=$row["Price"];
			}
			return $Product;
		}

		public function stacticalProductByCategory ($cate)
		{
			include("connection.php");
			$sql="SELECT sum(orderdetail.Quantity) as s FROM orderdetail,product WHERE product.CategoryID=".$cate." and product.ProductID=orderdetail.ProductID";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$s=$row["s"];
			}
			return $s;
		}
		public function stacticalMoneyByMonth($m)
		{
			include("connection.php");
			$sql="SELECT SUM(orderdetail.Price) as s FROM orderdetail,orders WHERE orderdetail.OrderID=orders.OrderID and orders.Date BETWEEN '2021-".$m."-01' AND '2021-".$m."-31'";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$s=$row["s"];
			}
			return $s;
		}
		/*public function getListByCateIDs($cateids)
		{
			include("../Product/connection.php");
			$sql="SELECT * FROM `Product` Where ";
			foreach ($cateids as $id) {
				$sql.="CategoryID=".$id." OR ";
			}
			$sql.="0";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["ProductID"];
				$Product[$id]['ProductID']=$row["ProductID"];
				$Product[$id]['CategoryID']=$row["CategoryID"];
				$Product[$id]['ProductName']=$row["ProductName"];
				$Product[$id]['Unit']=$row["Unit"];
				$Product[$id]['Amount']=$row["Amount"];
				$Product[$id]['Image']=$row["Image"];
				$Product[$id]['Price']=$row["Price"];
			}
			return $Product;
		}*/
		public function getByID($ProductID)
		{
			include("connection.php");
			$sql="SELECT * FROM `Product` Where ProductID=".$ProductID."";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["ProductID"];
				$Product[$id]['ProductID']=$row["ProductID"];
				$Product[$id]['CategoryID']=$row["CategoryID"];
				$Product[$id]['InventoryID']=$row["InventoryID"];
				$Product[$id]['ProductName']=$row["ProductName"];
				$Product[$id]['Amount']=$row["Amount"];
				$Product[$id]['Image']=$row["Image"];
				$Product[$id]['Price']=$row["Price"];
			}
			return $Product;
		}
		public function countProduct()
		{
			include("connection.php");
			$sql="SELECT count(ProductID) as c FROM `Product` Where 1";
			$result = $conn->query($sql);
			$Product=array();
			while ($row = $result->fetch_assoc())
			{
				$count=$row['c'];
			}
			return $count;
		}
		public function add($pro)
		{
			include("connection.php");
			$sql=" INSERT INTO `product`(`ProductID`, `CategoryID`, `InventoryID`, `ProductName`, `Amount`, `Image`, `Price`) VALUES ('".$pro[0]."','".$pro[1]."','".$pro[2]."','".$pro[3]."','".$pro[4]."','".$pro[5]."','".$pro[6]."')";
			echo $sql;
			if(!$conn->query($sql))
			{
				echo $conn->error;	
			}
			else
			{
				echo "<script>
				alert('Thêm sản phẩm thành công');
				window.location.href='../index.php';
				</script>";
			}
		}
		public function update($pro)
		{
			include("connection.php");
			$sql="UPDATE `product` SET `ProductID`='".$pro[0]."',`CategoryID`='".$pro[1]."',`InventoryID`='1',`ProductName`='".$pro[2]."',`Amount`='".$pro[3]."',`Image`='img_product/".$pro[4]."',`Price`='".$pro[5]."' WHERE `ProductID`='".$pro[0]."'";
			echo $sql;
			if(!$conn->query($sql))
			{
				echo $conn->error;	
			}
			else
			{
				echo "<script>
				alert('Sửa sản phẩm thành công');
				window.location.href='admin-index.php';
				</script>";
			}
		}
	}
	/*$v=new product;
	$a=$v->countVege();
	echo $a;*/
	/*$p=new product;
	$c=$p->stacticalMoneyByMonth(2);
	echo $c;*/
?>