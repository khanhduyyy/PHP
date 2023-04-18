<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="../logo-img/adidas.jpg" type="image/gif">
        <link rel="stylesheet" href="../mycss.css">
        <script src="main.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Cửa hàng giày thể thao</title>
    </head>
<body>
<?php  
	include('../menuuser/menu.php')
?>
<h2 class='top'>
	History
</h2>
<table class='table'>
  <thead>
    <tr>
      <th scope='col'>#</th>
      <th scope='col'>Tên sản phẩm</th>
      <th scope='col'>Hình ảnh</th>
      <th scope='col'>Số lượng</th>
      <th scope='col'>Giá</th>
    </tr>
  </thead>
  <tbody>
 <?php
	include("../class/order.php");
	$a=new order;
	$ord=$a->getOrderDetail($_GET['ID']);
	$i=1;
	foreach ($ord as $key) {
	echo 
	"
	    <tr>
	      <th scope='row'>".$i."</th>
	      <td>".$key['Name']."</td>
	      <td><img style='height:120px' src='../".$key['Image']."'</td>
	      <td>".$key['Qty']."</td>
	      <td>".number_format($key["Price"], 0, '', ',')."</td>
	    </tr>";
	$i++;
	}
?>
  </tbody>
</table>
</body>
</html>