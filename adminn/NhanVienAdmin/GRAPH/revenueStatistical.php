<?php
    include '../../Database/Connection.php';
    $year = $_POST['year'];
    $dataBills = getData(getResultSQL("select * from hoadon"));
    $dataBillDetails = getData(getResultSQL("select * from chitiethoadon"));

    $sumOfMounth = [];

    for ($i = 0;$i < count($dataBills);$i++){
        $yearDB = (int)substr($dataBills[$i]['NgayLap'],0,4);
        if($yearDB != $year){
            continue;
        }
        $month = (int)substr($dataBills[$i]['NgayLap'],5,2) - 1;
        $idBill = $dataBills[$i]['MaHoaDon'];
        $sum = 0;
        foreach ($dataBillDetails as $tmp){
            if($tmp['MaHoaDon'] == $idBill){
                $sum += $tmp['SoLuong']*$tmp['Gia'];
            }
        }
        array_push($sumOfMounth,array($month, $sum));
    }
    echo json_encode($sumOfMounth);
?>