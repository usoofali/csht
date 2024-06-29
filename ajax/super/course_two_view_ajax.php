<?php

require_once ("../../loader.php");
require_once ('../../helpers/querys.php');
$user = new User;
$db = new Conexion;
$sql = "SELECT dept.dept_id FROM user 
    INNER JOIN staff on user.user_id = staff.user_id 
    INNER JOIN dept on staff.staff_id = dept.staff_id WHERE user.user_id=" . $user->uid;
$db->cdp_query($sql);
$dept = $db->cdp_registro();

$sql = "SELECT * FROM course WHERE level='200 LEVEL' and dept_id='" . $dept->dept_id . "' GROUP BY code ORDER BY semester ASC";
$db->cdp_query($sql);
$db->cdp_execute();
$courses = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();

$dataArray = array();
if ($rowCount > 0) {

    $cnt = 0;

    foreach ($courses as $course) {
        $cnt += 1;
        $action = '<div class="">
                    <a class="icon" href="#' . $course->course_id . '" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Actions</h6>
                        </li>
                        <li><a class="dropdown-item" href="super_edit_course.php?course_id=' . $course->course_id . '">Update Course</a></li>
                        <li><a class="dropdown-item delete-course" href="#" data-course-id="' . $course->course_id . '">Delete Course</a></li>
                    </ul></div>';

        $dataArray[] = array(
            $cnt,
            $course->title,
            $course->code,
            $course->unit,
            $course->semester,
            $action
        );
    }
    $resultObject = array(
        "data" => $dataArray
    );
    // Convert the result to JSON format
    $resultJSON = json_encode($resultObject);
    // Output the JSON
    echo $resultJSON;
} else {
    $resultObject = array(
        "data" => $dataArray
    );
    // Convert the result to JSON format
    $resultJSON = json_encode($resultObject);
    // Output the JSON
    echo $resultJSON;

}

