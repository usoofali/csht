<?php

require_once ("../loader.php");
require_once ('../helpers/querys.php');
$user = new User;
$db = new Conexion;

$sWhere = " WHERE recipient ='" . $_SESSION['userid'] . "'";
$sql = "

SELECT a.message_id, a.subject, a.body, a.message_status, a.message_read, a.created_at, a.sender, a.recipient, b.fname, b.lname

FROM message as a
INNER JOIN user as b ON b.user_id = a.sender

$sWhere

order by a.message_id desc

";

$db->cdp_query($sql);
$db->cdp_execute();
$messages = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();

$dataArray = array();
if ($rowCount > 0) {

    $dataArray = array();
    foreach ($messages as $message) {

        $class = ($message->message_read == 0) ? "badge bg-warning" : "badge bg-success";
        $status = ($message->message_read == 0) ? "New" : "Read";

        $action = '<div class=""><a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
            <h6>Actions</h6>
            </li>';
        $action .= '<li><a class="dropdown-item view-message" href="#" data-message-subject="' . $message->subject . '" data-message-id="' . $message->recipient . '" data-message-sender="' . $message->fname . " " . $message->lname . '" data-message-body="' . $message->body . '" data-message-id="' . $message->message_id . '">View</a></li>
            <li><a class="dropdown-item delete-message" href="#" data-message-id="' . $message->message_id . '">Delete</a></li>
            </ul>
            </div>';

        $dataArray[] = array(
            $message->fname . " " . $message->lname,
            $message->subject,
            $message->body,
            $message->created_at,
            '<span class="' . $class . '">' . $status . '</span>',
            $action

        );
    }
    $resultObject = array(
        "data" => $dataArray
    );
    // Convert the result to JSON format
    $resultJSON = json_encode($resultObject);
    // Output the JSON
    echo $resultJSON;

} else {
    $resultObject = array(
        "data" => $dataArray
    );
    // Convert the result to JSON format
    $resultJSON = json_encode($resultObject);
    // Output the JSON
    echo $resultJSON;

}

