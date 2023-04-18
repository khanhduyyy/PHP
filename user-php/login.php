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
    include("../menuuser/menu.php");
?>
            <h2 class="content">
                <span>KHÁCH HÀNG</span>
            </h2>
        <form method="get" class="box-login" action="checklogin.php">
            <h3>THÔNG TIN ĐĂNG NHẬP</h3>
            <label for="lname">Username</label>
            <input name="name" class="form-control" placeholder="Username" type="text">
            <label for="lpassword" style="margin-top: 10px;">Password</label>
            <input name="pass" class="form-control" placeholder="******" type="password" style="margin-left: 10px;">
            <button style="margin-left: 25%;">Đăng nhập</button>
            <a href="register.php">Đăng ký </a>
        </form>  
        <script src="../main-js.js"></script>
</body>
</html>
<style type="text/css">
    label{
        margin-left: 15px;
    }
</style>