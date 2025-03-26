<?php

function getConnection():mysqli
{
    $servername = "localhost";
    $dbName = "project_wed";
    $username = "project";
    $password = "abc123";
    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

require_once DATABASE_DIR . '/users.php';
require_once DATABASE_DIR . '/authen.php';
require_once DATABASE_DIR . '/events.php';
require_once DATABASE_DIR . '/register_events.php';