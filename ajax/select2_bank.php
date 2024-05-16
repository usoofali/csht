<?php
require_once("../loader.php");
require_once("../helpers/querys.php");

$db = new Conexion;

$search = cdp_sanitize($_REQUEST['q']);

$list = array();
$data = [];


$sql = "SELECT * FROM bank
 WHERE
  (name LIKE '" . $search . "%')";

$db->cdp_query($sql);
$db->cdp_execute();
$datas = $db->cdp_registros();

foreach ($datas as $key) {

	$data[] = array('id' => $key->bank_id, 'text' => $key->name);
}

echo json_encode($data);