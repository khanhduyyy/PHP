
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
        include('../menuuser/menu.php');
    ?>
    <div>
        <h2 class="content">
            <span>GIỎ HÀNG</span>
        </h2>
    </div>
    <div>
    <table i='view_account' class='styled-table'>
                <thead style='color:white; background-color: rgb(121, 11, 121);'>
                    <tr>
                        <th style ='text-align: center; width : 5rem;'>STT</th>
                        <th style ='text-align: center; width : 12rem;'>Tên Sản Phẩm</th>
                        <th style ='text-align: center;width : 5rem;'>Số lượng</th> 
                        <th style ='text-align: center;width : 8rem;'>Hình ảnh</th>
                        <th style ='text-align: center;width : 6rem;'>Giá</th>
                        <th style ='text-align: center;width :1rem;'></th>
                    </tr>
                </thead>
            <tbody>
        <?php
            include('../class/product.php');
            if(isset($_GET['DelID']))
            {
                unset($_SESSION['cart'][$_GET['DelID']]);
            }
            if(isset($_GET['ProID'])||isset($_SESSION['cart']))
            {
                if(isset($_GET['ProID']))
                {
                    $p=new product;
                    $pro=$p->getByID($_GET['ProID']);   
                    $id=$_GET['ProID'];
                    if(!isset($_SESSION['cart'][$id]))
                    {
                        foreach ($pro as $row) {
                            $_SESSION['cart'][$id]['ProductID']=$row['ProductID'];
                            $_SESSION['cart'][$id]['CategoryID']=$row['CategoryID'];
                            $_SESSION['cart'][$id]['ProductName']=$row['ProductName'];
                            $_SESSION['cart'][$id]['Amount']=$row['Amount'];
                            $_SESSION['cart'][$id]['Image']=$row['Image'];
                            $_SESSION['cart'][$id]['Price']=$row['Price'];
                            $_SESSION['cart'][$id]['qty']=$_GET['qty'];
                            /*if(isset($_GET['size']))
                            {
                                $_SESSION['cart'][$id]['Size']=$_GET['size'];
                            }
                            else
                                $_SESSION['cart'][$id]['Size']='';
                            */
                        }
                    }
                    else
                        $_SESSION['cart'][$id]['qty']+=$_GET['qty'];
                }
                #var_dump($_SESSION['cart']);
                #session_destroy();
                $i=1;
                foreach ($_SESSION['cart'] as $key) {
                    $thanhtien[$i]=$key['qty']*$key['Price'];
                    $soluong[$i]=$key['qty'];
                   echo "
                        <tr>
                            <td style ='text-align: center;' >".$i."</td>
                            <td style ='text-align: center;' >".$key['ProductName']."</td>
                            <td style ='text-align: center;'>".$key['qty']."</td>
                            <td style ='text-align: center;'><img src='../".$key['Image']."' style='height:100px;'></td>
                            <td style ='text-align: center;'>".number_format($key['Price'], 0, '', ',')."</td>  
                            <td><a href='shopping-cart.php?DelID=".$key['ProductID']."' style='color:red;margin-left:60px;'>Xóa</a></td>                       
                        </tr>
                    "; 
                    $i++;
                }
                /*echo "<tr>
                <td></td>
                <td></td>
                <td style ='text-align: center;'>".array_sum($soluong)."</td>
                <td></td>
                <td style ='text-align: center;'>".number_format(array_sum($thanhtien), 0, '', ',')."</td>
              </tr>";*/
              if(count($_SESSION['cart'])!=0)
                 $_SESSION['Total']=array_sum($thanhtien);
            }
        ?>
            </tbody>            
    </table>
    <?php
    if(isset($_SESSION['cart']))
    {
        if(count($_SESSION['cart'])!=0)
        {
        echo "<h3 style='float:right;margin-right:80px;'>Tổng tiền: ".number_format(array_sum($thanhtien), 0, '', ',')."</h3>";
        }
        echo '<br>';
    }
    ?>
    <?php  
    if(isset($_SESSION['cart']))
    {
        if(count($_SESSION['cart'])==0)
        {
            echo "<h1 style='text-align:center;'>Giỏ hàng hiện đang trống</h1>";
        }
        if(count($_SESSION['cart'])>0&&isset($_SESSION['CustomerID']))
        {
        echo "<a href='saveorder.php'>
                <button style='margin-left: 1445px;background-color: red;padding: 10px;border-radius: 5px;color: white;'>Đặt hàng</button>
              </a>";
        }
        else if(count($_SESSION['cart'])>0&&!isset($_SESSION['CustomerID']))
        {
            echo "<a onClick='alert(".'"'."Vui lòng đăng nhập để mua hàng".'"'.")'>
                <button style='margin-left: 1445px;background-color: red;padding: 10px;border-radius: 5px;color: white;'>Đặt hàng</button>
              </a>";
        }
        else
        {

        }
    }
    else
        echo "<h1 style='text-align:center;'>Giỏ hàng hiện đang trống</h1>";
    ?>
    </div>
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
    <!--Page up btn------------------------------------------------------->
    <button onclick="topFunction()" id="myBtn"><i class="fa fa-arrow-up" aria-hidden="true"></i></button>
    <script src="../main-js.js"></script>
</body>

</html>