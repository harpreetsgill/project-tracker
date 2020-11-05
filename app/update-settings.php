<?php

    if(session_status() === 1) {
        session_start();
    }


    require_once('functions.php');
    require_once('connect.php');

    if(isset($_POST['btn-change'])) {

        $user_id = $_SESSION['user_id'];
        $new_username = sanitize($_POST['user_new_username']);
        $new_password = sanitize($_POST['user_new_password']);
        $new_passwordAgain = sanitize($_POST['user_new_password_retype']);

        if(empty($new_username) || empty($new_password) || empty($new_passwordAgain)) {
            header('Location: ' . SITE_URL . 'settings.php?error=emptyFields');
            die();
        }

        if($new_password !== $new_passwordAgain) {
            header('Location: ' . SITE_URL . 'settings.php?error=passwordDontMatch');
            die();
        }

        $sql = "UPDATE users
                SET user_username = ?, user_password = ?
                WHERE users.user_id = $user_id";

        $update_record = $mysqli->prepare($sql);
        $update_record->bind_param('ss', $new_username, password_hash($new_password, PASSWORD_DEFAULT));
        $update_record->execute();

        header('Location: ' . SITE_URL . 'settings.php' . '?settings=success');

    }

    else {
        die();
    }

?>