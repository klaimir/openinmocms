<?php include("modulovideos.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Datos de Inmujeble
	$video_inmueble = new ModelFicherosInmueble();
	$video_inmueble->Delete($_GET['fichero'],$_GET['id']);
	// Interfaz de edición
	header("Location: ../editar.php?id=" . $_GET['id']);
?>