<?php
require_once ("../loader.php");
require_once ("../helpers/querys.php");

$db = new Conexion;
$user = new User;

if (empty($errors)) {

    $db->cdp_query("UPDATE notification_user SET                
    notification_read = 1                    
  WHERE
    user_id = :user_id  
  ");

    $db->bind(':user_id', $user->uid);
    $update = $db->cdp_execute();

    if ($update) {
        $messages[] = $lang['data_update_success'];
    } else {
        $errors[] = $lang['data_fail'];
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
    echo json_encode([
        'success' => true,
        'message' => $lang['data_update_success'],
    ]);
}