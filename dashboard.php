<?php
    
    if (session_status() === 1) {
        session_start();
    }
    
    if (!isset($_SESSION['user_id'])) {
        header('Location: ' . SITE_URL . '?error=userNotLoggedIn');
    }
    
    require_once('app/functions.php');
    require_once('partials/header.php');
    require_once('app/connect.php');
?>

<div id="container">
    <?php require_once('partials/navbar.php'); ?>

    <!-- Courses Container -->
    <?php include 'partials/courses.php'; ?>

    <!-- Projects Container -->
    <?php include 'partials/projects.php'; ?>
   
</div>

<?php
    require_once('partials/footer.php');
?>