<?php include("../../../config/config.php");?>
<?php include("modulofotos.php");?>
<?php include("ControlFotosInmuebles.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicializaci�n de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;		
		
		// Validamos los datos generales del inmueble
		$datos=ControlFotosInmuebles::Validar($i,$hayerrores,$errores);
		
		// Asignamos las variables que almacenan la informaci�n sobre si ha habido errores 
		// y los errores cometidos en variables de sesi�n
		$_SESSION['hayerroresasignarfotos'] = $hayerrores;
		$_SESSION['erroresasignarfotos'] = $errores;

		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de Inmueble
			$foto_inmueble = new ModelFicherosInmueble();
			$foto_inmueble->Insert($datos);
			// Volvemos a editar para a�adir cualquier dato
			header("Location: ../editar.php?id=" . $_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","insertar"); ?>