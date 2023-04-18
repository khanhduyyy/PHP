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
                    <?php
                    session_start();
                    if(isset($_SESSION['Fullname']))
                        echo "<h4>".$_SESSION['Fullname']."</h4>"
                    ?>
                </div>
                <div class="user-nav">
                    <div class="dropdown-user">
                        <i class="fa fa-user"></i><i class="fa fa-angle-down"></i>
                        <div class="dropdown-user-content">
                            <?php
                                if(isset($_SESSION['Fullname']))
                                {   
                                    echo "<a href='./user-php/historyCart.php'>Lịch sử</a>";
                                    echo "<a href='./user-php/logout.php'>Đăng xuất</a>";
                                }
                                else
                                {  
                                    echo " <a href='./user-php/login.php'>Đăng nhập</a>";
                                    echo "  <a href='./user-php/register.php'>Đăng ký</a>";
                                }
                            ?>
                        </div>
                    </div>
                    <a href="./user-php/shopping-cart.php" style="cursor: pointer;"><i class="fa fa-shopping-cart"></i></a>
                    <span id="counter">
                    </span>
                </div>
            </div>
        </nav><br>