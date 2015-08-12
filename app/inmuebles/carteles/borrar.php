<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("ControlCartelesInmueble.class.php");?>
<?php include("modulocarteles.php");?>
<?php require_once("../../../modelos/CartelesInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_borrar=ControlCarteles::ComprobarAccesoBorrar($_GET['id_cartel'], $_GET['inmueble']);
	if($acceso_borrar == (int)(1))
	{		
		// Borrar en BD
		$cartel = new ModelCartelesInmueble();
		$cartel->Delete($_GET['id_cartel'],$_GET['inmueble']);
		// Buscador
		header("Location: index.php?id=" . $_GET['inmueble']);
	}
?>