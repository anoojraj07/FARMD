<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "FarmD";

    $conn = mysqli_connect($dbHost ,$dbUser ,$dbPass ,$dbName);

    if($conn) {

    }else {
        die("Database Connection Failed!");
    }
?>