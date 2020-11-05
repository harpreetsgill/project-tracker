<?php

    require_once('functions.php');

    if (session_status() === 1) {
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