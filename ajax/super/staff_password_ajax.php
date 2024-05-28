<?php

require_once("../../loader.php");
require_once("../../helpers/querys.php");

$errors = array();

$user = new User;
$core = new Core;

function sanitize_input($data) {
  return htmlspecialchars(stripslashes(trim($data)));
}

$currentPassword = sanitize_input($_POST['currentpassword']);
$newPassword = sanitize_input($_POST['newpassword']);
$renewPassword = sanitize_input($_POST['renewpassword']);

// Validate inputs
if (empty($currentPassword)) {
    $errors[] = "Current Password cannot be empty";
}

if (empty($newPassword)) {
    $errors[] = "New Password cannot be empty";
} elseif (strlen($newPassword) < 6) {
    $errors[] = "New Password must be at least 6 characters long";
}

if (empty($renewPassword)) {
    $errors[] = "Re-enter New Password cannot be empty";
} elseif ($newPassword !== $renewPassword) {
    $errors[] = "New and confirm Password do not match";
}

if (empty($errors)) {
  $password = getUser("user_id='".$_POST['user_id']."'")[0]->password;
  // Verify the current password
  if (password_verify($currentPassword, $password)) {
    // Hash the new password
    $newHashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $data = array(
      'user_id' => $_POST['user_id'],
      'password' => $newHashedPassword
    );
  
    $update = update_password($data);
  
    if ($update) {
      $messages[] = $lang['data_update_success'];
    } else {
      $errors['fail'] = $lang['data_fail'];
    }
  } else {
      $errors["current_pass"] = "Current Password is incorrect";
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


