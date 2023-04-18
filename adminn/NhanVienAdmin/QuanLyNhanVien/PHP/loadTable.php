<?php
    include '../../../Database/Connection.php';
    $conn = getConnection();
    $qry = "select * from nhanvien";
    $data = getData(getResultSQL($qry));
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
    echo '</table>';
?>