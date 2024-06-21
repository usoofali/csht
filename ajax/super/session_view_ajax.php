<?php

require_once ("../../loader.php");
require_once ('../../helpers/querys.php');
$user = new User;
$db = new Conexion;


$sql = "SELECT * FROM session";

$db->cdp_query($sql);
$db->cdp_execute();
$sessions = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();
$dataArray = array();
if ($rowCount > 0) {

    $cnt = 0;

    foreach ($sessions as $session) {
        $cnt += 1;
        $class = ($session->current == 0) ? "badge bg-warning" : "badge bg-success";
        $current = ($session->current == 0) ? "Inactive" : "Active";
        $current = '<span class="' . $class . '">' . $current . '</span>';
        $action = '<div class="">
                    <a class="icon" href="#' . $session->session_id . '" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Actions</h6>
                        </li>
                        <li><a class="dropdown-item delete-session" href="#" data-session-id="' . $session->session_id . '">Delete Session</a></li>
                    </ul></div>';

        $dataArray[] = array(
            $cnt,
            $session->session,
            $session->year,
            $current,
            $session->created_at,
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

