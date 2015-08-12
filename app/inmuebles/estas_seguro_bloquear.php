<?php include("moduloinmuebles.php");?>
<?php include("../../config/config.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("ControlInmuebles.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_bloquear=ControlInmuebles::ComprobarBloquear($_GET['id'],$_GET['bloqueado']);
	if($acceso_bloquear == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado no tiene determinado aviso de certificaci�n energ�tica ni se ha determinado su certificaci�n";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_bloquear == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado est� cerrado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_bloquear == (int)(-3))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El usuario actual no puede gestionar la poblaci�n del inmueble seleccionado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","estas_seguro_bloquear"); ?>