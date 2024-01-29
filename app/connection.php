<?php

    error_reporting(0);

    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "employeedata";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if($conn){
        //echo "connection ok";
    }
    else{
        echo "connection failed".mysqli_connect_error();
    }
?>