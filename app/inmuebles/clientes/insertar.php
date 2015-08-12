<?php include("../../../config/config.php");?>
<?php include("moduloclientes.php");?>
<?php include("ControlClientesInmuebles.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/ClientesInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_insertar_cliente_inmueble=ControlClientesInmuebles::ComprobarInsertar($_GET['id']);
	if($acceso_insertar_cliente_inmueble == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El usuario actual no puede gestionar la población del inmueble seleccionado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales del cliente
		$datos=ControlClientesInmuebles::Validar($i,$hayerrores,$errores);				
		
		// Asignamos las variables que almacenan la información sobre si ha habido errores 
		// y los errores cometidos en variables de sesiòn
		$_SESSION['hayerroresasignarclientes'] = $hayerrores;
		$_SESSION['erroresasignarclientes'] = $errores;

		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de cliente
			$cliente_inmueble = new ModelClientesInmueble();
			$cliente_inmueble->Insert($datos);
			// Volvemos a editar para añadir cualquier dato
			header("Location: ../editar.php?id=" . $_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","insertar"); ?>