<?php
    require_once('functions.php');
    require('../partials/header.php');
    require('../partials/navbar.php');

    require_once('connect.php');

    If (isset($_POST['login_add'])) {

        $username = $_POST['login_username'];
        $password = $_POST['login_password'];

        if (empty($username) || empty($password)) {
            echo 'Empty field(s)';
        }

        $sql = 'SELECT * FROM users
                WHERE user_username = ?';
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();

        $userData = $result->fetch_assoc();

        print_r($userData);

        if ($username == $userData['user_username']) {
            echo 'Username Match';
        }

        else {
            echo 'No Match';
        }

    }

    else {
        die();
    }

?>