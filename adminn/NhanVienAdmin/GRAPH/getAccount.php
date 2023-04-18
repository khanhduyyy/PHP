<?php
    include '../../Database/Connection.php';
    $data = getData(getResultSQL("select * from taikhoan"));
    echo json_encode($data);
?>