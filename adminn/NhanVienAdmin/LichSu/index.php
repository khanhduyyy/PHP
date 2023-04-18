<?php
    // unset($_SESSION['MaNhanVien']);
    //session_destroy();
    session_start();
    if(isset($_SESSION['MaNhanVien']) == false){
        echo "<script>alert('Bạn phải đăng nhập trước khi sử dụng')
        window.location.href ='../../Login/HTML/index.php';
        </script>";
    }
?>


<html lang="vi"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo-img/logo.png" type="image/gif">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../mycss.css">
    <link rel="stylesheet" href="../../CSS/default.css">
    <link rel="stylesheet" href="../../CSS/tablestyle.css">
    <link rel="stylesheet" href="./styleHoaDon.css">
    <title>Infitiny - Admin</title>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navar-branch">
                <img src="../../../logo-img/logo.png" alt="logo" height="55px">
            </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>    
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="../index.php" class="nav-link active">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a href="../QuanLySanPham/HTML/index.php" class="nav-link">Quản Lý Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="../QuanLyTaiKhoan/HTML/index.php" class="nav-link">Quản Lý Tài Khoản</a>
                    </li>
                    <li class="nav-item">
                        <a href="../QuanLyKhachHang/index.php" class="nav-link">Quản Lý Khách Hàng </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Quản Lý Hóa Đơn </a>
                    </li>
                    <li class="nav-item">
                        <a href="../QuanLyNhanVien/HTML/index.php" class="nav-link">Quản Lý Nhân Viên </a>
                    </li>
                    <li class="">
                        <a href="./index.php" class="nav-link">Lịch Sử</a>
                    </li>
                    <li class="">
                        <a href="../../Login/HTML/index.php" class="nav-link">Đăng xuất</a>
                    </li>
                </ul>
        </div>
        </div>
    </nav>
        <h2 class="content">
            <span>INFINITY - ADMIN - Lịch Sử</span>
        </h2>
        <div id = "tableContent"></div>        
    <script src="../../../jquery-3.6.0.js"></script>
    <script src="./lichsujs.js"></script>
</body>