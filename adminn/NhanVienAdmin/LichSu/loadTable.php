<?php
    session_start();
include '../../Database/Connection.php';

    $data = getData(getResultSQL('select * from lognhanvien'));
    $dataNV = getData(getResultSQL('select * from nhanvien'));

    echo '<table id="view_account" class="styled-table">
    <thead>
        <tr>
            <th style ="width : 1.5rem;">Mã Log</th>
            <th style ="width : 2rem;">Mã nhân viên</th>
            <th style ="width : 9rem;">Tên nhân viên</th>
            <th style ="width : 26rem;">Nội dung</th>
        </tr>
    </thead>';

    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';

    foreach($data as $value){
        $nameNV = "";
        foreach($dataNV as $valueNV){
            if($valueNV['MaNhanVien'] == $_SESSION['MaNhanVien']){
                $nameNV = $valueNV['TenNhanVien'];
                break;
            }
            
        }

        echo '<tbody><tr>
        <td>'.$value['MaLog'].'</td>
        <td>'.$_SESSION['MaNhanVien'].'</td>
        <td>'.$nameNV.'</td>
        <td>'.$value['NoiDung'].'</td>
        </tr></tbody>';
    }

    echo '</table>';
?>