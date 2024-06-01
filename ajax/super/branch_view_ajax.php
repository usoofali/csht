<?php

require_once("../../loader.php");
require_once('../../helpers/querys.php');

$branches = getAllBranch();

$numbranchs = count($branches);

if ($numbranchs > 0) {
        $cnt = 0;
        // Create an empty array to hold the data
        $dataArray = array();
        foreach ($branches as $branch) { 

            $cnt += 1;
            $students = count(getStudent("branch_id=".$branch->branch_id));
            $class = ($branch->status==1) ? "badge bg-warning" : "badge bg-success";
            $status = getStyle("style_id=".$branch->status)[0]->status;
            $status = '<span class="'. $class .'">'. $status .'</span>';
            $action  ='<div class="">';
            $action .= '<a class="icon" href="#'.$branch->branch_id.'" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>';
            $action .= '<ul class="dropdown-menu dropdown-menu-end dropdown-menu-arbranch">';
            $action .= '<li class="dropdown-header text-start">';
            $action .= '<h6>Actions</h6>';
            $action .=  '</li><li><a class="dropdown-item" href="branch_view.php?id='.$branch->branch_id.'">View</a></li>
                <li><a class="dropdown-item" href="super_edit_branch.php?id='.$branch->branch_id.'">Edit</a></li>
                <li><a class="dropdown-item delete-branch" href="#" data-branch-id="'.$branch->branch_id.'">Delete</a></li>
                </ul>
                </div>';

            $dataArray[] = array(
                $cnt,
                '<a href="branch_view.php?id='.$branch->branch_id.'" class="text-primary">'.$branch->name.'</a>',
                $branch->code,
                $students,
                $branch->address,
                $status,
                $action
                
            );
        // Create the final object with the data array
        
    }
        $resultObject = array(
            "data" => $dataArray
        );

    // Convert the result to JSON format
        $resultJSON = json_encode($resultObject);

        // Output the JSON
        echo $resultJSON;
}


