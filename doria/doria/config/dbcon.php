<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "profn";

    // connection login f database
    $con = mysqli_connect($host,$username,$password, $database);

    // check la cnx
    if(!$con){
        die("Connection failed ". mysqli_connect_error());
    }


?>