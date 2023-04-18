
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="logo-img/adidas.jpg" type="image/gif">
    <link rel="stylesheet" href="mycss.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>ADIDAS - ADMIN </title>
</head>
<body>
<?php
   include("class/product.php"); 
   $p=new product;
   $pro=$p->getProductBySearch($_GET['search']);
   //var_dump($pro);
?>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navar-branch" style="cursor: pointer;" href="index.php">
                    <img src="logo-img/adidas.jpg" alt="logo" height="85px">
                </a>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav mx-auto " id="lsp">
                        <li class="nav-item">
                            <a class="nav-link active" style="cursor: pointer;" href="index.php">TRANG CHỦ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer;" href="./product-php/giaynam.php">GIÀY NAM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer;" href="./product-php/giaynu.php">GIÀY NỮ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer;" href="./product-php/giaytreem.php">GIÀY TRẺ EM</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="cursor: pointer;" href="./product-php/phukien.php">PHỤ KIỆN</a>
                        </li>
                    </ul>
                </div>
                <div class="nav-search">
                    <form class="form-inline my-2 my-lg-0" method="GET" action="search.php">
                        <input class="input-search" type="search" name="search" placeholder="Nhập giày ..." aria-label="Search">
                        <button class="btn-search" type="submit">Search</button>
                      </form>
                </div>
                <div class = "user-name">
                    <h4>Name</h4>
                </div>
                <div class="user-nav">
                    <div class="dropdown-user">
                        <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                        <div class="dropdown-user-content">
                            <a href="./user-php/historyCart.php">Lịch sử</a>
                            <a href="./user-php/login.php">Đăng nhập</a>
                            <a href="./user-php/register.php">Đăng ký</a>
                            <a href="./user-php/changepassword.php">Đổi mật khẩu</a>
                            <a href="">Đăng xuất</a>
                        </div>
                    </div>
                    <a href="" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                    <span id="counter">
                    </span>
                </div>
            </div>
        </nav><br>
    <div class="product-box" id="allProductContent" style="margin-left: 200px;">
        <?php
           foreach($pro as $key)
            {
                echo 
                "<div class='product-item''>
                <a href='products/a.php'>
                    <img src='./".$key['Image']."' alt=''>
                    <i class='fa fa-search'></i>
                    <div class='product-name'>".$key['ProductName']."</div>
                </a>
                <div class='price'>".number_format($key['Price'], 0, '', ',')."<sup>đ</sup></div>
                </div>"; 
            }       
        ?>
    </div> 
    
    
    

    <!--offer img------------------------------------------------------->
    <div class="offer-img">
        <div class="offer">
            <img src="offer_img/anh1.jpg" alt="offer-img">
            <div class="offer-text">THỜI TRANG</div>
        </div>
        <div class="offer">
            <img src="offer_img/anh2.jpeg" alt="offer-img">
            <div class="offer-text">PHONG CÁCH</div>
        </div>
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
        <div class="flex5">ADIDAS là một thương hiệu giày <br>
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
            <strong style="font-size: 20px;">Địa chỉ cửa hàng ADIDAS</strong>
            <h6> 7, đường: Hai Bà Trưng, Q.1, TP.HCM</h6>
            <h6>135, đường: Trần Phú, Q.Hà Đông, TP.Hà Nội</h6>
            <h6>44, đường: Ngô Đức Kế, Q.Ninh Kiều, TP.Cần Thơ</h6>
            <P>2, Ông Ích Khiêm, Thanh Bình, Hải Châu, TP.Đà Nẵng</P>
        </div>
        <div class="flex8">
            <strong style="font-size: 20px;">ĐĂNG KÝ NHẬN TIN</strong><br>
            <input type="email" placeholder="Nhập email của bạn..">
            <input type="button" value="Gửi">
        </div>
    </div>
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
        <div class="flex5">ADIDAS là một thương hiệu giày <br>
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
            <strong style="font-size: 20px;">Địa chỉ cửa hàng ADIDAS</strong>
            <h6> 7, đường: Hai Bà Trưng, Q.1, TP.HCM</h6>
            <h6>135, đường: Trần Phú, Q.Hà Đông, TP.Hà Nội</h6>
            <h6>44, đường: Ngô Đức Kế, Q.Ninh Kiều, TP.Cần Thơ</h6>
            <P>2, Ông Ích Khiêm, Thanh Bình, Hải Châu, TP.Đà Nẵng</P>
        </div>
        <div class="flex8">
            <strong style="font-size: 20px;">ĐĂNG KÝ NHẬN TIN</strong><br>
            <input type="email" placeholder="Nhập email của bạn..">
            <input type="button" value="Gửi">
        </div>
    </div>
    <!--Page up btn------------------------------------------------------->
    <button onclick="topFunction()" id="myBtn"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
    <script src="./jquery-3.6.0.js"></script>
    <script src="main-js.js"></script>
</body>

</html>