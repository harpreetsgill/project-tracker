<?php

    require_once('functions.php');
    require('../partials/header.php');
    require('../partials/navbar.php');
    require_once('connect.php');


    if(isset($_POST['signup_add'])) {

        $username = sanitize($_POST['signup_username']);
        $password = sanitize($_POST['signup_password']);
        $passwordAgain = sanitize($_POST['signup_password_retype']);

        echo $username;
        echo $password;
        echo $passwordAgain;

        if(empty($username) || empty($password) || empty($passwordAgain)) {
            header('Location: ' . SITE_URL . '?error=emptyFields');
        }
        else {
            die();
        }

        if($password !== $passwordAgain) {
            header('Location: ' . SITE_URL . '?error=passwordDontMatch');
            die();
        }

        $sql = 'INSERT INTO users (user_username, user_password)
                VALUES (?, ?)';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
    }

    else {
        echo 'if stmt not working';
    }

?>