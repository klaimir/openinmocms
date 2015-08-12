<?php include("../../../../config/config.php");?>
<?php include("moduloinmuebles.php");?>
<?php include("ControlInmuebleslFichasVisitaClientes.class.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../../modelos/InmueblesFichasVisitaCliente.class.php");?>
<?php require_once("../../../../modelos/pdf/InformesFichasVisitaClientesPDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Inicialización de variables de error
	$i=0; 
	unset($errores); 
	$hayerrores=false;
	
	// Validamos la asignación del inmueble
	$datos=ControlInmuebleslFichasVisitaClientes::ValidarAsignarHora($i,$hayerrores,$errores);
	
	// Asignamos las variables que almacenan la información sobre si ha habido errores 
	// y los errores cometidos en variables de sesiòn
	$_SESSION['hayerroresasignarhorainmueblefichavisita'] = $hayerrores;
	$_SESSION['erroresasignarhorainmueblefichavisita'] = $errores;

	// Si no hay errores
	if(!$hayerrores)
	{
		// Datos de asignación
		$cliente_inmueble = new ModelInmueblesFichasVisitaCliente();
		$cliente_inmueble->CambiarHora($datos['hora'],$datos['ficha_visita'],$datos['cliente'],$datos['inmueble']);
		// Generar ficha visita PDF
		$informe_ficha_visita = new InformesFichasVisitaClientesPDF();
		$informe_ficha_visita->Ficha($datos['ficha_visita'],$datos['cliente']);
		// Listado
		if($_GET['location']=="editar_ficha_visita")
			header("Location: ../editar.php?id=" . $datos['cliente']."&id_ficha_visita=".$datos['ficha_visita']);
		if($_GET['location']=="buscador_inmuebles_ficha_visita")
			header("Location: index.php?id=" . $datos['cliente']."&ficha_visita=".$datos['ficha_visita']);
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","asignar_hora"); ?>