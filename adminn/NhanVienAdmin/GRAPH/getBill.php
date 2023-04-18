<?php
    include '../../Database/Connection.php';
    $data = getData(getResultSQL("select * from hoadon"));
    echo json_encode($data);
?>