<?php

$user = new User;
$db = new Conexion;
$db->cdp_query("SELECT * FROM settings");

$db->cdp_execute();
$settings = $db->cdp_registro();
$numrows = $db->cdp_rowCount();

if ($numrows > 0) {

	$config_lang = $settings->language;
	$user_lang = $user->user_lang;

	if($config_lang !== $user_lang){
		$config_lang = $user_lang;
	}

	
	if ($config_lang == "ar") {
		$direction_layout = "rtl";
		// $direction_layout = "ltr";
	} else {
		$direction_layout = "ltr";
	}


	switch ($config_lang) {
		case "ha":
			//echo "PAGE HA";
			include("languages/$config_lang.php"); //include check session FR
			break;
		case "br":
			//echo "PAGE BRAZIL";
			include("languages/$config_lang.php");
			break;
		case "ar":

			include("languages/$config_lang.php");
			break;
		case "es":
			//echo "PAGE ES";
			include("languages/$config_lang.php");
			break;
		case "en":
			//echo "PAGE EN";
			include("languages/$config_lang.php");
			break;
		default:
			//echo "PAGE EN - Setting Default";
			include("languages/$config_lang.php"); //include EN in all other cases of different lang detection
			break;
	}
}
