<?php
    include '../../../Database/Connection.php';
    $trangthai = $_POST['trangthai'];
    $user = $_POST['user'];
    $conn = getConnection();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('m/d/Y h:i:s a');
    session_start();
    $maNV = $_SESSION['MaNhanVien'];
    

    $qry = "UPDATE `taikhoan` SET `TrangThai`= $trangthai WHERE `TenDangNhap` = '$user';";
    $log = "[$thoigian] Nhân Viên $maNV thay đổi trạng thái tài khoản $user sang ";
    if((int)$trangthai == 1){
        $log .= "Hoạt Động";
    }
    else{
        $log .= "Bị Khóa";
    }
    $logqry = "INSERT INTO `lognhanvien`(`MaNhanVIen`, `NoiDung`) VALUES ($maNV,$log);";
    if(mysqli_multi_query($conn,$qry.$logqry)){
        echo 1;
    }
    else{
        echo mysqli_error($conn);
    }
?>