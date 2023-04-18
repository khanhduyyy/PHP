<html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="../logo-img/adidas.jpg" type="image/gif">
            <link rel="stylesheet" href="../mycss.css">
            <link rel="stylesheet" href="./products.css">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
            <title>Cửa hàng giày thể thao</title>
        </head>
        <body>
            <?php
                include('../menuuser/menu.php');
                include('../class/product.php');
                $product=new product;
                $p=$product->getByID($_GET['id']);
                foreach ($p as $key) { 
                echo "<form action='../user-php/shopping-cart.php' method='GET  '>
                <div class='info-flex-container'>
                <div class='info-flex' >
                    <img style=max-width:80%; src='../".$key['Image']."' alt=''>
                    <input hidden value='".$key['ProductID']."' name='ProID'>
                </div>
                <div class='info-flex'>
                    <b>-".$key['ProductName']."</b>
                    <div class='price'>Giá: ".number_format($key['Price'], 0, '', ',')."<sup>đ</sup></div>";
                    if($key['CategoryID']!=4)
                    {
                    echo "  <div class='size'>
                            <h4>Chọn size thích hợp</h4>
                        </div>
                        
                        
                        <!-- <div class='select-wrap'> -->
                            <div class='swatch-element' id='buttonContainer'>
                                <div>
                                    <input type=radio class='none' value='38' name='size'>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>38</i>
                                    <input type=radio class='none' value='39' name='size'>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>39</i>
                                    <input type=radio class='none' value='40' name='size'>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>40</i>
                                    <input type=radio class='none' value='41' name='size' checked>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>41</i>
                                    <input type=radio class='none' value='42' name='size'>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>42</i><input type=radio class='none' value='43' name='size'>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>43</i>
                                    <input type=radio class='none' value='44' name='size'>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>44</i>
                                    <input type=radio class='none' value='45' name='size'>
                                    <i style='font-style:normal;margin-left:-12px;margin-right:15px;'>45</i>
                                </div>
                            </div>";
                    }
                };
            ?>
                    <!-- </div> -->
                    <div class="col-sm-4 col-sm-offset-4">
                        <h4>Chọn số lượng</h4>
                        <div class="input-group mb-3" style="width: 54%;">
                           
                            <div class="input-group-prepend">   
                                <button type="button" class="btn btn-dark btn-sm" id="minus-btn"><i class="fa fa-minus"></i></button>
                            </div>
                            <input type="number" id="qty_input" class="form-control form-control-sm" value="1" min="1" name='qty'>
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-dark btn-sm" id="plus-btn"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                    <?php  
                        foreach ($p as $key) {
                           echo" <div class='add-cart'><button style='width:70%;height:50px;border-radius:5px;'>Thêm vào giỏ</button></div><br>";
                        }
                    ?>
                    <br>
                        <div class="title">
                            <h2>Mô tả</h2>
                            <h3 class="title-ADIDAS">Hàng chính hãng ADIDAS</h3>
                            <h4>Bao gồm: Sản phẩm mới nguyên TEM, hộp giày, hóa đơn bán hàng từ ADIDAS. </h4>
                            <h4>Đổi sản phẩm miễn phí trong vòng 30 ngày.</h4> 
                        </div>

                </div>
            </div>
        </form>
            <br>
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
            <p style="text-align: center; font-size: 13px;">
                © Infitiny Jewewlry. All Rights Reserved.
            </p>
            <!--Page up btn------------------------------------------------------->
            <button onclick="topFunction()" id="myBtn"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
            <script src="./main.js"></script>
        </body>
        
        </html>