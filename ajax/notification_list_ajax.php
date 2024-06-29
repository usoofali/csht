<?php

require_once ("../loader.php");
require_once ('../helpers/querys.php');
$user = new User;
$db = new Conexion;

$sWhere = " WHERE b.user_id ='" . $_SESSION['userid'] . "'";
$sql = "

SELECT a.user_id as admin_id, a.notification_id,  a.acted_id, a.action_type, a.description, a.created_at, b.notification_read, b.notification_status, c.fname, c.lname 

FROM notification as a

INNER JOIN notification_user as b ON a.notification_id = b.notification_id
INNER JOIN user as c ON c.user_id = b.user_id

$sWhere

-- GROUP BY  a.notification_id
order by b.notification_id desc

";
$db->cdp_query($sql);
$db->cdp_execute();
$notifications = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();

$dataArray = array();
if ($rowCount > 0) {

    foreach ($notifications as $notification) {
        $href = '';
        switch ($notification->action_type) {
            case 'Add Staff':
                $href = 'staff_view.php?id=' . $notification->acted_id . '&notification_id=' . $notification->notification_id;
                break;
            case 'Update Staff':
                $href = 'staff_view.php?id=' . $notification->acted_id . '&notification_id=' . $notification->notification_id;
                break;
            case 'Add Student':
                $href = 'student_view.php?id=' . $notification->acted_id . '&notification_id=' . $notification->notification_id;
                break;
            default:
                $href = 'staff_view.php?id=' . $notification->acted_id . '&notification_id=' . $notification->notification_id;
                break;
        }
        $class = ($notification->notification_status == 1) ? "badge bg-warning" : "badge bg-success";
        $status = ($notification->notification_read == 0) ? "New" : "Read";

        $action = '<div class=""><a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                        <h6>Actions</h6>
                        </li>';
        $action .= '<li><a class="dropdown-item" href="' . $href . '">View</a></li>
                        <li><a class="dropdown-item delete-notification" href="#" data-notification-id="' . $notification->notification_id . '">Delete</a></li>
                        </ul>
                        </div>';

        $dataArray[] = array(
            $notification->created_at,
            '<a href="' . $href . '" class="text-primary">' . $notification->description . '</a>',
            $notification->fname . " " . $notification->lname,
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





