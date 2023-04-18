
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
   $pro1=$p->get3ProductsListByCateID(1);
   $pro2=$p->get3ProductsListByCateID(2);
   $pro3=$p->get3ProductsListByCateID(3);
   $pro4=$p->getListByCateID(4);
   //var_dump($pro1);
    include("menu.php");
?>    
    <div id="carouselId" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselId" data-slide-to="0" class="active"></li>
            <li data-target="#carouselId" data-slide-to="1" class=""></li>
            <li data-target="#carouselId" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="logo-img/giay1.jpg" alt="1" width="100%" height="100%">
            </div>
            <div class="carousel-item">
                <img src="logo-img/giay2.jpg" alt="2" width="100%" height="100%">
            </div>
            <div class="carousel-item">
                <img src="logo-img/giay3.jpg" alt="2" width="100%" height="100%">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br><br><br><br>
    <div>
        <!--best-seller-product------------------------------------------------------->
        <h2 class="content">
            <span>Tất Cả Sản Phẩm</span>
        </h2>
    </div>
    <div class="product-box" style='margin-left:200px;'> 
        <?php
           foreach($pro1 as $key)
            {
                echo 
                "<div class='product-item''>
                <a href='products/a.php?id=".$key['ProductID']."'>
                    <img src='./".$key['Image']."' alt=''>
                    <i class='fa fa-search'></i>
                    <div class='product-name'>".$key['ProductName']."</div>
                </a>
                <div class='price'>".number_format($key['Price'], 0, '', ',')."<sup>đ</sup></div>
                </div>"; 
            }
            foreach($pro2 as $key)
            {
                echo 
                "<div class='product-item''>
                <a href='products/a.php?id=".$key['ProductID']."'>
                    <img src='./".$key['Image']."' alt=''>
                    <i class='fa fa-search'></i>
                    <div class='product-name'>".$key['ProductName']."</div>
                </a>
                <div class='price'>".number_format($key['Price'], 0, '', ',')."<sup>đ</sup></div>
                </div>"; 
            }   
            /*foreach($pro3 as $key)
            {
                echo 
                "<div class='product-item''>
                <a href='products/a.php'>
                    <img src='./".$key['Image']."' alt=''>
                    <i class='fa fa-search'></i>
                    <div class='product-name'>".$key['ProductName']."</div>
                </a>
                <div class='price'>".number_format($key['Price'], 0, '', ',')."<sup>đ</sup></div>
                <div class='add-cart'> <input type='button' value='Thêm vào giỏ' id='btn' onclick='addcartcounter()'></div>
                </div>"; 
            }*/          
        ?>
        </div>
            <h2 class="content">
                <span> Phụ Kiện</span>
            </h2> 
        <div class="product-box" style='margin-left:200px;'>
           <?php 
            foreach($pro4 as $key)
            {
                echo 
                "<div class='product-item''>
                <a href='products/a.php?id=".$key['ProductID']."'>
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