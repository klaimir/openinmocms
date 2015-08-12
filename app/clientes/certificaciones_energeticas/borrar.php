<?php include("../../../config/config.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("ControlCertificacionesEnergeticas.class.php");?>
<?php include("modulocertificaciones_energeticas.php");?>
<?php require_once("../../../modelos/CertificacionesEnergeticasCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_borrar=ControlCertificacionesEnergeticas::ComprobarAccesoBorrarContrato($_GET['inmueble'],$_GET['cliente']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El aviso de certificación energética ya ha sido firmado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado está publicado y no tiene certificación energética especificada";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(1))
	{		
		// Borrar en BD
		$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
		$certificacion_energetica->Delete($_GET['cliente'],$_GET['inmueble']);
		// Buscador
		header("Location: index.php?id=" . $_GET['cliente']."&inmueble=" . $_GET['inmueble']);
	}
?>