<?php
    $user = 'root';
    $password = 'root';
    $db = 'projtracker';
    $host = 'localhost';
    $port = 8889;

    $mysqli = new mysqli($host, $user, $password, $db, $port);

    if ($mysqli->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $mysqli->connect_errno;
        die();
    }
?>