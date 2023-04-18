<?php
	class order
	{
		public function getAll()
		{
			include("connection.php");
			$sql="SELECT * FROM `orders`";
			$result = $conn->query($sql);
			$order=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row['OrderID'];
				$order[$id]['OrderID']=$row["OrderID"];
				$order[$id]['CustomerID']=$row["CustomerID"];
				$order[$id]['Date']=$row["Date"];
				$order[$id]['Total']=$row["Total"];
			}
			return $order;	
		} 
		public function getAllOrder($cusID)
		{
			include("connection.php");
			$sql="SELECT * FROM `orders` WHERE CustomerID=".$cusID."";
			$result = $conn->query($sql);
			$order=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row['OrderID'];
				$order[$id]['OrderID']=$row["OrderID"];
				$order[$id]['CustomerID']=$row["CustomerID"];
				$order[$id]['Date']=$row["Date"];
				$order[$id]['Total']=$row["Total"];
			}
			return $order;	
		}
		public function getOrderDetail($orderid)
		{
			include("connection.php");
			$sql="SELECT product.productID,product.productName,product.Image,orderdetail.Quantity,product.Price FROM `orderdetail`,`product` WHERE orderdetail.productID=product.productID AND orderdetail.OrderID=".$orderid."";
			$result = $conn->query($sql);
			$order=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["productID"];
				$order[$id]['Name']=$row["productName"];
				$order[$id]['Image']=$row["Image"];
				$order[$id]['Qty']=$row["Quantity"];
				$order[$id]['Price']=$row["Price"];
			}
			return $order;	
		}
		public function getIn4CustomerByOrderID($orderid)
		{
			include("connection.php");
			$sql="SELECT * FROM `customers`,orders WHERE orders.CustomerID=customers.CustomerID and orders.OrderID=".$orderid."";
			$result = $conn->query($sql);
			$order=array();
			while ($row = $result->fetch_assoc())
			{	
				$order['Fullname']=$row["Fullname"];
				$order['Address']=$row["Address"];
				$order['PhoneNumber']=$row["PhoneNumber"];
			}
			return $order;	
		}
		public function addOrder($order, $detail)
		{
			include("connection.php");
			$date = date('Y-m-d', time());
			$sql_stm1="INSERT INTO `orders` (`OrderID`, `CustomerID`,SellerID, `Date`, `Total`, `Note`) VALUES ('".$order['0']."','".$order['1']."','".'1'."','".$date."','".$order['2']."',' ')";
			echo $sql_stm1;
			if(!$conn->query($sql_stm1))
			{
				echo $conn->error;
				echo $sql_stm1;
			}
			foreach ($detail as $ord) 
			{
				$sql_stmt2="INSERT INTO orderdetail VALUES ('".$order['0']."','".$ord['ProductID']."','".$ord['qty']."','".$ord['Price']*$ord['qty']."')";
				if(!$conn->query($sql_stmt2))
				{
					echo $conn->error;
				}
				echo $sql_stmt2;
			}
		}
		public function CountOrder()
		{
			include("connection.php");
			$sql="SELECT count(OrderID) as c FROM `orders` Where 1";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc())
			{
				$count=$row["c"];
			}
			return $count;
		} 
	}
	/*$a=new order;
	$c=array();
	$c['OrderID']=4;
	$c['CusID']=1;
	$c['Total']=400;
	$b=$a->addOrder($c,2);*/
?>