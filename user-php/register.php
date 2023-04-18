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
            <div class="box-dangky" >
                <form action="saveregister.php">
                    <h3>THÔNG TIN ĐĂNG KÝ</h3>
                    <div class="form-group">
                        <label>Your's FullName</label>
                        <input name="fullname" class="form-control" placeholder="FullName" type="text">
                    </div> <!-- form-group// -->
                     <div class="form-group">
                        <label>Your's UserName</label>
                        <input name="username" class="form-control" placeholder="UserName" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <label>Your password</label>
                        <input name="pass" class="form-control" placeholder="******" type="password">
                    </div> <!-- form-group// --> 
                    <div class="form-group">
                        <label>Address</label>
                        <input name="address" class="form-control" placeholder="Address" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <label>Phone</label>
                        <input name="phone" class="form-control" placeholder="Phone" type="text">
                    </div> <!-- form-group// -->
                    <button style="margin-top: 20px;margin-left: 290px;">Đăng ký</button>
                    <a href="login.php" style="font-size:15px;float:left;color: #5c5b5a;margin-top: 15px;margin-right: 15px;">Quay lại</a>
                </form>
            </div>
        
</body>
</html>
<style type="text/css">
    label{
        margin-left: 5px;
    }
</style>