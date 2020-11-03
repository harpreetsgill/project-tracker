<?php
    require_once('functions.php');
    require_once('connect.php');

    if (isset($_GET['proj_id'])) {

    $id = $_GET['proj_id'];
    $sql = "DELETE FROM projects WHERE proj_id = ?";
    $delete_record = $mysqli->prepare($sql);
    $delete_record->bind_param('s', $id);
    $delete_record->execute();

    header("Location: " . SITE_URL . 'dashboard.php?project=deleted');
    }

    else {
        echo 'Project NOT deleted <br>';
        if (isset($_GET['course_id'])) {

            $id = $_GET['course_id'];
            $sql = "DELETE FROM courses WHERE course_id = ?";
            $delete_record = $mysqli->prepare($sql);
            $delete_record->bind_param('s', $id);
            $delete_record->execute();

            header("Location: " . SITE_URL . 'dashboard.php?course=deleted');
        }
        else {
            die();
        }
    }

    
?>