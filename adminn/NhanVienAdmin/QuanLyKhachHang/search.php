<?php
    include '../../Database/Connection.php';
    $data = getData(getResultSQL('select * from khachhang'));

    $type = $_POST['value'];
    $content = convertStringToEnglish($_POST['content']);

    echo '<table id="view_account" class="styled-table">
    <thead>
        <tr>
            <th style ="width : 1.5rem;">Mã Khách Hàng</th>
            <th style ="width : 8rem;">Tên Khách Hàng</th>
            <th style ="width : 18rem;">Địa Chỉ</th>
            <th style ="width : 6rem;">SĐT</th>
        </tr>
    </thead>';

    for ($i = 0;$i < count($data);$i++){
        $tmp = "";
        if($type == 1){
            $tmp = convertStringToEnglish($data[$i]['TenKhachHang']);
        }
        else if($type == 2){
            $tmp = convertStringToEnglish($data[$i]['SDT']);
        }
        else if($type == 3){
            $tmp = convertStringToEnglish($data[$i]['DiaChi']);
        }

        if(str_contains($tmp,$content) == false) continue;

        echo '<tbody><tr>
        <td>'.$data[$i]['MaKhachHang'].'</td>
        <td>'.$data[$i]['TenKhachHang'].'</td>
        <td>'.$data[$i]['DiaChi'].'</td>
        <td>'.$data[$i]['SDT'].'</td>
        </tr></tbody>';
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