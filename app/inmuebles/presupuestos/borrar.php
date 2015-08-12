<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("ControlPresupuestosInmueble.class.php");?>
<?php include("modulopresupuestos.php");?>
<?php require_once("../../../modelos/PresupuestosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_borrar=ControlPresupuestos::ComprobarAccesoBorrar($_GET['id_presupuesto'], $_GET['inmueble']);
	if($acceso_borrar == (int)(1))
	{		
		// Borrar en BD
		$presupuesto = new ModelPresupuestosInmueble();
		$presupuesto->Delete($_GET['id_presupuesto'],$_GET['inmueble']);
		// Buscador
		header("Location: index.php?id=" . $_GET['inmueble']);
	}
?>