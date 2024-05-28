<?php

require_once("../../loader.php");
require_once("../../helpers/querys.php");
$user = new User;

$errors = [];

// Define the fields and their labels
$fields = array(
    'fname' => 'First Name',
    'lname' => 'Last Name',
    'about' => 'About',
    'company' => 'Company',
    'job' => 'Job',
    'designation' => 'Designation',
    'address' => 'Address',
    'phone' => 'Phone',
    'email' => 'Email',
    'gender' => 'Gender',
    // 'twitter' => 'Twitter Profile',
    // 'facebook' => 'Facebook Profile',
    // 'instagram' => 'Instagram Profile',
    // 'linkedin' => 'LinkedIn Profile',
    'account_name' => 'Account Name',
    'account_number' => 'Account Number',
    'account_bank' => 'Account Bank'
);

// Validate each field
foreach ($fields as $field => $label) {
    if (empty($_POST[$field])) {
        $errors[$field] = ucfirst($label) . " cannot be empty";
    } else {
        // Additional validation for specific fields
        $value = trim($_POST[$field]);
        switch ($field) {
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $errors[$field] = "Invalid email format";
                }
                break;
            case 'phone':
                if (!preg_match('/^\+?[0-9]{10,15}$/', $value)) {
                    $errors[$field] = "Invalid phone number";
                }
                break;
            // Add more specific validations as needed
        }
    }
}



if (empty($errors)) {

    if (!empty($_FILES['avatar']['name'])) {

        $target_dir = "../../uploads/images/";
        $image_name = time() . "_" . basename($_FILES["avatar"]["name"]);
        $target_file = $target_dir . $image_name;
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }
        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
        $imageFileZise = $_FILES["avatar"]["size"];

        if ($imageFileType != "pdf" && ($imageFileType != "png" && $imageFileType != "jpg" && $imageFileType != "jpeg")) {
            
            $errors['file_type'] = $lang['file_type'];

        } else if (empty($_FILES['avatar']['size'])) { //1048576 byte=1MB

            $errors['file_size'] = $lang['file_size'];

        } else {
            move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
            $avatar = "uploads/images/".$image_name;
        }

        // Construct the data array
        $data = array(
            'fname' => ucfirst(trim($_POST['fname'])),
            'lname' => ucfirst(trim($_POST['lname'])),
            'avatar' => $avatar,
            'phone' => $_POST['phone'],
            'user_id' => $_POST['user_id'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address'].', '.$_POST['city'].', '.$_POST['state']. ' State.'
        );
    }else{
        $data = array(
            'fname' => ucfirst(trim($_POST['fname'])),
            'lname' => ucfirst(trim($_POST['lname'])),
            'phone' => $_POST['phone'],
            'user_id' => $_POST['user_id'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address']
        );
    }

    // Assuming insert_staff is a function to insert staff data
    $update = update_user($data);

    if ($update) {
        if(isset($_POST['account_bank']) and isset($_POST['account_name']) and isset($_POST['account_number'])){
            $data = array(
                'about' => trim($_POST['about']),
                'company' => trim($_POST['company']),
                'job' => trim($_POST['job']),
                'twitter' => trim($_POST['twitter']),
                'facebook' => trim($_POST['facebook']),
                'instagram' => trim($_POST['instagram']),
                'linkedin' => trim($_POST['linkedin']),
                'account_bank' => trim($_POST['account_bank']),
                'account_name' => strtoupper(trim($_POST['account_name'])),
                'account_number' => trim($_POST['account_number']),
                'user_id' => $_POST['user_id'],
                'designation' => $_POST['designation']
            );
            $update = update_staff($data);
        }

        $action_history = array(
            'user_id' =>  $_SESSION['userid'],
            'acted_id' => $_POST['user_id'],
            'action_type' => $lang['update_staff'],
            'action' =>  $lang['update_staff_action'],
            'date_history' =>  date("Y-m-d H:i:s"),
          );
      
          //INSERT HISTORY USER
          insert_user_action_history(
              $action_history
          );
      
          $notification_data = array(
              'user_id' =>  $_SESSION['userid'],
              'acted_id' =>  $_POST['user_id'],
              'action_type' => $lang['update_staff'],
              'description' => $lang['update_staff_notification']
          );
          // SAVE NOTIFICATION
          insert_notification($notification_data);
      
          $notification_id = $db->dbh->lastInsertId();
      
          $staff = getUser("userlevel != 1 and branch_id ='".$_POST['branch']."'");
      
          foreach ($staff as $key) {
              $userNotification = array(
              "notification_id" => $notification_id,
              "branch_id" => $key->branch_id,
              "user_id" => $key->user_id);
              insert_notification_user($userNotification);
          }

          $messages['data_success'] = $lang['data_success'];

    } else {
        $errors['data_fail'] = $lang['data_fail'];
        $errors['data_exist'] = $lang['data_exist'];
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


