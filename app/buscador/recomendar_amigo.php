<?php include("../../config/config.php");?>
<?php include("modulobuscador.php");?>
<?php include("../../modelos/Inmuebles.class.php");?>
<?php include("ControlBuscador.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php
	if ($_POST) 
	{
		// Inicializaci�n de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales
		$datos=ControlBuscador::ValidarRecomendarAmigo($i,$hayerrores,$errores);
				
		$_SESSION['hayerroresrecomendaramigo'] = $hayerrores;
		$_SESSION['erroresrecomendaramigo'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Inmueble
			$inmueble = new ModelInmuebles();
			// Inserci�n de la recomendaci�n
			$inmueble->InsertarRecomendacionAmigo($datos);
			// Env�o del correo con los datos
			$inmueble->EnviarCorreoRecomendarAmigo($datos);
			// Interfaz de datos adicionales
			header("Location: ver_datos_adicionales.php?id=".$_POST['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("buscador","recomendar_amigo"); ?>