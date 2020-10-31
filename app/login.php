<?php
    require_once('functions.php');
    require('../partials/header.php');
    require('../partials/navbar.php');

    require_once('connect.php');

    If (isset($_POST['login_add'])) {

        $username = sanitize($_POST['login_username']);
        $password = sanitize($_POST['login_password']);

        if (empty($username) || empty($password)) {
            header('Location: ' . SITE_URL . '?error=EmptyFields');
        }

        $sql = 'SELECT * FROM users
                WHERE user_username = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $userData = $result->fetch_assoc();

        if (password_verify($password, $userData['user_password'])) {
            if(session_start() == PHP_SESSION_NONE) {
                session_start();
            }

            $_SESSION['user_id'] = $userData['user_id'];
            header('Location: ' . SITE_URL . 'dashboard.php' . '?login=success');
        }
        else {
            header('Location: ' . SITE_URL . '?login=failure');
        }
    }

    else {
        header('Location: ' . SITE_URL);
        die();
    }

?>