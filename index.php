<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('app/functions.php');
    require_once('partials/header.php');
    require_once('app/connect.php');
    // require_once('partials/navbar.php');

?>

<div id="container">
    <?php require_once('partials/navbar.php'); ?>
    
    <!-- Signup Form -->
    <div id="signup-form">
        <h2>Signing up <br>
        is <span>easy</span></h2>
        <form action="app/signup.php" method="POST">
            <input class="input-field" type="text" name="signup_username" placeholder="Username">

            <input class="input-field" type="password" name="signup_password" placeholder="Password">

            <input class="input-field" type="password" name="signup_password_retype"  placeholder="Retype Password">

            <input class="input-button" type="submit" value="Signup" name="signup_add">
        </form>
    </div>

    <!-- Login Form -->
    <div id="login-form">
        <h2>Logging in <br>
        is <span>easier</span></h2>
        <form action="app/login.php" method="POST">
            <input class="input-field" type="text" name="login_username" placeholder="Username">

            <input class="input-field" type="password" name="login_password" placeholder="Password">

            <input class="input-button" type="submit" value="Login" name="login_add">
        </form>
    </div>
</div>

    
<?php
    require_once('partials/footer.php');
?>