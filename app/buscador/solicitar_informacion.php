<?php include("../../config/config.php");?>
<?php include("modulobuscador.php");?>
<?php include("../../modelos/Inmuebles.class.php");?>
<?php include("ControlBuscador.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales
		$datos=ControlBuscador::Validar($i,$hayerrores,$errores);
				
		$_SESSION['hayerroressolicitarinformacion'] = $hayerrores;
		$_SESSION['erroressolicitarinformacion'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Inmueble
			$inmueble = new ModelInmuebles();
			// Envío del correo con los datos
			$inmueble->EnviarCorreoSolicitudInformacion($datos);
			// Interfaz de datos adicionales
			header("Location: ver_datos_adicionales.php?id=".$_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("buscador","solicitar_informacion"); ?>