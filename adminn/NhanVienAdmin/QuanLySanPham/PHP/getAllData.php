<?php
    include '../../../Database/Connection.php';
    $data = getData(getResultSQL('select * from trangsuc'));
    echo json_encode($data);
?>