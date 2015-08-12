<?php include("../../../../config/config.php");?>
<?php include("modulofacturas.php");?>
<?php include("ControlFacturasContratosArrendamiento.class.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../../modelos/FacturasContratosArrendamientoInmueble.class.php");?>
<?php require_once("../../../../modelos/pdf/InformesFacturasContratosArrendamientoInmueblePDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_editar=ControlFacturasContratosArrendamiento::ComprobarAccesoGenerar($_GET['contrato_arrendamiento']);
	if($acceso_editar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="No ha sido generado previamente el contrato de arrendamiento";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_editar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El contrato de arrendamiento no ha sido firmado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>
<?php
	if($_POST)
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		$datos=ControlFacturasContratosArrendamiento::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroreseditarfacturacontratoarrendamiento'] = $hayerrores;
		$_SESSION['erroreseditarfacturacontratoarrendamiento'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$contrato_arrendamiento = new ModelFacturasContratosArrendamientoInmueble();
			$contrato_arrendamiento->Update($datos,$datos['contrato_arrendamiento']);
			// Generar ficha PDF
			$informe_contrato_arrendamiento = new InformesFacturasContratosArrendamientoInmueblePDF();
			$informe_contrato_arrendamiento->Ficha($datos['contrato_arrendamiento']);
			// Buscador
			header("Location: ../editar.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']."&id_contrato_arrendamiento=" . $_GET['contrato_arrendamiento']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","editar"); ?>