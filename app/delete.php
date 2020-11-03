<?php
    require_once('functions.php');
    require_once('connect.php');

    $id = $_GET['proj_id'];

    $sql = "DELETE FROM projects WHERE proj_id = ?";
    $delete_record = $mysqli->prepare($sql);
    $delete_record->bind_param('s', $id);
    $delete_record->execute();

    header("Location: " . SITE_URL . 'dashboard.php?project=deleted');
?>