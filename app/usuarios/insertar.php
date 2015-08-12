<?php include("../../config/config.php");?>
<?php include("modulousuarios.php");?>
<?php include("ControlUsuarios.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php require_once("../../modelos/Usuarios.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{		
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales
		$datos_formateados=ControlUsuarios::Validar($i,$hayerrores,$errores);
				
		$_SESSION['hayerroresinsertarusuario'] = $hayerrores;
		$_SESSION['erroresinsertarusuario'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de usuario
			$usuario = new ModelUsuarios();
			$usuario->Insert($datos_formateados);
			// Interfaz de editar
			header("Location:index.php");
		}
	}
?>
<?php Interfaz::PlantillaGenerica("usuarios","insertar"); ?>