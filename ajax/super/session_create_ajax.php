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

$currentYear = date("Y");
$nextYear = date("Y", strtotime("+1 year"));
$newsession = $currentYear . "/" . $nextYear;
$session = getSession("current=1");
if (!empty($session)) {
    $session = getSession("current=1")[0];
    if ($session->session == $newsession)
        $errors[] = $lang["new_session_error"] . $nextYear . ".";
}



// Processing the data if no errors
if (empty($errors)) {
    $data = array(
        "session" => $newsession,
        "year" => $currentYear,
        "current" => 1
    );
    // Assuming insert_session is a function to insert session data
    $insert = insert_session($data);

    if ($insert) {
        if (!empty($session)) {
            update_session(array("id" => $session->session_id));
        }


        $action_history = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['new_session'],
            'action' => $lang['new_session_created'] . $newsession . " academic session.",
            'date_history' => date("Y-m-d H:i:s"),
        );

        //INSERT HISTORY USER
        insert_user_action_history(
            $action_history
        );

        $notification_data = array(
            'user_id' => $_SESSION['userid'],
            'acted_id' => $_SESSION['userid'],
            'action_type' => $lang['new_session'],
            'description' => $lang['new_session_created'] . $newsession . " academic session."
        );
        // SAVE NOTIFICATION
        insert_notification($notification_data);

        $notification_id = $db->dbh->lastInsertId();


        $users = getUser("branch_id ='" . $_SESSION['branch'] . "' and (status=1 and suspended=0 and graduated=0)");

        foreach ($users as $key) {
            $userNotification = array(
                "notification_id" => $notification_id,
                "branch_id" => $key->branch_id,
                "user_id" => $key->user_id
            );
            insert_notification_user($userNotification);
        }
        $messages['session_success'] = $lang['session_success'];

        try {
            $settings = getSettings("settings_id=1")[0];
            $name = ucfirst(trim($_POST['lname'])) . ' ' . ucfirst(trim($_POST['fname']));
            $template = getEmailTemplate("name='welcome-session'")[0];
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
            $mail->addAddress($to, $name);
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


