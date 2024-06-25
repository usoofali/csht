<?php

require_once ("../../loader.php");
require_once ('../../helpers/querys.php');
$user = new User;
$db = new Conexion;


$sql = "SELECT * FROM dept WHERE branch_id='" . $_SESSION['branch'] . "'";
$db->cdp_query($sql);
$db->cdp_execute();
$depts = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();

$dataArray = array();
if ($rowCount > 0) {

    $cnt = 0;

    foreach ($depts as $dept) {
        $sql = "SELECT * FROM user INNER JOIN staff on user.user_id=staff.user_id WHERE staff.staff_id='" . $dept->staff_id . "'";
        $db->cdp_query($sql);
        $db->cdp_execute();
        $hod = $db->cdp_registro();
        $sql = "SELECT * FROM user INNER JOIN staff on user.user_id=staff.user_id WHERE staff.staff_id='" . $dept->exam_officer . "'";
        $db->cdp_query($sql);
        $db->cdp_execute();
        $eo = $db->cdp_registro();
        $cnt += 1;
        $action = '<div class="">
                    <a class="icon" href="#' . $dept->dept_id . '" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Actions</h6>
                        </li>
                        <li><a class="dropdown-item select-grading" href="#" data-dept-id="' . $dept->dept_id . '">Select Grading System</a></li>
                        <li><a class="dropdown-item geo-add" href="#" data-dept-id="' . $dept->dept_id . '">Add Coordinates</a></li>
                        <li><a class="dropdown-item geo-view" href="#" data-dept-id="' . $dept->dept_id . '">View Coordinates</a></li>
                        <li><a class="dropdown-item geo-delete" href="#" data-dept-id="' . $dept->dept_id . '">Delete Coordinates</a></li>
                        <li><a class="dropdown-item" href="super_view_dept.php?dept_id=' . $dept->dept_id . '">View Department</a></li>
                        <li><a class="dropdown-item" href="super_edit_dept.php?dept_id=' . $dept->dept_id . '">Edit Department</a></li>
                        <li><a class="dropdown-item delete-dept" href="#" data-dept-id="' . $dept->dept_id . '">Delete Department</a></li>
                    </ul></div>';

        $dataArray[] = array(
            $cnt,
            $dept->name,
            $dept->iso,
            $hod->lname . " " . $hod->fname,
            $eo->lname . " " . $eo->fname,
            $dept->created_at,
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

