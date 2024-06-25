<?php

require_once("../../loader.php");
require_once("../../helpers/querys.php");

$errors = array();

if (empty($errors)) {

  $data = array(
    'user_id' => $_POST['user_id'],
    'theme' => $_POST['theme'],
    'language' => $_POST['language'],
  );

   $update = update_theme($data);

 if ($update) {
   $messages["success"] = $lang['data_update_success'];
 } else {
   $errors['fail'] = $lang['data_fail'];
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
        'message' => $lang['data_update_success'],
    ]);
}


