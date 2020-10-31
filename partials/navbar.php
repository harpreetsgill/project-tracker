<header>
    <a href="<?php echo SITE_URL; ?>">
        <div id="logo">
            <img src="img/logo.svg" alt="Aivei's logo">
            <?php
                if (SITE_URL . substr($_SERVER['REQUEST_URI'], 17) == SITE_URL){
                    echo '<h1 id="h1-brandname">aivei</h1>';
                }  
            ?>
        </div>
    </a>
    <div>
        <?php
            if (SITE_URL . substr($_SERVER['REQUEST_URI'], 17) == SITE_URL){
                echo '<h2 id="h2-subtitle">helps you keep track of your school projects</h2>';
            }
            else {
                echo '<h2>' . $_SESSION['user_id'] . '</h2>'; 
            }
        ?>   
    </div>
</header>