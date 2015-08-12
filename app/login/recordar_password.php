<?php include("../../config/config.php");?>
<?php include("modulologin.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php require_once("../../modelos/Usuarios.class.php");?>
<?php include("ControlLogin.class.php");?>
<?php
	if($_POST)
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		$datos_formateados=ControlLogin::ValidarRecordarPassword($i,$hayerrores,$errores);
		
		$_SESSION['hayerroresrecordarpass'] = $hayerrores;
		$_SESSION['erroresrecordarpass'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de usuario
			$usuario = new ModelUsuarios();
			$usuario->correo=$datos_formateados['correo'];
			$usuario->nick=$datos_formateados['nick'];
			$usuario->EstablecerNuevoPassword();
			// Interfaz de confirmación
			header("Location: confirmacion_recordar_password.php");
		}
	}
?>
<?php Interfaz::PlantillaLogin("recordar_password"); ?>