<?php

require_once ("../../loader.php");
require_once ('../../helpers/querys.php');
$user = new User;
$db = new Conexion;

if ($_POST['type'] == "dept"):
    $sql = "SELECT * FROM geofence WHERE dept_id='" . $_POST['id'] . "'";
else:
    $sql = "SELECT * FROM geofence WHERE facility_id='" . $_POST['id'] . "'";
endif;

$db->cdp_query($sql);
$db->cdp_execute();
$coordinates = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();
$dataArray = array();

if ($rowCount > 0) {
    $cnt = 0;
    foreach ($coordinates as $coordinate) {
        $cnt += 1;
        $dataArray[] = array(
            $cnt,
            $coordinate->latitude,
            $coordinate->longitude
        );
    }
    $resultObject = array(
        "data" => $dataArray,
        "success" => true
    );
    // Convert the result to JSON format
    $resultJSON = json_encode($resultObject);
    // Output the JSON
    echo $resultJSON;
} else {
    $resultObject = array(
        "data" => $dataArray,
        "success" => false
    );
    // Convert the result to JSON format
    $resultJSON = json_encode($resultObject);
    // Output the JSON
    echo $resultJSON;

}

