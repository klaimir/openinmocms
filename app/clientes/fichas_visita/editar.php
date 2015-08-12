<?php include("../../../config/config.php");?>
<?php include("modulofichas_visita.php");?>
<?php include("ControlFichasVisitaClientes.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FichasVisitaCliente.class.php");?>
<?php require_once("../../../modelos/pdf/InformesFichasVisitaClientesPDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if($_POST)
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		$datos=ControlFichasVisitaClientes::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroreseditarfichavisita'] = $hayerrores;
		$_SESSION['erroreseditarfichavisita'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$ficha_visita = new ModelFichasVisitaCliente();
			$ficha_visita->Update($datos,$datos['id_ficha_visita'],$datos['cliente']);
			// Generar ficha visita PDF
			$informe_ficha_visita = new InformesFichasVisitaClientesPDF();
			$informe_ficha_visita->Ficha($datos['id_ficha_visita'],$datos['cliente']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","editar"); ?>