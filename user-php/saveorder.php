<?php  
	session_start();
	include('../class/order.php');
	$ord=new order;
	$ordid=$ord->CountOrder()+1;
	$cusid=$_SESSION['CustomerID'];
	$total=$_SESSION['Total'];
	$order=array($ordid,$cusid,$total);
	$detail=$_SESSION['cart'];
	/*foreach ($detail as $key) {
		if($key['qty']>$key['Amount'])
		{
			echo "<script>
			alert('Số lượng sản phẩm vượt quá sản phẩm hiện có trong cửa hàng');
			window.location.href='index.php';
			</script>";
		}
	}*/
	var_dump($_SESSION['cart']);
	$ord->addOrder($order,$detail);
	unset($_SESSION['cart']);
	echo "<script>
	alert('Đặt hàng thành công');
	window.location.href='../index.php';
	</script>";
?>