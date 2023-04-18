<?php
    include '../../../Database/Connection.php';
    $data = getDataAccount();
    $dataKH = getNameCustomer();


    echo '<table id="view_account" class="styled-table">
            <thead>
                <tr>
                    <th style ="width : 1.5rem;">Mã Người Dùng</th>
                    <th style ="width : 12rem;">Tên Người Dùng</th>
                    <th style ="width : 10rem;">Tên Đăng Nhập</th>
                    <th style ="width : 10rem;">Chức Vụ</th>
                    <th style ="width : 10rem;">Trang Thái</th>
                </tr>
            </thead>';

    foreach($data as $value){
        $nameCus = "";
        foreach($dataKH as $valueKH){
            if($value['MaKhachHang'] == $valueKH['MaKhachHang']){
                $nameCus = $valueKH['TenKhachHang'];
                break;
            }
        }

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

    echo '</table>';

    function getDataAccount(){
        $resultSet = getResultSQL("select * from taikhoan");
        $data = getData($resultSet);
        return $data;
    }
    
    function getNameCustomer(){
        $resultSetKH = getResultSQL("select MaKhachHang,TenKhachHang from khachhang");
        $dataKH = getData($resultSetKH);
        return $dataKH;
    }

    function getAllStaffAccount(){
        $resultSetKH = getResultSQL("select * from nhanvien");
        $dataKH = getData($resultSetKH);
        return $dataKH;
    }


?>