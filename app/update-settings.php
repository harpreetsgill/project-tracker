<?php

    if(session_status() == PHP_SESSION_NONE) {
        session_start();
    }


    require_once('functions.php');
    require_once('connect.php');

    if(isset($_POST['btn-change'])) {

        $user_id = $_SESSION['user_id'];
        $new_username = $_POST['user_new_username'];
        $new_password = $_POST['user_new_password'];

        $sql = "UPDATE users
                SET user_username = ?, user_password = ?
                WHERE users.user_id = $user_id";

        $update_record = $mysqli->prepare($sql);
        $update_record->bind_param('ss', $new_username, password_hash($new_password, PASSWORD_DEFAULT));
        $update_record->execute();

        echo 'if chaleya';

    }

    else {
        echo 'else chaley';
    }

?>