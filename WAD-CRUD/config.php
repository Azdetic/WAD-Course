<?php

    $dbHost = 'localhost:3308';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbName = 'crud_db';
    $conn = "";

    $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    ?>