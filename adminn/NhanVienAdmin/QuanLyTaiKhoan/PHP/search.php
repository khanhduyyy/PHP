<?php
    include '../../../Database/Connection.php';
    $type = $_POST['typeS'];
    $content = $_POST['contentS'];

    $dataAccount= getData(getResultSQL('select * from taikhoan'));
    $dataCus= getData(getResultSQL('select * from khachhang'));

    echo '<table id="view_account" class="styled-table">
       <thead>
           <tr>
               <th style ="width : 1.5rem;">Mã Khách Hàng</th>
               <th style ="width : 12rem;">Tên Khách Hàng</th>
               <th style ="width : 12rem;">Tên Đăng Nhập</th>
               <th style ="width : 8rem;">Lần cuối sử dụng</th>
               <th style ="width : 6rem;">Chức năng</th>
           </tr>
       </thead>';

    if ($type == 1) {
        foreach($dataAccount as $value){
           
                $nameCus = "";
                foreach($dataCus as $valueKH){
                    if($value['MaKhachHang'] == $valueKH['MaKhachHang']){
                        $nameCus = $valueKH['TenKhachHang'];
                        break;
                    }
                }

                $root = convertStringToEnglish($nameCus);
                $lead = convertStringToEnglish($content);
                if(str_contains($root,$lead) == false) continue;
        
                $tenChucVu = "";
                switch((int)$value['MaQuyen']){
                    case 1:{
                        $tenChucVu = "Admin";
                        break;
                    }
                    case 2:{
                        $tenChucVu = "Bán Hàng";
                        break;
                    }
                    case 3:{
                        $tenChucVu = "Khách Hàng";
                        break;
                    }
                }
        
                echo '<tbody>
                    <tr>
                        <td>' . $value['MaKhachHang'] . '</td>
                        <td>'.$nameCus.'</td>
                        <td>' . $value['TenDangNhap'] . '</td>
                        <td>' . $tenChucVu . '</td>';
                if($value['TrangThai'] == 1){
                    echo "<td>
                            <select style='width:80%;margin-left:10%;' onchange = 'changeStatusAccount(\"". $value['TenDangNhap'] . "\",0);'>
                                <option>Hoạt Động</option>
                                <option>Bị Khóa</option>
                            </select>
                        </td>                
                    </tr></tbody>";
                }
                else{
                    echo "<td>
                    <select style='width:80%;margin-left:10%;' onchange = 'changeStatusAccount(\"". $value['TenDangNhap'] . "\",1);'>
                        <option>Bị Khóa</option>
                        <option>Hoạt Động</option>
                    </select>
                </td>                
            </tr></tbody>";
                }
        }
    }
    
    else{
        foreach($dataAccount as $value){
            
            $nameCus = "";
            foreach($dataCus as $valueKH){
                if($value['MaKhachHang'] == $valueKH['MaKhachHang']){
                    $nameCus = $valueKH['TenKhachHang'];
                    break;
                }
            }
                $root = convertStringToEnglish($value['TenDangNhap']);
                $lead = convertStringToEnglish($content);
                if(str_contains($root,$lead) == false) continue;
        
                $tenChucVu = "";
                switch((int)$value['MaQuyen']){
                    case 1:{
                        $tenChucVu = "Admin";
                        break;
                    }
                    case 2:{
                        $tenChucVu = "Bán Hàng";
                        break;
                    }
                    case 3:{
                        $tenChucVu = "Khách Hàng";
                        break;
                    }
                }
        
                echo '<tbody>
                    <tr>
                        <td>' . $value['MaKhachHang'] . '</td>
                        <td>'.$nameCus.'</td>
                        <td>' . $value['TenDangNhap'] . '</td>
                        <td>' . $tenChucVu . '</td>';
                if($value['TrangThai'] == 1){
                    echo "<td>
                            <select style='width:80%;margin-left:10%;' onchange = 'changeStatusAccount(\"". $value['TenDangNhap'] . "\",0);'>
                                <option>Hoạt Động</option>
                                <option>Bị Khóa</option>
                            </select>
                        </td>                
                    </tr></tbody>";
                }
                else{
                    echo "<td>
                    <select style='width:80%;margin-left:10%;' onchange = 'changeStatusAccount(\"". $value['TenDangNhap'] . "\",1);'>
                        <option>Bị Khóa</option>
                        <option>Hoạt Động</option>
                    </select>
                </td>                
            </tr></tbody>";
                }
                        
        }
        
    }
    echo '</table><div><button onclick="loadAllAccount();" style=";color:red;border-radius:0.5rem;margin-left:5%;font-size:1.5rem;border:2px solid black;background-color: white;width:90%;text-align:center;">Hủy tìm kiếm</button></div>';

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