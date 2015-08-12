<?php include("../../../../config/config.php");?>
<?php include("moduloinmuebles.php");?>
<?php include("ControlInmuebleslFichasVisitaClientes.class.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../../modelos/InmueblesFichasVisitaCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicializaci�n de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	
	// Validamos la asignaci�n del inmueble
	$datos=ControlInmuebleslFichasVisitaClientes::Validar($i,$hayerrores,$errores);
	
	// Asignamos las variables que almacenan la informaci�n sobre si ha habido errores 
	// y los errores cometidos en variables de sesi�n
	$_SESSION['hayerroresasignarinmueblefichavisita'] = $hayerrores;
	$_SESSION['erroresasignarinmueblefichavisita'] = $errores;

	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de asignaci�n
		$cliente_inmueble = new ModelInmueblesFichasVisitaCliente();
		$cliente_inmueble->Insert($datos);
		// Listado
		header("Location: asignar_hora.php?id=" . $datos['cliente']."&ficha_visita=".$datos['ficha_visita']."&inmueble=".$datos['inmueble']."&location=buscador_inmuebles_ficha_visita");
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>