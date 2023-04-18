
<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/06272aca3f.js" crossorigin="anonymous"></script>
    <style>
        .card-img-top {
            width: 285px;
            height: 200px;
        }
        .card{
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="admin-index.php">TRANG QUẢN TRỊ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-tasks"></i> QUẢN LÍ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin-index.php">QUẢN LÍ SẢN PHẨM</a>
                            <a class="dropdown-item" href="qldh.php">QUẢN LÍ ĐƠN HÀNG</a>
                            <a class="dropdown-item" href="qlkh.html">QUẢN LÍ KHÁCH HÀNG</a>
                            <!-- <a class="dropdown-item" href="#">CHƯƠNG TRÌNH KHUYẾN MÃI</a> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="thongke.php"><i class="fas fa-calculator"></i> THỐNG KÊ</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="far fa-user"></i> ĐĂNG NHẬP</a>
                    </li> -->
                </ul>
            </div>
        </nav>
         <?php
            include("../class/customer.php"); 
            $p=new customer;
            $key=$p->getIn4CusByID($_GET['id']);
            //var_dump($key);
            $a=$key['Address'];
        echo "<div class='card' style='width: 60%;margin-left: 200px;margin-top:50px;'>
                <article class='card-body'>
                <h4 class='card-title mb-4 mt-1'>Sửa khách hàng</h4>
                <form action='updatecus.php' method='get' enctype='multipart/form-data'>
                    <div class='form-group'>
                            <label>ID Khách hàng:</label>
                            <input name='id' class='form-control' placeholder='Name' type='text' value='".$_GET['id']."' readonly='true'>
                    <div class='form-group'>
                        <label>Tên khách hàng:</label>
                        <input name='name' class='form-control' placeholder='Tên' type='text' value='".$key['Fullname']."'>
                    </div> <!-- form-group// -->
                    <div class='form-group'>
                        <label>Địa chỉ:</label>
                        <input name='address' class='form-control' placeholder='Địa chỉ' type='text' value='".$a."'>
                    </div> <!-- form-group// --> 
                    <div class='form-group'>
                        <label>Số điện thoại:</label>
                        <input name='phone' class='form-control' placeholder='SĐT' type='text' value=".$key['PhoneNumber'].">
                    </div> <!-- form-group// -->
                    <div class='form-group'>
                        <button type='submit' class='btn btn-primary btn-block'>Sửa</button>
                    </div> <!-- form-group// -->                                                           
                </form>
                </article>
        </div>";
?>
    </body>