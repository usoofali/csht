<?php

require_once ("../../loader.php");
require_once ("../../helpers/querys.php");

$user = new User;
$core = new Core;
$db = new Conexion;

// Get department ID for the current user
$sql = "SELECT dept.dept_id FROM user 
    INNER JOIN staff on user.user_id = staff.user_id 
    INNER JOIN dept on staff.staff_id = dept.staff_id WHERE user.user_id=" . $user->uid;
$db->cdp_query($sql);
$dept = $db->cdp_registro();

// Get the list of courses from the POST data
$courses = json_decode($_POST['courses'], true);

$errors = array();
$messages = array();

foreach ($courses as $course) {

    if (empty($course['title']))
        $errors['title'] = $lang['course_title_error'];

    if (empty($course['code']))
        $errors['code'] = $lang['course_code_error'];

    if (empty($course['unit']))
        $errors['unit'] = $lang['course_unit_error'];

    if (empty($course['level']))
        $errors['level'] = $lang['course_level_error'];

    if (empty($course['semester']))
        $errors['semester'] = $lang['course_semester_error'];

}

$insert = false;
$count = 0;

if (empty($errors)) {
    foreach ($courses as $course) {
        $count += 1;
        $data = array(
            'course_id' => trim(""),
            'title' => strtoupper(trim($course['title'])),
            'code' => strtoupper(trim($course['code'])),
            'unit' => strtoupper(trim($course['unit'])),
            'level' => strtoupper(trim($course['level'])),
            'semester' => strtoupper(trim($course['semester'])),
            'dept_id' => $dept->dept_id
        );
        $insert = insert_course($data);
    }

} else {
    $errors[] = $errors;
}

if ($insert) {

    $action_history = array(
        'user_id' => $_SESSION['userid'],
        'acted_id' => $_SESSION['userid'],
        'action_type' => $lang['add_course'],
        'action' => $count . $lang['add_courses_action'],
        'date_history' => date("Y-m-d H:i:s"),
    );

    //INSERT HISTORY USER
    insert_user_action_history($action_history);

    $notification_data = array(
        'user_id' => $_SESSION['userid'],
        'acted_id' => $_SESSION['userid'],
        'action_type' => $lang['added_course'],
        'description' => $count . $lang['add_courses_notification']
    );
    // SAVE NOTIFICATION
    insert_notification($notification_data);
    $notification_id = $db->dbh->lastInsertId();
    $staff = getUser("userlevel != 1 and branch_id ='" . $_SESSION['branch'] . "'");
    foreach ($staff as $key) {
        $userNotification = array(
            "notification_id" => $notification_id,
            "branch_id" => $key->branch_id,
            "user_id" => $key->user_id
        );
        insert_notification_user($userNotification);
    }

    $messages[] = $count . $lang['import_success'];
} else {
    $errors[] = $lang['data_fail'];
    $errors[] = $lang['data_exist'];
}

if (!empty($errors)) {
    $html = '<ul style="text-align: left;">';
    foreach ($errors as $error) {
        if (is_array($error)) {
            foreach ($error as $key => $errMsg) {
                $html .= '<li><i class="icon-double-angle-right"></i>' . $errMsg . '</li>';
            }
        } else {
            $html .= '<li><i class="icon-double-angle-right"></i>' . $error . '</li>';
        }
    }
    $html .= '</ul>';
    echo json_encode([
        'success' => false,
        'message' => $html
    ]);

} else {
    $html = '<ul style="text-align: left;">';
    foreach ($messages as $msg) {
        $html .= '<li><i class="icon-double-angle-right"></i>' . $msg . '</li>';
    }
    $html .= '</ul>';
    echo json_encode([
        'success' => true,
        'message' => $html
    ]);
}
