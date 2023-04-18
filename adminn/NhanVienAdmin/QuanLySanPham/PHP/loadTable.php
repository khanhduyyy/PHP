<?php
    include '../../../Database/Connection.php';
    $result = getResultSQL('select * from trangsuc');
    $data = getData($result);

    echo '<table id="view_product" class="styled-table">
            <thead>
                <tr>
                    <th style ="width : 1.5rem;">Mã Trang Sức</th>
                    <th style ="width : 20rem;">Tên Trang Sức</th>
                    <th style ="width : 8rem;">Loại</th>
                    <th style ="width : 24rem;">Chất liệu</th>
                    <th style ="width : 4rem;">Màu</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>% Giảm Giá</th>
                    <th style ="width : 8rem;">Hình Ảnh</th>
                </tr>
            </thead>';
        //Get product
        for ($i = 0; $i < count($data); $i++) {
            if($data[$i]['TrangThai'] == 0){
                continue;
            }
            $Maloai = $data[$i]['MaLoai'];
            $src = "..\\..\\..\\..\\img_product\\";
            switch ($Maloai) {
                case 1:
                case '1': {
                        $Tenloai = 'Dây Chuyền';
                        break;
                    }
                case 2:
                case '2': {
                        $Tenloai = 'Vòng Tay';
                        break;
                    }
                case 3:
                case '3': {
                        $Tenloai = 'Nhẫn';
                        break;
                    }
                case 4:
                case '4': {
                        $Tenloai = 'Khuyên Tai';
                        break;
                    }
            }
            
            echo '<tbody>
            <tr>
                <td>' . $data[$i]['MaTrangSuc'] . '</td>
                <td>' . $data[$i]['TenTrangSuc'] . '</td>
                <td>' . $Tenloai . '</td>
                <td>' . $data[$i]['ChatLieu'] . '</td>
                <td>' . $data[$i]['Mau'] . '</td>
                <td>' . $data[$i]['Gia'] . '</td>
                <td>' . $data[$i]['SoLuong'] . '</td>
                <td>'.$data[$i]['PhanTramGiam'].'</td>
                <td><img src="'.$src.$data[$i]['HinhAnh'].'" alt="logo" style="width : 64px"></td>
                
            </tr></tbody>';
        }


        echo '</table>';
?>