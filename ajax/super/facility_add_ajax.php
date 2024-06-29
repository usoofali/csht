<?php

require_once ("../../loader.php");
require_once ("../../helpers/querys.php");

$user = new User;
$core = new Core;
$db = new Conexion;

$errors = array();

if (empty($_POST['name']))
    $errors['name'] = $lang['facility_name_error'];

if (empty($_POST['state']))
    $errors['state'] = $lang['facility_state_error'];

if (empty($_POST['city']))
    $errors['city'] = $lang['facility_city_error'];

if (empty($_POST['address']))
    $errors['address'] = $lang['facility_address_error'];

if (empty($_POST['level']))
    $errors['level'] = $lang['facility_level_error'];

if (empty($errors)) {
    $data = array(
        'facility_id' => trim(""),
        'branch_id' => trim($_SESSION['branch']),
        'name' => strtoupper(trim($_POST['name'])),
        'state' => strtoupper(trim($_POST['state'])),
        'city' => strtoupper(trim($_POST['city'])),
        'address' => strtoupper(trim($_POST['address'])),
        'level' => strtoupper(trim($_POST['level'])),
    );

    $insert = insert_facility($data);

    if ($insert) {

        $action_history = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['add_facility'],
            'action' => $lang['add_facility_action'],
            'date_history' => date("Y-m-d H:i:s"),
        );

        //INSERT HISTORY USER
        insert_user_action_history(
            $action_history
        );

        $notification_data = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['added_facility'],
            'description' => $lang['add_facility_notification']
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


