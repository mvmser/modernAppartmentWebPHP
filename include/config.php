<?php
    $host="localhost";
    $user="xxx";
    $password="xxx";
    $database = "xxx";
    $conn = new mysqli($host, $user, $password, $database);

    if($conn->connect_errno > 0)
    {
        die('Unable to connect to database [' . $conn->connect_error . ']');
    }
?>