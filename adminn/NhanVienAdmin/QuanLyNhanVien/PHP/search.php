<?php
    include '../../../Database/Connection.php';
    $data = getData(getResultSQL('select * from nhanvien'));
    $type = $_POST['typeS'];
    $content = $_POST['content'];
    session_start();
    $maNV = 0;
        if(isset($_SESSION['MaNhanVien'])){
            $maNV = $_SESSION['MaNhanVien'];
        }
    echo '<table id="view_product" class="styled-table">
            <thead>
                <tr>
                    <th style="width:2rem">Mã Nhân Viên</th>
                    <th>Tên Nhân Viên</th>
                    <th style="width:4rem">Ngày Sinh</th>
                    <th style="width:18rem">Địa Chỉ</th>
                    <th>SĐT</th>
                    <th style="width:2rem">Hệ Số Lương</th>
                    <th style="width:6rem">Tên Đăng Nhập</th>
                    <th>Quyền</th>
                    <th>Trạng Thái</th>
                </tr>
            </thead>';
    foreach($data as $value){
        $rootContent = "";
        switch((int)$type){
            case 1:{
                $rootContent = $value['TenNhanVien'];
                break;
            }
            case 2:{
                $rootContent = $value['NgaySinh'];
                break;
            }
            case 3:{
                $rootContent = $value['DiaChi'];
                break;
            }
            case 4:{
                $rootContent = $value['SDT'];
                break;
            }
            case 5:{
                $rootContent = $value['TenDangNhap'];
                break;
            }
        }
        $rootContent = convertStringToEnglish($rootContent);
        $content = convertStringToEnglish(($content));
        if(str_contains($rootContent,$content) == false) continue;
        $TenQuyen = "";
        switch((int)$value['MaQuyen']){
            case 1:{
                $TenQuyen = "Admin";
                break;
            }
            case 2:{
                $TenQuyen = "Bán Hàng";
                break;
            }
        }

        echo '<tbody>
            <tr>
                <td>' . $value['MaNhanVien'] . '</td>
                <td>' . $value['TenNhanVien'] . '</td>
                <td>' . $value['NgaySinh'] . '</td>
                <td>' . $value['DiaChi'] . '</td>
                <td>' . $value['SDT'] . '</td>
                <td>' . $value['HeSoLuong'] . '</td>
                <td>' . $value['TenDangNhap'] . '</td>
                <td>'.$TenQuyen.'</td>
                <td>';
        
        if($value['TrangThai'] == 1){
            if($maNV == $value['MaNhanVien']){
                echo '<select onchange = "changeStatusStaff('.$value['MaNhanVien'].',0)" disabled>';
            }
            else{
                echo '<select onchange = "changeStatusStaff('.$value['MaNhanVien'].',0)">';
            }
            
            echo '<option>Hoạt Động</option>
            <option>Đã Khóa</option>
        </select>';
        }
        else{
            if($maNV == $value['MaNhanVien']){
                echo '<select onchange = "changeStatusStaff('.$value['MaNhanVien'].',1)" disabled>';
            }
            else{
                echo '<select onchange = "changeStatusStaff('.$value['MaNhanVien'].',1)">';
            }
            echo '<option>Đã Khóa</option>
            <option>Hoạt Động</option>
        </select>';
        }       
                
                
            echo '</td></tr></tbody>';
    }
    echo '</table><div><button onclick="loadAllStaff();" style=";color:red;border-radius:0.5rem;margin-left:5%;font-size:1.5rem;border:2px solid black;background-color: white;width:90%;text-align:center;">Hủy tìm kiếm</button></div>';



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