<?php
    session_start();
    if(isset($_SESSION['MaNhanVien']) == false){
        echo "<script>alert('Bạn phải đăng nhập trước khi sử dụng')
        window.location.href ='../../../Login/HTML/index.php';
        </script>";
    }
?>

<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo-img/logo.png" type="image/gif">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../../../mycss.css">
    <link rel="stylesheet" href="../../../CSS/default.css">
    <link rel="stylesheet" href="../../../CSS/tablestyle.css">
    <link rel="stylesheet" href="../CSS/mystyle.css">
    <title>Infitiny - Admin</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navar-branch">
                <img src="../../../../logo-img/logo.png" alt="logo" height="55px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Xem Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="../../QuanLyHoaDon/index.php" class="nav-link">Xử Lý Hóa Đơn </a>
                    </li>
                    <li class="">
                        <a href="../../../Login/HTML/index.php" class="nav-link">Đăng xuất</a>
                    </li>
                </ul>
        </div>
        </div>
    </nav>
        <h2 class="content">
            <span>INFINITY - ADMIN - SẢN PHẨM</span>
        </h2>
        <p class="testid"></p>
        <div class="control">
            <p id="searchNumberBtn"><img src="../../../icon/search_48px.png" alt="UpdateSL" srcset="">Tìm kiếm</p>
        </div>

        <!-- Load table -->
        <div id="tablecontent">
                    
        </div>

   




        <!-- ======================= TÌM KIẾM SẢN PHẨM ======================= -->
    <div class="background" id="searchForm">
        <div class="defaultForm" style="padding-bottom: 2rem;">
            <div class="searchContent">
                <p>Tìm theo :</p>

                <select name="" id="choiseSearch">
                    <option value="0">[Lựa chọn]</option>
                    <option value="1">Tìm kiếm theo loại</option>
                    <option value="2">Tìm kiếm theo tên</option>
                </select>

            </div>
            <div class="searchContent" id="typeOfProductSearch">
                <p>Chọn loại sản phẩm</p>
                <select name="" id="typeOfSearch">
                    <option value="0">[Lựa chọn loại]</option>
                    <option value="1">Dây Chuyền</option>
                    <option value="2">Vòng Tay</option>
                    <option value="3">Nhẫn</option>
                    <option value="4">Khuyên Tai</option>
                </select>
            </div>
            <div class="searchContent" id="nameProductSearch">
                <p>Nhập tên sản phẩm</p>
                <input type="text" id="nameSearch">
            </div>


            <button class="designbtn" id="cancelSearch">Hủy bỏ</button>
            <button class="designbtn" id="searchBtn">Tìm kiếm</button>
        </div>
    </div>

    




    <script src="../../../../jquery-3.6.0.js"></script>
    <script src="../JS/myjs.js"></script>
</body>