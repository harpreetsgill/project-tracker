<?php
    $user = 'gillh013_hariya';
    $password = 'nemoda4timtim';
    $db = 'gillh013_projtracker';
    $host = 'localhost';
    $port = 3306;

    $mysqli = new mysqli($host, $user, $password, $db, $port);

    if ($mysqli->connect_errno) {
        echo 'Failed to connect to MySQL: ' . $mysqli->connect_errno;
        die();
    }
?>