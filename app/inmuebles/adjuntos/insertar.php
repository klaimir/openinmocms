<?php include("../../../config/config.php");?>
<?php include("moduloadjuntos.php");?>
<?php include("ControlFicherosInmuebles.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales del inmueble
		$datos=ControlFicherosInmuebles::Validar($i,$hayerrores,$errores);
		
		// Asignamos las variables que almacenan la información sobre si ha habido errores 
		// y los errores cometidos en variables de sesiòn
		$_SESSION['hayerroresinsertaradjunto'] = $hayerrores;
		$_SESSION['erroresinsertaradjunto'] = $errores;

		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de Inmueble
			$fichero_inmueble = new ModelFicherosInmueble();
			$fichero_inmueble->Insert($datos);			
			// Se obtiene el último id insertado
			header("Location: index.php?id=".$_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","insertar"); ?>