
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
                            <a class="dropdown-item" href="qlkh.php">QUẢN LÍ KHÁCH HÀNG</a>
                            <!-- <a class="dropdown-item" href="#">CHƯƠNG TRÌNH KHUYẾN MÃI</a> -->
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="thongke.php"><i class="fas fa-calculator"></i> THỐNG KÊ</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="#"><i class="far fa-user"></i> ĐĂNG NHẬP</a>
                    </li> -->
                <form class="form-inline my-2 my-lg-0" method="GET" action="admin-index.php">
                    <input style="margin-left: 380px;" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                </ul>
            </div>
        </nav>
        <h2 style="text-align: center; margin-top:15px;">QUẢN LÍ SẢN PHẨM</h2>
        <p>
            <a href="themsanpham.php" class="btn btn-primary"><i class="far fa-plus-square"></i> THÊM SẢN PHẨM</a>
        </p>
        <div class='row' style = 'margin-left:21px;'>
        <?php
            $q='Bạn có muốn xóa sản phẩm này';
            include("../class/product.php"); 
            $p=new product;
            if(isset($_GET['search']))
                $pro=$p->getProductBySearch($_GET['search']);
            else
                $pro=$p->getAll();
           foreach($pro as $row)
            { 
                 echo "<div style='margin-top: 50px;max-width:32%;margin-right:10px;' class='col'>";
                    echo "<div class='card' style='width: 22rem;'>
                <img src='../" . $row["Image"] . "'' class='card-img-top' alt='...''>
                <div class='card-body'>
                <h5 class='card-title'>" . $row["ProductName"] . "</h5>
                <p class='card-text'>ID: " . $row["ProductID"] . "</p>
                <p class='card-text'>" . number_format($row["Price"],0,',','.') . " VNĐ</p>
                <a style='background-color:red;' href='" . "#?id=" . $row["ProductID"] . "' class='btn btn-primary' onclick='return confirm(".'"'.$q.'"'.");'>XÓA</a>
                <a href='" . "suasanpham.php?id=" . $row["ProductID"] . "' class='btn btn-primary'>SỬA</a>
                </div>
                </div>    
                </div>";
            }       
        ?>
        </div> 



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF"
        crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="viewsp.js"></script>
</body>

</html>