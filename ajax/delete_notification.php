<?php

require_once("../loader.php");
require_once("../helpers/querys.php");

$errors = array();

if (empty($_POST['id']))
  $errors['id'] =  $lang['id_error'];
if (empty($errors)) {

  $data = array(
    'id' => $_POST['id']
  );

  $delete = deleteNotificationUser($data['id']);

  if ($delete) {
    $messages[] = $lang['data_delete'];
  } else {
    $errors[] = $lang['data_fail'];
  }
}


if (!empty($errors)) {
    $html = '<ul style="text-align: left;">';
    foreach ($errors as $error) {
        $html .= '<li><i class="icon-double-angle-right"></i>'.$error.'</li>';
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

