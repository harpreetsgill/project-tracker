<header id="flex">
    <div id="logo">
        <a href="<?php echo SITE_URL . 'dashboard.php'; ?>">
        
            <div><img src="img/logo.svg" alt="Aivei's logo"></div>
        </a>
            <?php
                if (SITE_URL . substr($_SERVER['REQUEST_URI'], 17) == SITE_URL){
                    echo '<div><h1 id="h1-brandname">aivei</h1></div>';
                }  
            ?>
        
        
    </div>
        <?php
            if (SITE_URL . substr($_SERVER['REQUEST_URI'], 17) == SITE_URL){
                echo '<h2 id="h2-subtitle">helps you keep track of your school projects</h2>';
                echo '
                <script>
                    document.getElementById("flex").style.justifyContent = "flex-start";
                </script>
                ';
            }
            else {                
                if (isset(($_SESSION['user_id']))) {
                    $user_id = $_SESSION['user_id'];
                    $sql = 'SELECT * FROM users
                    WHERE users.user_id = ?';

                    $stmt = $mysqli->prepare($sql);
                    $stmt->bind_param('i', $user_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $row = $result->fetch_assoc();

                    echo '<div id="div-username-setting"><h2 id="logged-user">Hello ' . $row['user_username'] . '</h2>' . '<a id="a-setting" href="' . SITE_URL . 'settings.php"><img src="img/settings.svg" alt="settings icon"></a></div>';
                }
            }
        ?>  
</header>