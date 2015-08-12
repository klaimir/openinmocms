<?php include("moduloadjuntos.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Datos de Inmueble
	$fichero_inmueble = new ModelFicherosInmueble();
	$fichero_inmueble->Delete($_GET['id_fichero'],$_GET['id']);			
	// Se obtiene el último id insertado
	header("Location: index.php?id=".$_GET['id']);
?>