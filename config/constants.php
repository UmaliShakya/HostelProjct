<?php

    //Session Start
    ob_start();
    session_start();

    //Create constants to store Non repeating values
    define('SITEURL', 'https://localhost/Hostel/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'serene');

    //Database Connection
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error());
    //Selecting Database
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());
?>