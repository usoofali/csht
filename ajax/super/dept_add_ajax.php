<?php

require_once ("../../loader.php");
require_once ("../../helpers/querys.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../helpers/PHPMailer/src/Exception.php';
require '../../helpers/PHPMailer/src/PHPMailer.php';
require '../../helpers/PHPMailer/src/SMTP.php';

$user = new User;
$core = new Core;
$db = new Conexion;

$errors = array();

if (empty($_POST['name']))
  $errors['name'] = $lang['dept_name_error'];

if (empty($_POST['iso']))
  $errors['iso'] = $lang['dept_code_error'];

if (empty($_POST['hod']))
  $errors['hod'] = $lang['hod_code_error'];

if (empty($_POST['exam_officer']))
  $errors['eo'] = $lang['eo_code_error'];

if (empty($errors)) {
  update_staff_role($_POST['hod'], "hod", 0);
  update_staff_role($_POST['exam_officer'], "exam_officer", 0);
  $data = array(
    'dept_id' => trim(""),
    'staff_id' => trim(getStaff("user_id=" . $_POST['hod'])[0]->staff_id),
    'exam_officer' => trim(getStaff("user_id=" . $_POST['exam_officer'])[0]->staff_id),
    'branch_id' => trim($_SESSION['branch']),
    'name' => strtoupper(trim($_POST['name'])),
    'iso' => strtoupper(trim($_POST['iso']))
  );

  $insert = insert_dept($data);

  if ($insert) {

    update_staff_role($_POST['hod'], "hod", 1);
    update_staff_role($_POST['exam_officer'], "exam_officer", 1);

    $action_history = array(
      'user_id' => $_SESSION['userid'],
      'acted_id' => $_SESSION['userid'],
      'action_type' => $lang['add_dept'],
      'action' => $lang['add_dept_action'],
      'date_history' => date("Y-m-d H:i:s"),
    );

    //INSERT HISTORY USER
    insert_user_action_history(
      $action_history
    );

    $notification_data = array(
      'user_id' => $_SESSION['userid'],
      'acted_id' => $_SESSION['userid'],
      'action_type' => $lang['added_dept'],
      'description' => $lang['add_dept_notification']
    );
    // SAVE NOTIFICATION
    insert_notification($notification_data);

    $notification_id = $db->dbh->lastInsertId();


    $staff = getUser("userlevel != 1 and branch_id ='" . $_SESSION['branch'] . "'");

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
      $staff = getUser("user_id='" . $_POST['hod'] . "'")[0];
      $staff_name = ucfirst(trim($staff->lname)) . ' ' . ucfirst(trim($staff->fname));
      $template = getEmailTemplate("name='welcome-hod'")[0];
      $body = str_replace(
        array(
          '[URL]',
          '[STAFF]',
          '[DEPT]',
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
          $staff_name,
          strtoupper(trim($_POST['name'])),
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
          $settings->c_country
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
      $to = strtolower(trim($staff->email));
      $mail->addAddress($to, $staff_name);
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
    $errors[] = $lang['data_fail'];
    $errors[] = $lang['data_exist'];
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


