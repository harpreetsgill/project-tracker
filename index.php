<?php

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('app/functions.php');
    require_once('partials/header.php');
    require_once('app/connect.php');
    require_once('partials/navbar.php');


    // echo $_SESSION['user_username'];
?>



<!-- Login Form -->
<div style="border: 1px solid black">
    <h2>Login</h2>
    <form action="app/login.php" method="POST">
        <label>Username</label>
        <input type="text" name="login_username">

        <label>Password</label>
        <input type="password" name="login_password">

        <input type="submit" value="Login" name="login_add">
    </form>
</div>

<!-- Signup Form -->
<div style="border: 1px solid black">
    <h2>Signup</h2>
    <form action="app/signup.php" method="POST">
        <label>Username</label>
        <input type="text" name="signup_username">

        <label>Password</label>
        <input type="password" name="signup_password">

        <label>Retype Password</label>
        <input type="password" name="signup_password_retype">

        <input type="submit" value="Signup" name="signup_add">
    </form>
</div>

<?php if (isset(($_SESSION['user_id']))): ?>
    <h1>Only for logged in user</h1>
<?php else: ?>
    <h1>For logged out</h1>
<?php endif; ?>



<div style="border: 1px solid black">
    <h2>Add Project</h2>
    <form id="addProj" action="app/insert.php" method="POST">
        <label for="projTitle">Title</label>
        <input type="text" id="projTitle" name="proj_title">

        <label for="projCat">Category</label>
        <select name="proj_cat_id">
            <option value="1">Not Started</option>
            <option value="2">In Progress</option>
            <option value="3">Completed</option>
        </select>

        <label for="projStatus">Status</label>
        <select name="proj_status_id">
            <option value="1">Not Started</option>
            <option value="2">In Progress</option>
            <option value="3">Completed</option>
        </select>

        <label for="projPrior">Priority</label>
        <select name="proj_prior_id">
            <option value="1">Low</option>
            <option value="2">Medium</option>
            <option value="3">High</option>
        </select>

        <br>

        <label for="projStartDate">Start Date</label>
        <input type="date" name="proj_startdate">

        <label for="projDueDateTime">Due Date & Time</label>
        <input type="date" name="proj_duedate"> <input type="time" name="proj_duetime">

        <br>

        <label for="projDesc">About the project</label>
        <textarea name="proj_desc"></textarea>

        <input type="submit" value="Add" name="proj_add"></input>
    </form>
</div>
<br>
<!-- Added Projects -->
<div style="border: 1px solid black">
<h2>Added Projects</h2>
<?php
    $sql = 'SELECT * FROM projects';

    $stmt = $mysqli->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    // $row = $result->fetch_assoc();
    // echo $row['proj_title'];
    // print_r($row);

    while($row = $result->fetch_assoc() ):
    
?>


    <?php
            echo '<div style="border: 1px solid black">';

            echo $row['proj_title'] . '<br>';   
            echo $row['proj_startdate'] . ' | ';
            echo $row['proj_duedate'] . ' - ';
            echo $row['proj_duetime'] . '<br>';
            echo $row['proj_cat_id'] . ' | '; 
            echo $row['proj_status_id'] . ' | ';
            echo $row['proj_prior_id'] . '<br>';
            echo $row['proj_desc'];
            
            echo '</div>';
        
        endwhile;
    ?>
</div>

<?php
    require_once('partials/footer.php');
?>