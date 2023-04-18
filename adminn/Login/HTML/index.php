<?php
    session_start();
    unset($_SESSION['MaNhanVien']);
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
            
        </div>
        </div>
    </nav>
        <h2 class="content">
            <span>INFINITY - ADMIN - SITE</span>
        </h2>
        
        <div class="box-login">
            <h3>THÔNG TIN ĐĂNG NHẬP</h3>
            <h4 style="text-align: center;">(NHÂN VIÊN)</h4>
            <label for="nvname">Tên đăng nhập</label>
            <input type="email" required id="username">
            <label for="nvpassword">Mật khẩu</label>
            <input type="password" required id="password">
            <input id="loginBtn" type="submit" value="Đăng Nhập" >
            <p style="width: 70%;color:red;" id="errorMessage"></p>
        </div>
    <script src="../../../jquery-3.6.0.js"></script>
    <script src="../JS/adminjs.js"></script>
    
</body>