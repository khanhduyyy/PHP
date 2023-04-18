<?php
    include '../../Database/Connection.php';
    $data = getData(getResultSQL('select * from khachhang'));
    
    echo '<table id="view_account" class="styled-table">
    <thead>
        <tr>
            <th style ="width : 1.5rem;">Mã Khách Hàng</th>
            <th style ="width : 8rem;">Tên Khách Hàng</th>
            <th style ="width : 18rem;">Địa Chỉ</th>
            <th style ="width : 6rem;">SĐT</th>
        </tr>
    </thead>';

    for ($i = 0; $i < count($data); $i++) {
        echo '<tbody><tr>
        <td>'.$data[$i]['MaKhachHang'].'</td>
        <td>'.$data[$i]['TenKhachHang'].'</td>
        <td>'.$data[$i]['DiaChi'].'</td>
        <td>'.$data[$i]['SDT'].'</td>
        </tr></tbody>';
    }
    echo '</table>';
?>