<?php

require_once("../../loader.php");
require_once("../../helpers/querys.php");

$errors = array();

if (empty($_POST['name']))
  $errors['name'] =  $lang['branch_name_error'];

if (empty($_POST['code']))
  $errors['code'] =  $lang['branch_code_error'];

if (empty($_POST['address']))
  $errors['address'] =  $lang['branch_address_error'];

if (empty($_POST['color']))
  $errors['color'] =  $lang['branch_color_error'];

if (empty($errors)) {

  $data = array(
    'branch_id' => trim(""),
    'name' => strtoupper(trim($_POST['name'])),
    'address' => strtoupper(trim($_POST['address'])),
    'status' => 1,
    'color' => strtoupper(trim($_POST['color'])),
    'code' => strtoupper(trim($_POST['code']))
  );

  $insert = insert_branch($data);

  if ($insert) {
    $messages[] = $lang['data_success'];
  } else {
    $errors[] = $lang['data_fail'];
    $errors[] = $lang['data_exist'];
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
        'message' => $lang['data_success'],
    ]);
}


