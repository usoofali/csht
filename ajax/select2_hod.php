<?php
require_once ("../loader.php");
require_once ("../helpers/querys.php");

$db = new Conexion;

$search = cdp_sanitize($_REQUEST['q']);

$list = array();
$data = [];


$sql = "SELECT * FROM user
 WHERE
  (fname LIKE '" . $search . "%' or lname LIKE '" . $search . "%') and (userlevel != 1)";

$db->cdp_query($sql);
$db->cdp_execute();
$datas = $db->cdp_registros();
foreach ($datas as $key) {

    $data[] = array('id' => $key->user_id, 'text' => $key->fname . " " . $key->lname);
}

echo json_encode($data);