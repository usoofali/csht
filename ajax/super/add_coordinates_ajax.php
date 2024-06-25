<?php

require_once ("../../loader.php");
require_once ("../../helpers/querys.php");

$errors = array();

if (empty($_POST['id']))
    $errors['id'] = $lang['id_error'];


if (empty($errors)) {

    $data = array(
        'dept_id' => $_POST['id'],
        'latitude' => $_POST['latitude'],
        'longitude' => $_POST['longitude']
    );

    $insert = insert_geofence($data);

    if ($insert) {
        $messages["geo"] = $lang['geo_insert'];

    } else {
        $errors[] = $lang['geo_fail'];
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
    echo json_encode([
        'success' => true,
        'message' => $lang['geo_insert'],
    ]);
}


