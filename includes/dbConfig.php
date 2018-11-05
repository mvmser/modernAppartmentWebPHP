<?php
    $dbHost="localhost";
    $dbUser="s023212i";
    $dbPassword="s023212i";
    $dbName = "s023212i";

    $db = mysqli_connect($dbHost, $dbUser, $dbPassword, $dbName);

    if(!$db)
    {
        die('Unable to connect to database' . mysqli_connect_error());
    }
?>