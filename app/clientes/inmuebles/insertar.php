<?php include("../../../config/config.php");?>
<?php include("moduloinmuebles.php");?>
<?php include("ControlInmueblesClientes.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/ClientesInmueble.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_insertar_cliente_inmueble=ControlInmueblesClientes::ComprobarInsertar($_GET['inmueble']);
	if($acceso_insertar_cliente_inmueble == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El usuario actual no puede gestionar la poblaci�n del inmueble seleccionado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	
	// Inicializaci�n de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	
	// Validamos la asignaci�n del inmueble
	$datos=ControlInmueblesClientes::Validar($i,$hayerrores,$errores);
	
	// Asignamos las variables que almacenan la informaci�n sobre si ha habido errores 
	// y los errores cometidos en variables de sesi�n
	$_SESSION['hayerroresasignarclientes'] = $hayerrores;
	$_SESSION['erroresasignarclientes'] = $errores;

	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de asignaci�n
		$cliente_inmueble = new ModelClientesInmueble();
		$cliente_inmueble->Insert($datos);
		// Listado
		header("Location: index.php?id=" . $_GET['id']);
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>