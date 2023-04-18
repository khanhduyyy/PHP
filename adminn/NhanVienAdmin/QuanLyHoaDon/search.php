<?php
    include '../../Database/Connection.php';
    $data = getData(getResultSQL('select * from hoadon'));
    $dataCus = getData(getResultSQL('select * from khachhang'));

    echo '<table id="view_account" class="styled-table">
    <thead>
        <tr>
            <th style ="width : 1.5rem;">Mã Hóa Đơn</th>
            <th style ="width : 8rem;">Tên Khách Hàng</th>
            <th style ="width : 18rem;">Địa Chỉ</th>
            <th style ="width : 6rem;">Ngày Lập</th>
            <th style ="width : 6rem;">Giờ Lập</th>
            <th style ="width : 5rem;">Trạng thái</th>
            <th style ="width : 6rem;">Chi Tiết</th>
        </tr>
    </thead>';

    $type = $_POST['value'];
    $content = "";
    if($type == 1){
        $content = convertStringToEnglish($_POST['content']);
        
        for ($i = 0; $i < count($data); $i++) {
            $nameCus = "";
            $status = "";
            $address = "";
            foreach ($dataCus as $value) {
                if ($data[$i]['MaKhachHang'] == $value['MaKhachHang']) {
                    $nameCus = $value['TenKhachHang'];
                    $address = $value['DiaChi'];
                    break;
                }
            }
            $tmp = convertStringToEnglish($nameCus);
            if(str_contains($tmp,$content) == false) continue;
    
            switch ((int)$data[$i]['TinhTrang']) {
                case 0: {
                    $status = "Chờ Xác Nhận";
                    break;
                }
                case 1: {
                    $status = "Đã Xác Nhận";
                    break;
                }
                case 2: {
                    $status = "Đã Nhận Được";
                    break;
                }
            }
    
    
            echo '<tbody><tr>
            <td>'.$data[$i]['MaHoaDon'].'</td>
            <td>'.$nameCus.'</td>
            <td>'.$address.'</td>
            <td>'.$data[$i]['NgayLap'].'</td>     
            <td>'.$data[$i]['GioLap'].'</td>
            <td>'.$status.'</td>
            <td><button style="background-color: rgb(243, 73, 73);color: white;" onclick="viewDetail('.$data[$i]['MaHoaDon'].');">Xem Chi Tiết</button></td>
            </tr></tbody>';
        }
    }
    else if($type == 2){
        $content = $_POST['contentDate'];
        for ($i = 0; $i < count($data); $i++) {
            $nameCus = "";
            $status = "";
            $address = "";
            foreach ($dataCus as $value) {
                if ($data[$i]['MaKhachHang'] == $value['MaKhachHang']) {
                    $nameCus = $value['TenKhachHang'];
                    $address = $value['DiaChi'];
                    break;
                }
            }
            if($data[$i]['NgayLap'] != $content) continue;
    
            switch ((int)$data[$i]['TinhTrang']) {
                case 0: {
                    $status = "Chờ Xác Nhận";
                    break;
                }
                case 1: {
                    $status = "Đã Xác Nhận";
                    break;
                }
                case 2: {
                    $status = "Đã Nhận Được";
                    break;
                }
            }
    
    
            echo '<tbody><tr>
            <td>'.$data[$i]['MaHoaDon'].'</td>
            <td>'.$nameCus.'</td>
            <td>'.$address.'</td>
            <td>'.$data[$i]['NgayLap'].'</td>     
            <td>'.$data[$i]['GioLap'].'</td>
            <td>'.$status.'</td>
            <td><button style="background-color: rgb(243, 73, 73);color: white;" onclick="viewDetail('.$data[$i]['MaHoaDon'].');">Xem Chi Tiết</button></td>
            </tr></tbody>';
        }
    }
    else if($type == 3){
        $content = convertStringToEnglish($_POST['content']);
        
        for ($i = 0; $i < count($data); $i++) {
            $nameCus = "";
            $status = "";
            $address = "";
            foreach ($dataCus as $value) {
                if ($data[$i]['MaKhachHang'] == $value['MaKhachHang']) {
                    $nameCus = $value['TenKhachHang'];
                    $address = $value['DiaChi'];
                    break;
                }
            }
            $tmp = convertStringToEnglish($address);
            if(str_contains($tmp,$content) == false) continue;
    
            switch ((int)$data[$i]['TinhTrang']) {
                case 0: {
                    $status = "Chờ Xác Nhận";
                    break;
                }
                case 1: {
                    $status = "Đã Xác Nhận";
                    break;
                }
                case 2: {
                    $status = "Đã Nhận Được";
                    break;
                }
            }
    
    
            echo '<tbody><tr>
            <td>'.$data[$i]['MaHoaDon'].'</td>
            <td>'.$nameCus.'</td>
            <td>'.$address.'</td>
            <td>'.$data[$i]['NgayLap'].'</td>     
            <td>'.$data[$i]['GioLap'].'</td>
            <td>'.$status.'</td>
            <td><button style="background-color: rgb(243, 73, 73);color: white;" onclick="viewDetail('.$data[$i]['MaHoaDon'].');">Xem Chi Tiết</button></td>
            </tr></tbody>';
        }
    }
    else if($type == 4){
        $content = $_POST['contentType'] - 1;

        for ($i = 0; $i < count($data); $i++) {
            $nameCus = "";
            $status = "";
            $address = "";
            foreach ($dataCus as $value) {
                if ($data[$i]['MaKhachHang'] == $value['MaKhachHang']) {
                    $nameCus = $value['TenKhachHang'];
                    $address = $value['DiaChi'];
                    break;
                }
            }
            $tmp = convertStringToEnglish($address);
            if($content != $data[$i]['TinhTrang']) continue;
    
            switch ((int)$data[$i]['TinhTrang']) {
                case 0: {
                    $status = "Chờ Xác Nhận";
                    break;
                }
                case 1: {
                    $status = "Đã Xác Nhận";
                    break;
                }
                case 2: {
                    $status = "Đã Nhận Được";
                    break;
                }
            }
    
    
            echo '<tbody><tr>
            <td>'.$data[$i]['MaHoaDon'].'</td>
            <td>'.$nameCus.'</td>
            <td>'.$address.'</td>
            <td>'.$data[$i]['NgayLap'].'</td>     
            <td>'.$data[$i]['GioLap'].'</td>
            <td>'.$status.'</td>
            <td><button style="background-color: rgb(243, 73, 73);color: white;" onclick="viewDetail('.$data[$i]['MaHoaDon'].');">Xem Chi Tiết</button></td>
            </tr></tbody>';
        }        
    }


    echo '</table><div><button onclick="loadAll();" style=";color:red;border-radius:0.5rem;margin-left:5%;font-size:1.5rem;border:2px solid black;background-color: white;width:90%;text-align:center;">Hủy tìm kiếm</button></div>';







    function convertStringToEnglish($dataString) {
        $aVN = ["á", "à", "ả", "ã", "ạ", "ắ", "ằ", "ẳ", "ẵ", "ặ", "ă", "â", "ấ", "ầ", "ẩ", "ẫ", "ậ"];
        $dVN = ["đ"];
        $eVN = ["é", "è", "ẻ", "ẽ", "ẹ", "ê", "ế", "ề", "ể", "ễ", "ệ"];
        $iVN = ["í", "ì", "ỉ", "ĩ", "ị"];
        $oVN = ["ó", "ò", "ỏ", "õ", "ọ", "ô", "ố", "ồ", "ổ", "ỗ", "ộ", "ơ", "ớ", "ờ", "ở", "ỡ", "ợ"];
        $uVN = ["ú", "ù", "ủ", "ũ", "ụ", "ư", "ứ", "ừ", "ử", "ữ", "ự"];
        $yVN = ["ý", "ỳ", "ỷ", "ỹ", "ỵ"];
    
        for ($i = 0; $i < strlen($dataString); $i++) {
            $dataString = str_replace($aVN,"a",$dataString);
            $dataString = str_replace($dVN,"d",$dataString);
            $dataString = str_replace($eVN,"e",$dataString);
            $dataString = str_replace($iVN,"i",$dataString);
            $dataString = str_replace($oVN,"o",$dataString);
            $dataString = str_replace($uVN,"u",$dataString);
            $dataString = str_replace($yVN,"y",$dataString);
        }
        $dataString = str_replace(" ","",$dataString);
        return strtolower($dataString);
    }
?>