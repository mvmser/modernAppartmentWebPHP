<?php
    session_name('WebAppartment');
    session_start();
    $_SESSION = array();
    session_unset();
    session_destroy();
    header("location: ../index.php");
    exit;
?>