<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    require_once('app/functions.php');
    require_once('partials/header.php');
    require_once('app/connect.php');
?>

<div id="container">
    <?php
        if (isset(($_SESSION['user_id']))):
    ?>
        <!-- <h1>Only for logged in user</h1> -->
    <?php else: ?>
        <!-- <h1>For logged out</h1> -->
    <?php endif; ?>

    <?php require_once('partials/navbar.php'); ?>

    <div id="div-courses">
        <div class="div-section-head">
            <h2><span id="spn-course-add">Add </span>Course<span id="spn-course-s" style="display: none;">s</span></h2>
            <a href="#" id="add-course-plus" onclick="toggleCourseView();">
                <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                    viewBox="0 0 21 21" style="enable-background:new 0 0 21 21;" xml:space="preserve">
                <polygon points="21,9 12,9 12,0 9,0 9,9 0,9 0,12 9,12 9,21 12,21 12,12 21,12 "/>
                </svg>
            </a>
        </div>

        <form id="addCourse" action="app/insert.php" method="POST" style="display: block;">
        
            <input type="text" name="course_name" placeholder="Course Name">

            <div id="div-clr-btn">
                <input type="color" name="course_color_code">

                <input type="submit" name="course_add" value="Add"></input>
            </div>
        
        </form>

        <ul>
            <?php
                $user_id = $_SESSION['user_id'];

                $sql = 'SELECT * FROM courses
                        WHERE courses.course_user_id = ?';

                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param('i', $user_id);
                $stmt->execute();
                $result = $stmt->get_result();

                while($row = $result->fetch_assoc() ):
            ?>

            <?php
                echo
                '<a href="course.php?course_code='. 
                substr($row['course_color_code'], 1) . '">' .
                    '<li>' .              
                        $row['course_name'] . '<span style="background-color:' . $row['course_color_code'] . ';"></span>' .                    
                    '</li>' .
                '</a>' ;
                endwhile;
            ?>
        </ul>
    </div>

    <div id="main">
    <div class="div-section-head">
        <h2><span id="spn-add" style="display: inline;">Add </span>Project<span id="spn-s" style="display: none;">s</span></h2>
        <a href="#" id="add-proj-plus" onclick="toggleProjView()">
            <svg id="svgsign" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 21 21" style="enable-background:new 0 0 21 21;" xml:space="preserve">
            <polygon points="21,9 12,9 12,0 9,0 9,9 0,9 0,12 9,12 9,21 12,21 12,12 21,12 "/>
            </svg>
        </a>
    </div>

    <div id="div-add-proj" style="display: block;">
        <form id="addProj" action="app/insert.php" method="POST">

            <input type="text" id="projTitle" name="proj_title" placeholder="Project Title">


            <div class="div-add-proj-opts-1">
                    
                <div>
                    <label for="projStartDate">Start Date</label>
                    <input type="date" name="proj_startdate">
                </div>

                <div>
                    <label for="projDueDateTime">Due Date</label>
                    <input type="date" name="proj_duedate">
                </div>
                
                <div>
                    <label for="projDueDateTime">Time</label>
                    <input type="time" name="proj_duetime">
                </div>
            </div>

            <div class="div-add-proj-opts-2">
                <div>
                    <label for="projCat">Course</label>
                    <select name="proj_course_code">
                    <?php
                        $user_id = $_SESSION['user_id'];

                        $sql = 'SELECT * FROM courses
                                WHERE courses.course_user_id = ?';

                        $stmt = $mysqli->prepare($sql);
                        $stmt->bind_param('i', $user_id);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        while($row = $result->fetch_assoc() ):
                        echo
                        '<option
                            style="color: #FFF;
                                background-color:'.$row['course_color_code'].';"'.
                            'value="' . $row['course_color_code'] .
                        '">' .
                            $row['course_name'] .
                        '</option>';
                        endwhile;
                    ?>
                    </select>
                </div>

                <div>
                    <label for="projStatus">Status</label>
                    <select name="proj_status_id">
                        <option value="1">Not Started</option>
                        <option value="2">In Progress</option>
                        <option value="3">Completed</option>
                    </select>
                </div>

                <div>
                    <label for="projPrior">Priority</label>
                    <select name="proj_prior_id">
                        <option value="1">Low</option>
                        <option value="2">Medium</option>
                        <option value="3">High</option>
                    </select>
                </div>
            </div>

            <textarea name="proj_desc" placeholder="Description"></textarea>

            <div class="div-btn-add">
                <input id="btn-post-proj" type="submit" value="Add" name="proj_add"></input>
            </div>
        </form>
    </div>

    <!-- Added Projects -->
    <div>
        <?php
            $user_id = $_SESSION['user_id'];

            $sql = 'SELECT * FROM projects
                    -- JOIN courses
                    -- ON projects.proj_cat_id = courses.course_color_code
                    WHERE projects.proj_user_id = ?';

            $stmt = $mysqli->prepare($sql);
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while($row = $result->fetch_assoc() ):
            
        ?>


        <?php
            echo '<div class="div-proj-box">';

                echo '<h4 class="box-head"' . 'style="background-color:'. $row['proj_course_code'] . '">' . $row['proj_title'] . '</h4>';

                echo '<a href="app/delete.php?proj_id=' . $row['proj_id'] . '">Delete</a>';
                
                echo '<div class="box-content">';
                    echo '<div class="box-dates">';
                    // $date = date_create($row['proj_startdate']);
                        echo '<h5>' . dateFormat($row['proj_startdate']) . '</h5>';
                        echo '<h5>' . dateFormat($row['proj_duedate']) . ' at ' . timeFormat($row['proj_duetime']) . '</h5>';
                    echo '</div>';
                    // echo $row['proj_duetime'] . '<br>';
                    // echo $row['proj_cat_id'] . ' | '; 
                    // echo $row['proj_status_id'] . ' | ';
                    // echo $row['proj_prior_id'] . '<br>';
                    echo '<p>' . $row['proj_desc'] . '</p>';
                echo '</div>';
            
            echo '</div>';
            
            endwhile;
        ?>
    </div>
    </div>
</div>

<?php
    require_once('partials/footer.php');
?>