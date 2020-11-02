<?php

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require('../partials/header.php');
    // require('../partials/navbar.php');
    require_once('connect.php');
    require_once('functions.php');

    if (isset($_POST['proj_add'])) {

        $title = $_POST['proj_title'];
        $desc = $_POST['proj_desc'];
        $startdate = $_POST['proj_startdate'];
        $duedate = $_POST['proj_duedate'];
        $duetime = $_POST['proj_duetime'];
        $cat = $_POST['proj_course_code'];
        $status = $_POST['proj_status_id'];
        $priority = $_POST['proj_prior_id'];
        $user_id = $_SESSION['user_id'];

        $sql = "INSERT INTO projects (proj_title, proj_desc, proj_startdate, proj_duedate, proj_duetime, proj_course_code, proj_status_id, proj_prior_id, proj_user_id)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('sssssssss', $title, $desc, $startdate, $duedate, $duetime, $cat, $status, $priority, $user_id);
        $stmt->execute();

        echo 'if working';

        header('Location: ' . SITE_URL . 'dashboard.php' . '?addProj=success');
    }
    else {
        if (isset($_POST['course_add'])) {
            $user_id = $_SESSION['user_id'];
            $course = $_POST['course_name'];
            $color = $_POST['course_color_code'];
    
            $sql = "INSERT INTO courses (course_name, course_color_code, course_user_id)
                VALUES(?, ?, ?)";
            
            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('sss', $course, $color, $user_id);
            $stmt->execute();
    
            header('Location: ' . SITE_URL . 'dashboard.php' . '?addCourse=success');
        }
        else {
            die();
        }
    }

    

?>

<?php
    require_once('../partials/footer.php');
?>