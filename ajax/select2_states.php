<?php

require_once("../loader.php");

$db = new Conexion; 

$list = array();
$data = [];


$sql = "SELECT * FROM state";

$db->cdp_query($sql);
$db->cdp_execute();
$datas = $db->cdp_registros();

foreach ($datas as $key) {
    $data[$key->state_id] = array('text' => $key->name);
}

echo json_encode($data);