<?php
require_once("../../loader.php");
require_once("../../helpers/querys.php");

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
    'branch' => 'Branch'
);

foreach ($fields as $field => $label) {
    if (empty($_POST[$field])) {
        $errors[$field] = ucfirst($label) . " cannot be empty";
    }
}

if(!empty($_POST['account_no'])){
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
            $avatar = "uploads/images/".$image_name;
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
            'address' => $_POST['address'].', '.$_POST['city'].', '.$_POST['state']. ' State.',
            'newsletter' => isset($_POST['newsletter']) ? $_POST['newsletter'] : 0,
            'active' => isset($_POST['active']) ? $_POST['active'] : 0,
            'userlevel' => $_POST['userlevel'],
            'branch' => $_POST['branch'],
            'notes' => $_POST['notes']
        );
    }

    

    // Assuming insert_staff is a function to insert staff data
    $insert = insert_user($data);
    

    if ($insert) {

        if(isset($_POST['acct_bank']) and isset($_POST['acct_name']) and isset($_POST['acct_no'])){
            $user_id = getUser("email='".strtolower(trim($_POST['email']))."'")[0]->user_id;
            $data = array(
                'acct_bank' => trim($_POST['acct_bank']),
                'acct_name' => strtoupper(trim($_POST['acct_name'])),
                'acct_no' => trim($_POST['acct_no']),
                'user_id' => $user_id
            );
            $insert = insert_staff($data);
        }

        $messages[] = $lang['data_success'];
    } else {
        $errors['data_fail'] = $lang['data_fail'];
        $errors['data_exist'] = $lang['data_exist'];
    }

    // // try {

    // //   $body = str_replace(
    // //     array(
    // //       '[URL]',
    // //       '[URL_LINK]',
    // //       '[SITE_NAME]'
    // //     ),
    // //     array(
    // //       $core->site_url,
    // //       $core->logo,
    // //       $core->site_name
    // //     ),
    // //     $body
    // //   );
    
    // //  //Create an instance; passing `true` enables exceptions
    // //   $mail = new PHPMailer(true);
    // //   //Server settings
    // //   // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    // //   $mail->isMail();                                            //Send using SMTP
    // //   $mail->Host       = $settings->smtp_host;                   //Set the SMTP server to send through
    // //   $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    // //   $mail->Username   = $settings->info_mail;                     //SMTP username
    // //   $mail->Password   = $settings->smtp_password;                               //SMTP password
    // //   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    // //   $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
    // //   // Recipients
    // //   $mail->setFrom($settings->info_mail, $settings->site_name);
    // //   $to = '';
    // //   foreach ($userrows as $user) {  
    // //       $to .= $user->email . ',';
    // //   }
    // //   $to = rtrim($to, ','); 
    // //   $mail->addAddress($to);
    // //        //Add a recipient            //Name is optional
    // //   $mail->addReplyTo($settings->site_email, 'Information');
    // //   $mail->addCC($settings->site_email);
    // //   $mail->addBCC($settings->info_mail);
    
    // //   // //Attachments
    // //   // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // //   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
    // //   //Content
    // //   $mail->isHTML(true);                                  //Set email format to HTML
    // //   $mail->Subject = $subject;
    // //   $mail->Body    = $body;
    // //   $mail->SMTPOptions = array(
    // //     'ssl' => array(
    // //         'verify_peer' => false,
    // //         'verify_peer_name' => false,
    // //         'allow_self_signed' => true
    // //     )
    // //   );
    // //   $mail->send();
     
    // //   if ($mail) {
    // //     $messages['message'] =  $count ." Email sent successfully.";
        
    // //   } else {
    // //     $errors['error'] =  "Failed to send email.";
    // //   }
    // // } catch (Exception $e) {
    // //   $errors['error'] =  "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // // }

    // $dataHistory = array(
    //   'user_id' =>  $_SESSION['userid'],
    //   'order_id' =>  $shipment_id,
    //   'order_track' => $order_track,
    //   'action' =>  $lang['notification_shipment8'],
    //   'date_history' =>  cdp_sanitize(date("Y-m-d H:i:s")),
    // );

    // //INSERT HISTORY USER
    // cdp_insertCourierShipmentUserHistory(
    //     $dataHistory
    // );

    // $dataNotification = array(
    //     'user_id' =>  $_SESSION['userid'],
    //     'order_id' =>  $shipment_id,
    //     'order_track' =>  $order_track,
    //     'notification_description' => $lang['notification_shipment'],
    //     'shipping_type' => '1',
    //     'notification_date' =>  cdp_sanitize(date("Y-m-d H:i:s")),
    // );
    // // SAVE NOTIFICATION
    // cdp_insertNotification(
    //     $dataNotification
    // );

    // $notification_id = $db->dbh->lastInsertId();

    // $users_employees = cdp_getUsersAdminEmployees();

    // foreach ($users_employees as $key) {
    //   cdp_insertNotificationsUsers($notification_id, $key->id);
    // }

    // cdp_insertNotificationsUsers($notification_id, intval($_POST['sender_id']));
      
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


