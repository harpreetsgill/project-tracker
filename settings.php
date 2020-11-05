<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('app/functions.php');
    require_once('partials/header.php');
    require_once('app/connect.php');
?>

<div id="container">
    <?php require_once('partials/navbar.php'); ?>

    <!-- Shows if the user is logged in -->
    <?php
        if (isset(($_SESSION['user_id']))):
    ?>

    <!-- Courses Container -->
    <?php include 'partials/courses.php'; ?>

    <!-- Settings Container -->
    <?php include 'partials/settings-container.php'; ?>

    <?php else:
        header('Location: ' . SITE_URL . '?error=userNotLoggedIn');
    ?>
    <?php endif; ?>

    

    
</div>

<?php
    require_once('partials/footer.php');
?>