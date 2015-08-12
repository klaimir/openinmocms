<?php include("modulousuarios.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php include("ControlUsuarios.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$array_errores=ControlUsuarios::ComprobarBorrar($_GET['usuario']);
	$cont_errores=0;
	if(in_array(0,$array_errores))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][$cont_errores++]="El usuario seleccionado no existe";
		
	}
	if(in_array(-1,$array_errores))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][$cont_errores++]="El usuario seleccionado ha creado algún aviso de certificación energética";
	}
	if(in_array(-2,$array_errores))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][$cont_errores++]="El usuario seleccionado ha creado algún contrato de arrendamiento de algún inmueble";
	}
	if($_SESSION['hay_errores_general']==true)
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
?>
<?php Interfaz::PlantillaGenerica("usuarios","estas_seguro"); ?>