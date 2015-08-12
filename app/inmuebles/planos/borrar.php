<?php include("moduloplanos.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Datos de Inmujeble
	$plano_inmueble = new ModelFicherosInmueble();
	$plano_inmueble->Delete($_GET['fichero'],$_GET['id']);
	// Interfaz de edición
	header("Location: ../editar.php?id=" . $_GET['id']);
?>