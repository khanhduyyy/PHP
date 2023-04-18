<?php
    include '../../../Database/Connection.php';
    $conn = getConnection();

   
    

    $Id = $_POST['masp'];
    $tensp = $_POST['tensp'];
    $giasp = $_POST['giasp'];
    $maloaisp = $_POST['maloaisp'];
    $chatlieusp = $_POST['chatlieusp'];
    $mausp = $_POST['mausp'];
    $hinhanhsp = $_POST['hinhanhsp'];
    $phamtramgiam = $_POST['phamtramgiam'];

    $data = getData(getResultSQL('select * from trangsuc'));
    $index = -1;

    for($i = 0;$i < count($data);$i++){
        if($data[$i]['MaTrangSuc'] == $Id){
            $index = $i;
            break;
        }
    }

    session_start();
    $manv = 0;

    if (isset($_SESSION['MaNhanVien'])) {
        $manv = $_SESSION['MaNhanVien'];
    }
    $qry = "";
    if($hinhanhsp==""){
        //Create New Page Info
        include '../../../createDetailPage.php';
        createPage($Id,$tensp,$giasp,$chatlieusp,$mausp,$data[$index]['HinhAnh']);
        $qry = "UPDATE `trangsuc` SET
         `TenTrangSuc`='$tensp',
         `Gia`= $giasp,
         `MaLoai`= $maloaisp,
         `ChatLieu`='$chatlieusp',
         `Mau`='$mausp',
         `PhanTramGiam` = $phamtramgiam 
         WHERE MaTrangSuc = $Id;";
    }
    else{
        $destination = "../../../../img_product/";
        
        
        include '../../../PHP/copyImage.php';
        $conn = getConnection();
        $nameImage = copyImageToServer($hinhanhsp,$destination);
        //Create New Page Info
        include '../../../createDetailPage.php';
        createPage($Id,$tensp,$giasp,$chatlieusp,$mausp,$nameImage);
        $qry = "UPDATE `trangsuc` SET
         `TenTrangSuc`='$tensp',
         `Gia`= $giasp,
         `MaLoai`= $maloaisp,
         `ChatLieu`='$chatlieusp',
         `Mau`='$mausp',
         `HinhAnh` = '$nameImage'
         WHERE MaTrangSuc = $Id;";
        
    }
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $thoigian = date('m/d/Y h:i:s a');
    $logqry = "INSERT INTO `lognhanvien`(`MaNhanVIen`, `NoiDung`) VALUES ($manv,'[$thoigian]Sửa sản phẩm  $tensp');";
    
    if(mysqli_multi_query($conn,$qry.$logqry)){
        echo 1;
    }
    else{
        echo mysqli_error($conn);
    }
?>