<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../logo-img/logo.png" type="image/gif">
    <link rel="stylesheet" href="../mycss.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Infinity - Nhẫn</title>
</head>

<body></a>
    <div class="top-header">
        <p>-~ YOUR LIFE YOUR STYLE ~-</p>
    </div>
    <nav class="navbar sticky-top navbar-expand-md navbar-light bg-light">
        <div class="container-fluid">
            <a class="navar-branch" style="cursor: pointer;" href="../index.php">
                <img src="../logo-img/logo.png" alt="logo" height="45px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav mx-auto " id="lsp">
                    <li class="nav-item">
                        <a class="nav-link active" style="cursor: pointer;" href="../index.php">TRANG CHỦ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="../product-php/all-product.php">SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="../product-php/vongtay.php">VÒNG TAY</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="../product-php/daychuyen.php">DÂY CHUYỀN</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="../product-php/khuyentai.php">KHUYÊN TAI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" style="cursor: pointer;" href="../product-php/nhan.php">NHẪN</a>
                    </li>
                </ul>

            </div>
            <div class="user-nav">
                <p style="float: left;">
                    <?php
                    session_start();
                    if (isset($_SESSION['userId']) == true) {
                        echo $_SESSION['userCusName'];
                    }
                    ?>
                </p>
                <div class="dropdown-user">
                    <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                    <div class="dropdown-user-content">
                        <a href="#">Lịch sử</a>
                        <a href="../user-php/login.php">Đăng nhập</a>
                        <a href="../user-php/register-form.php">Đăng ký</a>
                        <a href="../user-php/changepassword.php">Đổi mật khẩu</a>
                        <a href="../logoutAccount.php">Đăng xuất</a>
                    </div>
                </div>
                <a href="./user-php/shopping-cart.php" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                <span id="counter">
                    <?php
                    if (isset($_SESSION['cartDetail'])) {
                        echo count($_SESSION['cartDetail']);
                    } else {
                        echo 0;
                    }
                    ?>
                </span>
            </div>
        </div>
    </nav><br>
    <div class="info-flex-container">
        <div class="info-flex">
            <img src="../img_product/'.$hinhanh.'" alt="1234">
        </div>
        <div class="info-flex">
            <b>'.$tensp.'</b>
            <div class="price">'.convetNumberToMoney($gia).'<sup>đ</sup></div>
            <p class="info">Chất liệu: '.$chatlieu.' | Màu: '.$mau.'</p>
            <div class="add-cart"> <input type="button" value="Thêm vào giỏ" onclick="addToCartSub('.$id.')"></div><br>
            <h2>Các sản phẩm tại Infinity có gì nổi bật.</h2>
            <p>Phụ kiện trang sức gần như sẽ thu hút ánh nhìn và để lại ấn tượng rất lớn với người đối diện, thế nên món phụ kiện này là thứ không thế thiếu trong set đồ của bạn.</p>
            <h4>1. Yên tâm về chất lượng</h4>
            <p>Các mẫu Dây chuyền, vòng cổ, khuyên tai, nhẫn tại Infinity được lựa chọn và sàng lọc một cách kĩ càng về chất lượng, với chất liệu và dây được làm từ hợp kim titan trắng, đá, dây dù... cực kì chắc chắn và bền bỉ theo thời gian.</p>
            <h4>2. Mẫu mã đa dạng</h4>
            <p>Luôn luôn update những mẫu mặt dây chuyền theo mùa, theo trend, theo phong cách của giới trẻ, đã có hơn 100 mẫu dây chuyền cập bên tại Infinity, với nhiều chất liệu, kiểu cách. Và không dừng ở con số đó, mỗi ngày Infinity đều sẽ tiếp tục update các mẫu sản phẩm mới.</p>
            <h4>3. Giá cả hợp lý</h4>
            <p>Đến với các sản phẩm của Infinity, khách hàng có quyền yên tâm về sản phẩm với mức giá mình bỏ ra. Luôn có các event, các ưu đãi cho khách hàng mới, tri ân khách hàng cũ. </p>
        </div>
    </div>
    <!--footer------------------------------------------------------->
    <div class="flex-container">
        <div class="flex1"><i class="fa fa-plane" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>GIAO HÀNG TẬN NƠI TRÊN TOÀN QUỐC</p>
        </div>
        <div class="flex1"><i class="fa fa-calendar" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>ĐỔI TRẢ TRONG VÒNG 07 NGÀY </p>
        </div>
        <div class="flex1"><i class="fa fa-thumbs-up" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>CAM KẾT CHẤT LƯỢNG SẢN PHẨM</p>
        </div>
        <div class="flex1"><i class="fa fa-lock" style="font-size:35px;float: left; padding: 0 8px;"></i>
            <p>BẢO MẬT THÔNG TIN KHÁCH HÀNG</p>
        </div>
    </div>
    <div class="flex-container2">
        <div class="flex5">Infinity là một thương hiệu phụ kiện <br>
            Đã - Đang - Sẽ và Luôn mang tới cho mọi người những sản phẩm Độc - Chất - Giá tốt nhất trên thị trường.</div>
        <div class="flex6">
            <strong> CHĂM SÓC KHÁCH HÀNG</strong>
            <a href="#">LIÊN HỆ</a>
            <a href="#">HƯỚNG DẪN THANH TOÁN</a>
            <a href="#">GIAO HÀNG</a>
            <a href="#">CHÍNH SÁCH BẢO HÀNH</a>
            <a href="#">CHÍNH SÁCH ĐỔI TRẢ</a>
        </div>
        <div class="flex7">
            <strong style="font-size: 20px;">VỀ CHÚNG TÔI</strong>
            <a href="#">IFINITY LÀ GÌ?</a>
        </div>
        <div class="flex8">
            <strong style="font-size: 20px;">ĐĂNG KÝ NHẬN TIN</strong><br>
            <input type="email" placeholder="Nhập email của bạn..">
            <input type="button" value="Gửi">
        </div>
    </div>
    <p style="text-align: center; font-size: 13px;">
        © Infitiny Jewewlry. All Rights Reserved.
    </p>
    <!--Page up btn------------------------------------------------------->
    <button onclick="topFunction()" id="myBtn"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
    <script src="../main-js.js"></script>
    <script>
        src = "../main-js.js"
    </script>
</body>

</html>