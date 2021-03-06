<?php

    require_once('functions.php');
    require_once('connect.php');


    if(isset($_POST['signup_add'])) {

        $username = sanitize($_POST['signup_username']);
        $password = sanitize($_POST['signup_password']);
        $passwordAgain = sanitize($_POST['signup_password_retype']);

        if(empty($username) || empty($password) || empty($passwordAgain)) {
            header('Location: ' . SITE_URL . '?error=emptyFields');
            die();
        }

        if($password !== $passwordAgain) {
            header('Location: ' . SITE_URL . '?error=passwordDontMatch');
            die();
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = 'SELECT * FROM users WHERE user_username = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->fetch();

        if ($result->num_rows) {
            header('Location: ' . SITE_URL . '?error=userExists');
            die();
        }

        $sql = 'INSERT INTO users (user_username, user_password)
                VALUES (?, ?)';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();

        header('Location: ' . SITE_URL . '?signup=success');
        die();
    }

    else {
        die();
    }

?>