<?php
	Class customer
	{
		/*public function getByID($cusid)
		{
			include("./connection.php");
			$sql="SELECT * FROM `customers` Where CustomerID=".$cusid."";
			$result = $conn->query($sql);
			$customers=array();
			while ($row = $result->fetch_assoc())
			{
				$customers['CustomerID']=$row["CustomerID"];
				$customers['Password']=$row["Password"];
				$customers['Fullname']=$row["Fullname"];
				$customers['Address']=$row["Address"];
				$customers['PhoneNumber']=$row["PhoneNumber"];
			}
			return $customers;
		}*/
		public function getAll()
		{
			include("connection.php");
			$sql="SELECT customers.*,Username,Password FROM `customers`,`account` WHERE customers.AccountID=account.AccountID";
			$result = $conn->query($sql);
			$customers=array();
			while ($row = $result->fetch_assoc())
			{
				$id=$row["CustomerID"];
				$customers[$id]['CustomerID']=$row["CustomerID"];
				$customers[$id]['AccountID']=$row["AccountID"];
				$customers[$id]['Password']=$row["Password"];
				$customers[$id]['Fullname']=$row["Fullname"];
				$customers[$id]['Address']=$row["Address"];
				$customers[$id]['PhoneNumber']=$row["PhoneNumber"];
				$customers[$id]['Username']=$row["Username"];
			}
			return $customers;
		}
		public function getIn4CusByID($cus)
		{
			include("connection.php");
			$sql="SELECT * FROM `customers` WHERE customers.CustomerID='".$cus."'";
			$result = $conn->query($sql);
			$customers=array();
			while ($row = $result->fetch_assoc())
			{
				$customers['CustomerID']=$row["CustomerID"];
				$customers['Fullname']=$row["Fullname"];
				$customers['Address']=$row["Address"];
				$customers['PhoneNumber']=$row["PhoneNumber"];
			}
			return $customers;
		}
		public function getFullnameByUsername($user)
		{
			include("connection.php");
			$sql="SELECT * FROM `account`,`customers` WHERE account.AccountID=customers.AccountID AND account.Username='".$user."'";
			$result = $conn->query($sql);
			$customers=array();
			while ($row = $result->fetch_assoc())
			{
				$customers['CustomerID']=$row["CustomerID"];
				$customers['Fullname']=$row["Fullname"];
			}
			return $customers;
		}
		public function checkUsernameIsExist($user)
		{
			include("connection.php");
			$sql="SELECT * FROM `account` Where Username='".$user."'";
			$result = $conn->query($sql);
			$count=0;
			while ($row = $result->fetch_assoc())
			{
				$count++;
			}
			if($count==0) return false;
			else return true;
		}
		public function getPasswordByUsername($user)
		{
			include("connection.php");
			$sql="SELECT * FROM `account` Where Username='".$user."'";
			$result = $conn->query($sql);
			while ($row = $result->fetch_assoc())
			{
				$acc=$row["Password"];
			}
			return $acc;
		}
		public function addAccount($cus,$acc)
		{
			include("connection.php");
			$sql1="INSERT INTO `account`(`AccountID`, `Username`, `Password`, `PrivilegeID`) VALUES ('".$acc[0]."','".$acc[1]."','".$acc[2]."','".$acc[3]."')";
			if(!$conn->query($sql1))
			{
				echo $conn->error;	
			}
			$sql2=" INSERT INTO `customers`(`CustomerID`, `AccountID`, `Fullname`, `Address`, `PhoneNumber`) VALUES ('".$cus[0]."','".$cus[1]."','".$cus[2]."','".$cus[3]."','".$cus[4]."')";
			if(!$conn->query($sql2))
			{
				echo $conn->error;	
			}
		}
		public function update($cus)
		{
			include("connection.php");
			$sql="UPDATE `customers` SET `Fullname`='".$cus[1]."',`Address`='".$cus[2]."',`PhoneNumber`='".$cus[3]."' WHERE `CustomerID`='".$cus[0]."'";
			echo $sql;
			if(!$conn->query($sql))
			{
				echo $conn->error;	
			}
			else
			{
				echo "<script>
				alert('Sửa khách hàng thành công');
				window.location.href='admin-index.php';
				</script>";
			}
		}
		public function CountID()
		{
			include("connection.php");
			$sql="SELECT count(CustomerID) as c FROM `customers` Where 1";
			$result = $conn->query($sql);
			$count=array();
			while ($row = $result->fetch_assoc())
			{
				$count=$row["c"];
			}
			return $count;
		} 
		public function CountAcc()
		{
			include("connection.php");
			$sql="SELECT count(AccountID) as c FROM `account` Where 1";
			$result = $conn->query($sql);
			$count=array();
			while ($row = $result->fetch_assoc())
			{
				$count=$row["c"];
			}
			return $count;
		} 	

	}
	/*$a=new customer;
	$c=array('3','admin3','admin3','jkl','Seoul');
	$a->add($c);*/
	/*$a=new customer;
	$c=$a->getAll();
	var_dump($c);*/
 ?>