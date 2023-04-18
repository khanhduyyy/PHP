<?php
    session_start();
    /*if(isset($_SESSION['MaNhanVien']) == false){
        echo "<script>alert('Bạn phải đăng nhập trước khi sử dụng')
        window.location.href ='../../Login/HTML/index.php';
        </script>";
    }*/
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
                        <a href="../QuanLySanPham/HTML/index.php" class="nav-link">Xem Sản Phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a href="./index.php" class="nav-link">Xử Lý Hóa Đơn </a>
                    </li>
                    <li class="">
                        <a href="../../Login/HTML/index.php" class="nav-link">Đăng xuất</a>
                    </li>
                </ul>
        </div>
        </div>
    </nav>
        <h2 class="content">
            <span>INFINITY - ADMIN - HÓA ĐƠN</span>
        </h2>
        <div class="control">
            <p id="searchBtnForm"><img src="../../icon/search_48px.png" alt="Tìm kiếm" srcset="">Tìm kiếm</p>
        </div>
        <div id = "tableContent">
        
        </div>

        <div id="viewDetailContent">
        
        </div>

        <div class="background" id="searchForm">
        <div class="defaultForm" id="subSearchForm" style="padding-bottom: 2rem;">
            <table>
                <tr>
                    <td class="add-product-head">Chọn loại cần tìm :</td>
                    <td>
                        <select name="" id="choiseSearch">
                            <option value="0">[Tìm theo]</option>
                            <option value="1">Tìm theo tên khách hàng</option>
                            <option value="2">Tìm theo ngày đặt hàng</option>
                            <option value="3">Tìm theo địa chỉ</option>
                            <option value="4">Tìm theo tình trạng hóa đơn</option>
                        </select>
                    </td>
                </tr>
                <tr id="findByNameAndAdress">
                    <td class="add-product-head">Nhập nội dung cần tìm</td>
                    <td>
                        <input type="text" name="" id="valueSearch">
                    </td>
                </tr>
                <tr id="findByDate">
                    <td class="add-product-head">Nhập nội dung cần tìm</td>
                    <td>
                        <input type="date" name="" id="valueSearchDate">
                    </td>
                </tr>
                <tr id="findByStatus">
                    <td class="add-product-head">Chọn loại cần tìm</td>
                    <td>
                        <select name="" id="selectTypeFind">
                            <option value="0">[Lựa chọn tình trạng]</option>
                            <option value="1">Chờ xác nhận</option>
                            <option value="2">Đã xác nhận</option>
                            <option value="3">Đã nhận được</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="add-product-head">Thông báo</td>
                    <td>
                        <h5 id="errorMessage" style="color: red;text-align: center;font-size: 1rem;"></h5>
                    </td>
                </tr>
            </table>

            <button class="designbtn" id="cancelSearch">Hủy bỏ</button>
            <button class="designbtn" id="searchBtn">Tìm kiếm</button>
        </div>
    </div>
    <script src="../../../jquery-3.6.0.js"></script>
    <script src="./qlhoadon.js"></script>
    <script src="../myjs.js"></script>
</body>