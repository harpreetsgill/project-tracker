<?php

    require_once('functions.php');

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if($_GET['logout']) {
        session_destroy();
        header('Location: ' . SITE_URL . '?logout=success');
    }

    else {
        header('Location: ' . SITE_URL);
    }

?>