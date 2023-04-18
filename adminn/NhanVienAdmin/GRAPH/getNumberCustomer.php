<?php
    include '../../Database/Connection.php';
    $data = getData(getResultSQL("select * from khachhang"));
    echo json_encode($data);
?>