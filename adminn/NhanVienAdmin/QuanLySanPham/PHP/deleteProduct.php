<?php
    include '../../../Database/Connection.php';
    $conn = getConnection();

    session_start();
    $manv = 0;

    if (isset($_SESSION['MaNhanVien'])) {
        $manv = $_SESSION['MaNhanVien'];
    }

    $id = $_POST['id'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('m/d/Y h:i:s a');
    $qry = "UPDATE `trangsuc` SET `TrangThai`=false WHERE `MaTrangSuc` = $id;";
    $logqry = "INSERT INTO `lognhanvien`(`MaNhanVien`, `NoiDung`) VALUES ($manv,'[$thoigian]Xóa sản phẩm có mã =  $id');";

    if (mysqli_multi_query($conn, $qry.$logqry)) {
        echo 1;
    } else {
        echo mysqli_error($conn);
    }
?>