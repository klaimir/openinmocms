<?php
session_start();

// Autoload stuff
require( '_system/autoload.php' );

if(!isset($_SESSION['direccion_street_view_google_maps']))
	$direccion='Avenida Ana de Viya, 3, Cádiz, Spain';
else
	$direccion=$_SESSION['direccion_street_view_google_maps'];

$direccion=utf8_encode($direccion);

$map = new \PHPGoogleMaps\Map;
$map->enableStreetView();
$map->setCenter($direccion);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Streetview</title>
	<link rel="stylesheet" type="text/css" href="_css/style.css">
	<?php $map->printHeaderJS() ?>
	<?php $map->printMapJS() ?>
</head>
<body>
	<h1>Streetview</h1>	
	<h2>Vista (Google maps)</h2>
	<?php $map->printMap() ?>
</body>
</html>