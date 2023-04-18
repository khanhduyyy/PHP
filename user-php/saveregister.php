<?php
	include("../class/customer.php");
	$c=new customer;
	$name=$c->checkUsernameIsExist($_GET['name']);
	if($name)
	{
		echo "<script>
		alert('Tên tài khoản đã tồn tại');
		window.location.href='login.php';
		</script>";
	}
	$countcus=$c->CountID();
	$countacc=$c->CountAcc();
	$acc=array($countacc+1,$_GET['username'],$_GET['pass'],3);
	$cus=array($countcus+1,$countacc+1,$_GET['fullname'],$_GET['address'],$_GET['phone']);
	$save=$c->addAccount($cus,$acc);
	echo "<script>
	alert('Đăng ký thành công');
	window.location.href='login.php';
	</script>";
?>