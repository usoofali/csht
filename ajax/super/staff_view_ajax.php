<?php

require_once("../../loader.php");
require_once('../../helpers/querys.php');
$user = new User;
$db = new Conexion;

if($_SESSION['userlevel'] == 9){
$sql = "SELECT * FROM user WHERE (userlevel != 1)";

} else{
$sql = "SELECT * FROM user WHERE (userlevel != 1 and userlevel != 9) and branch_id='".$_SESSION['branch']."'";
}

$db->cdp_query($sql.$where);
$db->cdp_execute();
$staffs = $db->cdp_registros();
$rowCount = $db->cdp_rowCount();

if ($rowCount > 0) { 
        
        $cnt = 0;
        $dataArray = array();
        foreach ($staffs as $staff) { 
            $cnt += 1;
            $action = '<div class="">
                    <a class="icon" href="#'.$staff->user_id.'" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                        <li class="dropdown-header text-start">
                            <h6>Actions</h6>
                        </li>
                        <li><a class="dropdown-item" href="staff_view.php?id='.$staff->user_id.'">View</a></li>
                        <li><a class="dropdown-item delete-staff" href="#" data-staff-id="'.$staff->user_id.'">Delete</a></li>
                    </ul></div>';

            $dataArray[] = array(
                $cnt,
                '<a href="staff_view.php?id='.$staff->user_id.'" class="text-primary">'.$staff->fname." ".$staff->lname.'</a>',
                $staff->email,
                $staff->address,
                '<a href="tel:'.$staff->phone.'">'.$staff->phone.'</a>',
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
} 

