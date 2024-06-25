<?php

require_once ("../../loader.php");
require_once ("../../helpers/querys.php");


$user = new User;
$core = new Core;
$db = new Conexion;

$errors = array();

if (empty($_POST['name']))
    $errors['name'] = $lang['dept_name_error'];

if (empty($_POST['iso']))
    $errors['iso'] = $lang['dept_code_error'];

if (empty($_POST['hod']))
    $errors['hod'] = $lang['hod_code_error'];

if (empty($_POST['exam_officer']))
    $errors['eo'] = $lang['eo_code_error'];


if (empty($errors)) {
    update_staff_role($_POST['hod'], "hod", 0);
    update_staff_role($_POST['exam_officer'], "exam_officer", 0);
    $data = array(
        'dept_id' => $_POST['dept_id'],
        'staff_id' => trim(getStaff("user_id=" . $_POST['hod'])[0]->staff_id),
        'exam_officer' => trim(getStaff("user_id=" . $_POST['exam_officer'])[0]->staff_id),
        'name' => strtoupper(trim($_POST['name'])),
        'iso' => strtoupper(trim($_POST['iso']))
    );

    $update = update_dept($data);

    if ($update) {
        $hod = update_staff_role($_POST['hod'], "hod", 1);
        $eo = update_staff_role($_POST['exam_officer'], "exam_officer", 1);
        error_log($_POST['hod']);
        error_log($_POST['exam_officer']);

        $action_history = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['edited_dept'],
            'action' => $lang['update_dept_action'],
            'date_history' => date("Y-m-d H:i:s"),
        );

        //INSERT HISTORY USER
        insert_user_action_history(
            $action_history
        );

        $notification_data = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['edited_dept'],
            'description' => $lang['edit_dept_notification']
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


