<?php include("moduloenlaces.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/EnlacesInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Datos de Inmujeble
	$enlace_inmueble = new ModelEnlacesInmueble();
	$enlace_inmueble->Delete($_GET['id_enlace'],$_GET['id']);
	// Interfaz de edición
	header("Location: ../editar.php?id=" . $_GET['id']);
?>