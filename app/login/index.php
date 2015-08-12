<?php include("../../config/config.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php require_once("../../modelos/Usuarios.class.php");?>
<?php include("modulologin.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("ControlLogin.class.php");?>
<?php
	$hayerrores = false;
	unset($error);
	$i=0;
	
	$MM_redirectLoginSuccess=ControlLogin::ValidarAccesoUsuario($i,$hayerrores,$error);
	
	$_SESSION['hayerroreslogin'] = $hayerrores;
	$_SESSION['erroreslogin'] = $error;
	
	// Dirección de acceso con éxito
	if(!$hayerrores)
		header("Location: " . $MM_redirectLoginSuccess );
?>
<?php Interfaz::PlantillaLogin("login"); ?>