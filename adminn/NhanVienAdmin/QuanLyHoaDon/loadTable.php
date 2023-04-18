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
    echo '</table>';
?>