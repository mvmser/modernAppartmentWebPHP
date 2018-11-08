<?php
    $dbHost="localhost";
    $dbUser="s023212i";
    $dbPassword="2503";
    $dbName = "s023212i";

    $db = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if (mysqli_connect_errno()) {
        printf("Error: %s\n", mysqli_connect_error());
        exit();
    }
?>