<?php include("../../config/config.php");?>
<?php include("modulousuarios.php");?>
<?php include("ControlUsuarios.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php require_once("../../modelos/Usuarios.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Si se pulsa el boton que actualiza la informacion del usuario
	if (isset($_POST['usuario']))
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales
		$datos_formateados=ControlUsuarios::Validar($i,$hayerrores,$errores);

		$_SESSION['hayerroresmodificarusuario'] = $hayerrores;
		$_SESSION['erroresmodificarusuario'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de usuario
			$usuario = new ModelUsuarios();
			$usuario->Update($datos_formateados,$_GET['usuario']);			
			// Si viene de un enlace externo
			include("../../general/enlace_volver_secciones.php");
		}
	}
?>
<?php Interfaz::PlantillaGenerica("usuarios","editar"); ?>