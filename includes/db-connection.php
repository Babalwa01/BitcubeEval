<?php
    //Server name; Username and password for the database; and name of database
    $dbServerName = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "website";

    //database connection
    $conn = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);

    //error message if connection is unsuccessful
    if(!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }
