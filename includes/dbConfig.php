<?php
    $dbHost="localhost";
    $dbUser="s023212i";
    $dbPassword="s023212i";
    $dbName = "s023212i";

    $conn = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

    if(!$conn)
    {
        die('Unable to connect to database' . mysqli_connect_error());
    }
?>