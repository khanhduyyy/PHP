<?php
    include '../../Database/Connection.php';
    $data = getData(getResultSQL("select * from chitiethoadon"));
    echo json_encode($data);
?>