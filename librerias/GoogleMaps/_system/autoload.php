<?php
require( $_SERVER['DOCUMENT_ROOT'].'/gesticadiz/librerias/GoogleMaps/PHPGoogleMaps/Core/Autoloader.php' );
$map_loader = new SplClassLoader('PHPGoogleMaps', $_SERVER['DOCUMENT_ROOT'].'/gesticadiz/librerias/GoogleMaps/');
$map_loader->register();
?>