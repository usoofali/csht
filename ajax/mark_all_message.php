<?php

require_once ("../loader.php");
require_once ("../helpers/querys.php");

$user = new User;

$errors = array();

if (empty($errors)) {

    $update = update_all_message_read($user->uid);

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


