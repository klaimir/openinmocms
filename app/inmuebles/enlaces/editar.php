<?php include("../../../config/config.php");?>
<?php include("moduloenlaces.php");?>
<?php include("ControlEnlacesInmuebles.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/EnlacesInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;		
		
		// Validamos los datos generales del inmueble
		$datos=ControlEnlacesInmuebles::Validar($i,$hayerrores,$errores);
		
		// Asignamos las variables que almacenan la información sobre si ha habido errores 
		// y los errores cometidos en variables de sesiòn
		$_SESSION['hayerroreseditarenlaces'] = $hayerrores;
		$_SESSION['erroreseditarenlaces'] = $errores;

		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de Inmueble
			$enlace_inmueble = new ModelEnlacesInmueble();
			$enlace_inmueble->Update($datos,$datos['id_enlace'],$datos['inmueble']);
			// Volvemos a editar para añadir cualquier dato
			header("Location: ../editar.php?id=" . $_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","editar"); ?>