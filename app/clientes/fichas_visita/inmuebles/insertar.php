<?php include("../../../../config/config.php");?>
<?php include("moduloinmuebles.php");?>
<?php include("ControlInmuebleslFichasVisitaClientes.class.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../../modelos/InmueblesFichasVisitaCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicialización de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	
	// Validamos la asignación del inmueble
	$datos=ControlInmuebleslFichasVisitaClientes::Validar($i,$hayerrores,$errores);
	
	// Asignamos las variables que almacenan la información sobre si ha habido errores 
	// y los errores cometidos en variables de sesiòn
	$_SESSION['hayerroresasignarinmueblefichavisita'] = $hayerrores;
	$_SESSION['erroresasignarinmueblefichavisita'] = $errores;

	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de asignación
		$cliente_inmueble = new ModelInmueblesFichasVisitaCliente();
		$cliente_inmueble->Insert($datos);
		// Listado
		header("Location: asignar_hora.php?id=" . $datos['cliente']."&ficha_visita=".$datos['ficha_visita']."&inmueble=".$datos['inmueble']."&location=buscador_inmuebles_ficha_visita");
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>