<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../config/config.php");?>
<?php require_once("../../../modelos/Noticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Crea el fichero RSS en la ruta especificada
	ModelNoticias::GenerarFicherosRSS();
	//comienzo a escribir el código del RSS
	header("Location: index.php");
?>