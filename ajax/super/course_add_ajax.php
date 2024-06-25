<?php

require_once ("../../loader.php");
require_once ("../../helpers/querys.php");

$user = new User;
$core = new Core;
$db = new Conexion;

$sql = "SELECT dept.dept_id FROM user 
    INNER JOIN staff on user.user_id = staff.user_id 
    INNER JOIN dept on staff.staff_id = dept.staff_id WHERE user.user_id=" . $user->uid;

$db->cdp_query($sql);
$dept = $db->cdp_registro();
error_log(json_encode($dept));

$errors = array();

if (empty($_POST['title']))
    $errors['title'] = $lang['course_title_error'];

if (empty($_POST['code']))
    $errors['code'] = $lang['course_code_error'];

if (empty($_POST['unit']))
    $errors['unit'] = $lang['course_unit_error'];

if (empty($_POST['level']))
    $errors['level'] = $lang['course_level_error'];

if (empty($_POST['semester']))
    $errors['semester'] = $lang['course_semester_error'];

if (empty($errors)) {
    $data = array(
        'course_id' => trim(""),
        'title' => strtoupper(trim($_POST['title'])),
        'code' => strtoupper(trim($_POST['code'])),
        'unit' => strtoupper(trim($_POST['unit'])),
        'level' => strtoupper(trim($_POST['level'])),
        'semester' => strtoupper(trim($_POST['semester'])),
        'dept_id' => $dept->dept_id
    );

    $insert = insert_course($data);

    if ($insert) {

        $action_history = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['add_course'],
            'action' => $lang['add_course_action'],
            'date_history' => date("Y-m-d H:i:s"),
        );

        //INSERT HISTORY USER
        insert_user_action_history(
            $action_history
        );

        $notification_data = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['added_course'],
            'description' => $lang['add_course_notification']
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

        $messages['data_success'] = $lang['data_success'];

    } else {
        $errors[] = $lang['data_fail'];
        $errors[] = $lang['data_exist'];
    }
}


if (!empty($errors)) {
    $html = '<ul style="text-align: left;">';

    foreach ($errors as $error) {
        $html .= '<li><i class="icon-double-angle-right"></i>' . $error . '</li>';
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


