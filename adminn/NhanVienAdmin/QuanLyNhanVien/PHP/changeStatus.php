<?php
    include '../../../Database/Connection.php';
    $conn = getConnection();
    $id = $_POST['id'];
    $status = $_POST['status'];
    $qry = "UPDATE `nhanvien` SET `TrangThai`= $status WHERE `MaNhanVien` = $id;";
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('m/d/Y h:i:s a');
    session_start();
    $maNV = $_SESSION['MaNhanVien'];

    $log = "[$thoigian] Nhân Viên $maNV thay đổi trạng thái tài khoản $id sang ";
    if((int)$status == 1){
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