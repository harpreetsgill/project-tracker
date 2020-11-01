<?php

    require('../partials/header.php');
    // require('../partials/navbar.php');
    require_once('connect.php');
    require_once('functions.php');

    if (isset($_POST['course_add'])) {
        $course = $_POST['course_name'];

        $sql = "INSERT INTO courses (course_name)
            VALUES(?)";
        
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $course);
        $stmt->execute();

        header('Location: ' . SITE_URL . 'dashboard.php' . '?addCourse=success');
    }
    else {
        die();
    }

    if (isset($_POST['proj_add'])) {

        $title = $_POST['proj_title'];
        $desc = $_POST['proj_desc'];
        $startdate = $_POST['proj_startdate'];
        $duedate = $_POST['proj_duedate'];
        $duetime = $_POST['proj_duetime'];
        $cat = $_POST['proj_cat_id'];
        $status = $_POST['proj_status_id'];
        $priority = $_POST['proj_prior_id'];

        $sql = "INSERT INTO projects (proj_title, proj_desc, proj_startdate, proj_duedate, proj_duetime, proj_cat_id, proj_status_id, proj_prior_id)
            VALUES(?, ?, ?, ?, ?, ?, ?, ?)";

        // INSERT INTO projects (proj_title, proj_desc, proj_startdate, proj_duedate, proj_duetime, proj_cat_id, proj_status_id, proj_prior_id) VALUES("Test Title", "Test Description", "2000-01-12", "2000-01-12", "10:00:00", 1, 2, 3)

        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ssssssss', $title, $desc, $startdate, $duedate, $duetime, $cat, $status, $priority);
        $stmt->execute();

        header('Location: ' . SITE_URL . 'dashboard.php' . '?addProj=success');
    }
    else {
        die();
    }

    

?>

<?php
    require_once('../partials/footer.php');
?>