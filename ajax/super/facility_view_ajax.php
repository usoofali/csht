<?php

require_once ("../../loader.php");
require_once ('../../helpers/querys.php');
$user = new User;
$db = new Conexion;

$sql = "SELECT * FROM facility";
$db->cdp_query($sql);
$db->cdp_execute();
$facilitys = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();

$dataArray = array();
if ($rowCount > 0) {

    $cnt = 0;

    foreach ($facilitys as $facility) {
        $sql = "SELECT branch.branch_id, branch.code FROM branch INNER JOIN facility on branch.branch_id=facility.branch_id WHERE branch.branch_id='" . $facility->branch_id . "'";
        $db->cdp_query($sql);
        $db->cdp_execute();
        $branch = $db->cdp_registro();
        $cnt += 1;
        $action = '<div class="">
                    <a class="icon" href="#' . $facility->facility_id . '" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Actions</h6>
                        </li>
                        <li><a class="dropdown-item geo-add" href="#" data-facility-id="' . $facility->facility_id . '">Add Coordinates</a></li>
                        <li><a class="dropdown-item geo-view" href="#" data-facility-id="' . $facility->facility_id . '">View Coordinates</a></li>
                        <li><a class="dropdown-item geo-delete" href="#" data-facility-id="' . $facility->facility_id . '">Delete Coordinates</a></li>
                        <li><a class="dropdown-item" href="super_view_facility.php?facility_id=' . $facility->facility_id . '">View Facility</a></li>
                        <li><a class="dropdown-item" href="super_edit_facility.php?facility_id=' . $facility->facility_id . '">Edit Facility</a></li>
                        <li><a class="dropdown-item delete-facility" href="#" data-facility-id="' . $facility->facility_id . '">Delete Facility</a></li>
                    </ul></div>';
        $no_action = '<div class="">
                    <a class="icon" href="#' . $facility->facility_id . '" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Actions</h6>
                        </li>
                        <li><a class="dropdown-item geo-view" href="#" data-facility-id="' . $facility->facility_id . '">View Coordinates</a></li>
                        <li><a class="dropdown-item" href="super_view_facility.php?facility_id=' . $facility->facility_id . '">View Facility</a></li>
                    </ul></div>';

        $dataArray[] = array(
            $cnt,
            $facility->name,
            $facility->address,
            $facility->city,
            $facility->state,
            $facility->level,
            $branch->code,
            ($user->branch == $branch->branch_id) ? $action : $no_action,
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

