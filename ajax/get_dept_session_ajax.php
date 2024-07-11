<?php

require_once ("../loader.php");
require_once ('../helpers/querys.php');


$branch = $_REQUEST['id'];

$depts = getDept("branch_id='" . $branch . "'");
$sessions = getSession("branch_id='" . $branch . "'");

$deptCount = count($depts);
$sessionCount = count($sessions);

$deptArray = array();
$sessionArray = array();

if ($deptCount > 0) {
    foreach ($depts as $dept) {
        $deptArray[$dept->dept_id] = $dept->name;
    }
}

if ($sessionCount > 0) {
    foreach ($sessions as $session) {
        $sessionArray[$session->session_id] = $session->session;
    }
}

$resultObject = array(
    "dept" => $deptArray,
    "session" => $sessionArray
);

$resultJSON = json_encode($resultObject);
echo $resultJSON;


