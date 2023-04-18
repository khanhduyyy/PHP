
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
            include("../class/product.php"); 
            $p=new product;
            $k=$p->getByID($_GET['id']);
            //var_dump($k);
            foreach ($k as $key) {
        echo "<div class='card' style='width: 60%;margin-left: 200px;margin-top:50px;'>
                <article class='card-body'>
                <h4 class='card-title mb-4 mt-1'>Sửa sản phẩm</h4>
                <form action='updateproduct.php' method='get' enctype='multipart/form-data'>
                    <div class='form-group'>
                            <label>Product ID:</label>
                            <input name='id' class='form-control' placeholder='Name' type='text' value='".$_GET['id']."' readonly='true'>
                    <div class='form-group'>
                        <label>Product Name:</label>
                        <input name='name' class='form-control' placeholder='Name' type='text' value='".$key['ProductName']."'>
                    </div> <!-- form-group// -->
                    <div class='form-group'>
                        <label>Category Name:</label>
                        <br>
                        <select name='category'>";?>
                            <option <?php if($key['CategoryID'] == '1'){echo("selected");}?>>Giày nam</option>
                            <option <?php if($key['CategoryID'] == '2'){echo("selected");}?>>Giày nữ</option>
                            <option <?php if($key['CategoryID'] == '3'){echo("selected");}?>>Giày trẻ em</option>
                             <option <?php if($key['CategoryID'] == '4'){echo("selected");}?>>Phụ kiện</option>
                        </select>
                    </div> <!-- form-group// -->
                    <?php
                    echo " 
                    <div class='form-group'>
                        <label>Amount:</label>
                        <input name='amount' class='form-control' placeholder='Amount' type='text' value=".$key['Amount'].">
                    </div> <!-- form-group// --> 
                    <div class='form-group'>
                        <label>Price:</label>
                        <input name='price' class='form-control' placeholder='Price' type='text' value=".$key['Price'].">
                    </div> <!-- form-group// --> 
                    <div class='form-group'>
                        <label>Image:</label>
                        <br>
                          <input type='file' name='fileToUpload' id='fileToUpload'>
                    </div> <!-- form-group// --> 
                    <div class='form-group'>
                        <button type='submit' class='btn btn-primary btn-block'>Sửa</button>
                    </div> <!-- form-group// -->                                                          
                </form>
                </article>
        </div>";?>
        <?php
    }
        ?>
    </body>