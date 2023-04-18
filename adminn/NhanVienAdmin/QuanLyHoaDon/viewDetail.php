<?php
    include '../../Database/Connection.php';
    $id = $_POST['id'];
    $dataBill = getData(getResultSQL('select * from hoadon'));
    $dataDetail = getData(getResultSQL('select * from chitiethoadon'));
    $dataProduct = getData(getResultSQL('select * from trangsuc'));
    $dataCus = getData(getResultSQL('select * from khachhang'));
    $indexBill = -1;
    $sum = 0;
    $tinhtrang = 0;
    $mahuyenmai = 0;
    $phantram = 0;
    $hinhanh = "";

    //Tìm index của hóa đơn
    for($i = 0;$i < count($dataBill);$i++){
        if($dataBill[$i]['MaHoaDon'] == $id){
            $indexBill = $id;
            $tinhtrang = $dataBill[$i]['TinhTrang'];
            $makhuyenmai = $dataBill[$i]['MaKhuyenMai'];
            break;
        }
    }

    //Lay % khuyen mai
    if($makhuyenmai != 0){
        $datatmp = getData(getResultSQL('select * from khuyenmai'));
        foreach($datatmp as $value){
            if($value['MaKhuyenMai'] == $makhuyenmai){
                $phantram = $value['PhanTramGiam'];
                break;
            }
        }
    }



    echo '<div class="background" id="formDetailBill">
        <div class="defaultForm" style="padding-bottom: 2rem;">
        <h1>CHI TIẾT HÓA ĐƠN</h1>
        <div class="detailBillContent">';
    //Xuất chi tiết
    for($i = 0;$i < count($dataDetail);$i++){
        if ($dataDetail[$i]['MaHoaDon'] != $id) continue;
        $nameProduct = "";
        $decreasePercent = 0;
        $hinhanh = $dataDetail[$i]['HinhAnh'];
        foreach ($dataProduct as $value) {
            if ($value['MaTrangSuc'] == $dataDetail[$i]['MaTrangSuc']) {
                $nameProduct = $value['TenTrangSuc'];
                $decreasePercent = $value['PhanTramGiam'];
                $hinhanh = $value['HinhAnh'];
                break;
            }
        }
        

        echo '<div class="detailBillSubContent">
            <img src="../../../img_product/' . $hinhanh . '" alt="" srcset="">
            <h5>' . $nameProduct . '</h5>
            <h5 style="float: left;margin-left: 0;">Số Lượng : ' . $dataDetail[$i]['SoLuong'] . '</h5>
            <h5 style="float: left;margin-left: 0;">Giá : ' . convetNumberToMoney($dataDetail[$i]['Gia']) . '</h5>
            <h5>% Giảm :-' . $decreasePercent . '%</h5>
            <h5 style="color: red;">Thành Tiền : ' . convetNumberToMoney($dataDetail[$i]['SoLuong'] * $dataDetail[$i]['Gia'] * (1 - $decreasePercent / 100.0)) . '</h5>
        </div>';
        $sum += ($dataDetail[$i]['SoLuong'] * $dataDetail[$i]['Gia'] * (1 - $decreasePercent / 100.0));
    }

    //Kiểm tra xem có mã khuyen mai hay ko ?
    if($phantram == 0){    
        echo '</div>
                <h3 style="color:red;font-weight:900;">Tổng Tiền :' . convetNumberToMoney($sum) . '</h3>
                </div>
                <button class="designbtn" onclick = "closeViewDetail();">Đóng</button>';
        if ($tinhtrang == 1) {
            echo '<button class="designbtn" onclick = "submitReceive(' . $id . ');" style ="margin-right:0;background-color:#009879;">Đã nhận được</button>';
        }
        echo '</div>';
    }
    else{
        echo '</div>
                <h3 style="color:red;font-weight:900;">Tổng Tiền :' . convetNumberToMoney($sum*(1-$phantram/100.0)) . '(<del>' . convetNumberToMoney($sum). '</del>)</h3>
                </div>
                <button class="designbtn" onclick = "closeViewDetail();">Đóng</button>';
        if ($tinhtrang == 0) {
            echo '<button class="designbtn" onclick = "submitReceive(' . $id . ');" style ="margin-right:0;background-color:#009879;">Xác nhận</button>';
        }
        echo '</div>';
    }


function convetNumberToMoney($number)
{
    $i = strlen($number) - 1;
    $result =  "";

    while ($i >= 0) {
        while ($i - 3 >= 0) {
            $result = "." . substr($number, $i - 2, 3) . $result;
            $i -= 3;
        }
        if ($i >= 0) {
            $result =  substr($number, 0, $i + 1) . $result;
            break;
        }
    }
    return $result;
}
?>
