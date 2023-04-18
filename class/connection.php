<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database= "cuahangtrangsuc";    $conn= new mysqli($servername, $username, $password, $database);
    #header("Content-type: text/html; charset=utf-8");
    mysqli_set_charset($conn, 'UTF8');
    if($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    /*else
    	echo "Success";*/
 ?>
