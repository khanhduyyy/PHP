<?php
	session_start();
	include("../class/customer.php");
	$cus=new customer;
	$name=$cus->checkUsernameIsExist($_GET['name']);
	$c=$cus->getFullnameByUsername($_GET['name']);
	//var_dump($c);
	if(!$name)
	{
		echo "<script>
		alert('Tên tài khoản không tồn tại');
		window.location.href='login.php';
		</script>";
	}
	else
	{
		$pass=$cus->getPasswordByUsername($_GET['name']);
		if($pass==$_GET['pass'])
		{
			$_SESSION['Fullname']=$c['Fullname'];
			$_SESSION['CustomerID']=$c['CustomerID'];
			echo "<script>
			alert('Đăng nhập thành công');
			window.location.href='../index.php';
			</script>";
		}
		else
		{
			echo "<script>
			alert('Mật khẩu không chính xác');
			window.location.href='login.php';
			</script>";
		}
	}
	/*if(trim($_POST["user"]) === "")
	{
		echo "<script>
		alert('Không tìm thấy tài khoản');
		
		</script>";
	}
	$check=$cus->getByID($_POST['id']);
	if(count($check)==0)
	{
		echo "<script>
		alert('Không tìm thấy tài khoản');
		window.location.href='login.php';
		</script>";
	}
	if($check['Password']==$_POST['pass'])
	{
		session_start();
		$_SESSION['CusID']=$check['CustomerID'];
		$_SESSION['Name']=$check['Fullname'];
		echo "<script>
		alert('Đăng nhập thành công');
		window.location.href='../vegetable/index.php';
		</script>";
	}
	else
	{
		echo "<script>
		alert('Nhập sai password');
		window.location.href='login.php';
		</script>";
	}	
	var_dump($check);*/
?>