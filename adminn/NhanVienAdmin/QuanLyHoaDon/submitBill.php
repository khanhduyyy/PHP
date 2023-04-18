<?php
    session_start();
    $manv = $_SESSION['MaNhanVien'];
    include '../../Database/Connection.php';
    $id  = $_POST['id'];
    $conn = getConnection();
    $qry = "UPDATE `hoadon` SET `MaNhanVien`= ".$manv.",`TinhTrang`= 1 WHERE `MaHoaDon` = ".$id.";";

    if(mysqli_query($conn,$qry)){
        echo 1;
    }
    else{
        echo mysqli_error($conn);
    }
?>