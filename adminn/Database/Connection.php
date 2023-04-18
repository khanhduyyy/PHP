<?php
    function getData($rs){
        $data = array();

        if (mysqli_num_rows($rs) <= 0) {
            
        } else {

            while ($row = mysqli_fetch_assoc($rs)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    function getResultSQL($qry)
    { 
        $conn = getConnection();
        return mysqli_query($conn, $qry);
    }

    function getConnection(){
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "cuahangtrangsuc";
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("Connect failed: %s\n" . $conn->error);
        return $conn;
    }

    function sqlUpdate($qry){
        $conn = getConnection();
        if(mysqli_query($conn,$qry)){
            return true;
        }
        return false;
    }
?>