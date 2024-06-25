<?php
require_once ("../../loader.php");
require_once ("../../helpers/querys.php");
// require_once("../../helpers/queries.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../helpers/PHPMailer/src/Exception.php';
require '../../helpers/PHPMailer/src/PHPMailer.php';
require '../../helpers/PHPMailer/src/SMTP.php';

$user = new User;
$core = new Core;
$db = new Conexion;

$errors = array();
$messages = array();
$userRoles = array(
    9 => "Super User",
    1 => "Student",
    2 => "Admin Officer",
    3 => "Exam Officer",
    4 => "Hod",
    5 => "Cashier",
    6 => "Registrar",
    7 => "Lecturer",
    8 => "Provost"
);

$fields = array(
    'fname' => 'First Name',
    'lname' => 'Last Name',
    'email' => 'Email',
    'password' => 'Password',
    'username' => 'Username',
    'phone' => 'Phone',
    'gender' => 'Gender',
    'state' => 'State',
    'city' => 'City',
    'address' => 'Address',
    'userlevel' => 'User Level',
    'branch' => 'Branch',
    'account_number' => 'Account Number',
    'account_name' => 'Account Name',
    'account_bank' => 'Bank'
);

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
                if (!preg_match('/^\+?[0-9]{11,15}$/', $value)) {
                    $errors[$field] = "Invalid phone number";
                }
                break;
            case 'password':
                if (strlen($value) < 6) {
                    $errors[$field] = "Password must be at least 6 characters long";
                }
                break;
            // Add more specific validations as needed
        }
    }
}


if ($_POST['userlevel'] == "") {
    $errors['userlevel'] = "Select User Role";
}

if (!empty($_POST['account_no'])) {
    if (!preg_match("/^\d{10}$/", $_POST['account_no'])) {
        $errors["account"] = "Invalid account number";
    }
}

// Additional checks for specific inputs
if (empty($_FILES['avatar']['name'])) {
    $errors['avatar'] = "Avatar cannot be empty";
}

// Processing the data if no errors
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
            $avatar = "uploads/images/" . $image_name;
        }

        // Construct the data array
        $data = array(
            'fname' => ucfirst(trim($_POST['fname'])),
            'lname' => ucfirst(trim($_POST['lname'])),
            'email' => strtolower(trim($_POST['email'])),
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT), // You should hash the password before storing it
            'username' => trim($_POST['username']),
            'avatar' => $avatar,
            'phone' => $_POST['phone'],
            'gender' => $_POST['gender'],
            'address' => $_POST['address'] . ', ' . $_POST['city'] . ', ' . $_POST['state'] . ' State.',
            'newsletter' => isset($_POST['newsletter']) ? $_POST['newsletter'] : 0,
            'active' => isset($_POST['active']) ? $_POST['active'] : 0,
            'userlevel' => $_POST['userlevel'],
            'branch' => $_POST['branch'],
            'notes' => $_POST['notes']
        );
    }

    // Assuming insert_staff is a function to insert staff data
    $insert = insert_user($data);
    $user_id = '';

    if ($insert) {
        $user_id = getUser("email='" . strtolower(trim($_POST['email'])) . "'")[0]->user_id;
        if (isset($_POST['account_bank']) and isset($_POST['account_name']) and isset($_POST['account_number'])) {
            $data = array(
                'account_bank' => trim($_POST['account_bank']),
                'account_name' => strtoupper(trim($_POST['account_name'])),
                'account_number' => trim($_POST['account_number']),
                'user_id' => $user_id,
                'designation' => $userRoles[intval($_POST['userlevel'])]
            );
            $insert = insert_staff($data);
        }

        $action_history = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $user_id,
            'action_type' => $lang['add_staff'],
            'action' => $lang['add_staff_action'],
            'date_history' => date("Y-m-d H:i:s"),
        );

        //INSERT HISTORY USER
        insert_user_action_history(
            $action_history
        );

        $notification_data = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $user_id,
            'action_type' => $lang['add_staff'],
            'description' => $lang['add_staff_notification']
        );
        // SAVE NOTIFICATION
        insert_notification($notification_data);

        $notification_id = $db->dbh->lastInsertId();


        $staff = getUser("userlevel != 1 and branch_id ='" . $_POST['branch'] . "'");

        foreach ($staff as $key) {
            $userNotification = array(
                "notification_id" => $notification_id,
                "branch_id" => $key->branch_id,
                "user_id" => $key->user_id
            );
            insert_notification_user($userNotification);
        }

        $messages['data_success'] = $lang['data_success'];
        try {
            $settings = getSettings("settings_id=1")[0];
            $staff = ucfirst(trim($_POST['lname'])) . ' ' . ucfirst(trim($_POST['fname']));
            $template = getEmailTemplate("name='welcome-staff'")[0];
            $body = str_replace(
                array(
                    '[URL]',
                    '[STAFF]',
                    '[IT_SUPPORT_MAIL]',
                    '[PHONE]',
                    '[PROVOST]',
                    '[SIGNATURE]',
                    '[ABOUT]',
                    '[ADDRESS]',
                    '[CITY]',
                    '[STATE]',
                    '[SITE_NAME]',
                    '[LOGO]',
                    '[SCHOOL]',
                    '[COUNTRY]'
                ),
                array(
                    $settings->site_url,
                    $staff,
                    $settings->support_mail,
                    $settings->c_phone,
                    $settings->provost,
                    $settings->signature,
                    $settings->about,
                    $settings->c_address,
                    $settings->c_city,
                    $settings->c_state,
                    $settings->site_name,
                    $settings->logo,
                    $settings->site_name,
                    $settings->c_country,
                ),
                $template->body
            );
            error_log($body);
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            //Server settings
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isMail();                                            //Send using SMTP
            $mail->Host = $settings->smtp_host;                   //Set the SMTP server to send through
            $mail->SMTPAuth = true;                                   //Enable SMTP authentication
            $mail->Username = $settings->info_mail;                     //SMTP username
            $mail->Password = $settings->smtp_password;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom($settings->operations_mail, $settings->site_name);
            $to = strtolower(trim($_POST['email']));
            $mail->addAddress($to, $staff);
            $mail->addReplyTo($settings->site_email, 'Information');
            $mail->addCC($settings->site_email);
            $mail->addBCC($settings->info_mail);

            // //Attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = str_replace(array('[SCHOOL]'), array($settings->site_name), $template->subject);
            $mail->Body = $body;
            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
            $mail->send();

            if ($mail) {
                $messages['success_message'] = " Email sent successfully.";
            } else {
                $messages['fail_message'] = "Failed to send email.";
            }
        } catch (Exception $e) {
            $messages['error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            //   $errors['error'] =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

    } else {
        $errors['data_fail'] = $lang['data_fail'];
        $errors['data_exist'] = $lang['data_exist'];
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


