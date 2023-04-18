<?php  
	include('../class/customer.php');
	$cus=new customer;
	$c=array($_GET['id'],$_GET['name'],$_GET['address'],$_GET['phone']);
	$cus->update($c);
?>