<?php  
	include('../class/product.php');
	include('../class/category.php');
	$pro=new product;
	$cate=new category;
	$c=$cate->getIDCatebyName($_GET['category']);
	$p=array($_GET['id'],$c,$_GET['name'],$_GET['amount'],$_GET['fileToUpload'],$_GET['price']);
	$pro->update($p);
?>