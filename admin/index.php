<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<title></title>
</head>
<body>
	<div class="card" style="width: 35%;margin-left: 550px;margin-top: 200px;">
		<article class="card-body">
		<form action="index.php" method="get">
		    <div class="form-group">
		    	<label>Name</label>
		        <input style="margin-top: 10px;" name="name" class="form-control" placeholder="Name" type="text">
		    </div> <!-- form-group// -->
		    <div class="form-group">
		    	<label>Your password</label>
		        <input style="margin-top: 10px;" name="pass" class="form-control" placeholder="******" type="password">
		    </div> <!-- form-group// --> 
		    <div class="form-group"> 
		    </div> <!-- form-group// -->  
		    <div class="form-group">
		        <button type="submit" style="float:right;" class="btn btn-primary btn-block"> Login  </button>
		    </div> <!-- form-group// -->                                                           
		</form>
		</article>
</div>
</body>
</html>
<style type="text/css">
	.form-group{
		margin-bottom: 20px;
	}
</style>
<?php
if(isset($_GET['name'])&&isset($_GET['pass']))
{
	if($_GET['name']=='admin' && $_GET['pass']=='admin') {
		echo "<script>
		window.location.href='admin-index.php';
		</script>";
	}
	else
	{
		echo "<script>
		alert('Sai tài khoản hoặc mật khẩu');
		</script>";
	}
}
?>