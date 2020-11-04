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

    <!-- Form to ddd a new course -->
    <form id="addCourse" action="app/insert.php" method="POST" style="display: block;">
        <input type="text" name="course_name" placeholder="Course Name">
        <div id="div-clr-btn">
            <input type="color" name="course_color_code" value="#FC9877">

            <input type="submit" name="course_add" value="Add">
        </div>      
    </form>

    <!-- List of added courses -->
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
                '<li>' .
                    '<span id="' . $row['course_id'] . '" name="course_name" >' . $row['course_name'] . '</span>' .
                    '<span><span class="course-color-circle" style="background-color:' .
                    $row['course_color_code'] . ';"></span>' .
                    '<a class="del-link" href="app/delete.php?course_id=' . $row['course_id'] . '">X</a></span>' .
                '</li>';
            endwhile;
        ?>
    </ul>
</div>