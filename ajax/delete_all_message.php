<?php

require_once ("../loader.php");
require_once ("../helpers/querys.php");

$errors = array();
$user = new User;

if (empty($errors)) {

    $delete = deleteAllMessage($user->uid);

    if ($delete) {
        $messages[] = $lang['data_delete'];
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
        'message' => $lang['data_delete'],
    ]);
}


