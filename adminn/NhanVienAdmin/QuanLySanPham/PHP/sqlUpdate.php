<?php
    include '../../../Database/Connection.php';
    include '../../../PHP/copyImage.php';
    $type = $_POST['typeOfChoise'];
    

    if($type == 1){
        insertNewProduct();
    }
    else if($type == 2){
        updateNumber();
    }


    function insertNewProduct(){
        session_start();
        $manv = 0;
    
        if(isset($_SESSION['MaNhanVien'])){
            $manv = $_SESSION['MaNhanVien'];
        }
        $data = getData(getResultSQL('select * from trangsuc'));
        $conn = getConnection();
        $destination = "../../../../img_product/";

        $Id = $data[count($data) - 1]['MaTrangSuc'] + 1;
        $tensp = $_POST['tensp'];
        $giasp = $_POST['gia'];
        $maloai = $_POST['maloai'];
        $chatlieusp = $_POST['chatlieu'];
        $soluongsp = (int)$_POST['soluong'];
        $mausp = $_POST['mau'];
        $hinhanhsp = $_POST['hinhanh'];
        $phantramgiam = (int)$_POST['giam'];

        //Di chuyển hình ảnh đến web server
        $nameImage = copyImageToServer($hinhanhsp, $destination);
        //Create New Page Info
        include '../../../createDetailPage.php';
        createPage($Id,$tensp,$giasp,$chatlieusp,$mausp,$nameImage);
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $thoigian = date('m/d/Y h:i:s a');
        $qry = "INSERT INTO `trangsuc`(`MaTrangSuc`, `TenTrangSuc`, `Gia`, `MaLoai`, `ChatLieu`, `SoLuong`, `Mau`, `HinhAnh`,`PhanTramGiam`,`TrangThai`)
        VALUES ($Id,'$tensp',$giasp,$maloai,'$chatlieusp',$soluongsp,'$mausp','$nameImage',$phantramgiam,true);";
        $logqry = "INSERT INTO `lognhanvien`(`MaNhanVIen`, `NoiDung`) VALUES ($manv,'[$thoigian]Thêm sản phẩm $tensp');";
        if (mysqli_multi_query($conn, $qry.$logqry)) {
            echo 1;
        } else {
            echo mysqli_error($conn);
        }

    }

    function updateNumber()
    {
        session_start();
        $manv = 0;
    
        if(isset($_SESSION['MaNhanVien'])){
            $manv = $_SESSION['MaNhanVien'];
        }
        $conn = getConnection();
        $data = getData(getResultSQL('select * from trangsuc'));
        $id = $_POST['id'];
        $numberAdd = $_POST['numberAdd'];

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['MaTrangSuc'] == $id) {
                $numberAdd += $data[$i]['SoLuong'];
                break;
            }
        }
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $thoigian = date('m/d/Y h:i:s a');
        $qry = "UPDATE `trangsuc` SET
        `SoLuong` = $numberAdd
        WHERE MaTrangSuc = $id;";
        $logqry = "INSERT INTO `lognhanvien`(`MaNhanVIen`, `NoiDung`) VALUES ($manv,'[$thoigian]Thêm $numberAdd cho sản phẩm có mã =  $id');";
        if (mysqli_multi_query($conn, $qry.$logqry)) {
            echo 1;
        } else {
            echo mysqli_error($conn);
        }
    }
?>