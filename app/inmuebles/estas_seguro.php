<?php include("moduloinmuebles.php");?>
<?php include("../../config/config.php");?>
<?php include("ControlInmuebles.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_borrar=ControlInmuebles::ComprobarBorrar($_GET['id']);
	if($acceso_borrar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado tiene generado algún contrato de compra-venta o arrendamiento";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El usuario actual no puede gestionar la población del inmueble seleccionado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(-3))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado está asociado a alguna ficha de visita";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_borrar == (int)(-4))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado ha sido recomendado a un amigo";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","estas_seguro"); ?>