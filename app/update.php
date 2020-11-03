<?php

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('functions.php');
    require_once('connect.php');

    // $id = $_POST['course_id'];
    $course = $_POST['course_name'];

    $sql = "UPDATE courses
            SET course_name = $course
            WHERE course_id = ?";

    $update = $mysqli->prepare($sql);
    $update->bind_param('s', $id);
    $update->execute();

    echo 'aaa';

?>