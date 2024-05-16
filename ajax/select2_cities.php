<?php

require_once("../loader.php");

$db = new Conexion;

$state = cdp_sanitize($_REQUEST['id']);


$list = array();
$data = [];

$sql = "SELECT * FROM city WHERE state_id=" . $state;

$db->cdp_query($sql);
$db->cdp_execute();
$datas = $db->cdp_registros();

foreach ($datas as $key) {

    $data[$key->city_id] = array('text' => $key->name);
}

echo json_encode($data);