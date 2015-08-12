<?php include("../../../config/config.php");?>
<?php include("modulocontratos_arrendamiento.php");?>
<?php include("ControlContratosArrendamiento.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/ContratosArrendamientoInmueble.class.php");?>
<?php require_once("../../../modelos/pdf/InformesPDFFactory.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_editar_contrato=ControlContratosArrendamiento::ComprobarAccesoEditarContrato($_GET['id_contrato_arrendamiento']);
	if($acceso_editar_contrato == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado no está en alquiler";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_editar_contrato == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado no tiene ficha de encargo";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_editar_contrato == (int)(-3))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El contrato de arrendamiento seleccionado no puede ser editado al existir uno más reciente";
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
		
		$datos=ControlContratosArrendamiento::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroreseditarcontratoarrendamiento'] = $hayerrores;
		$_SESSION['erroreseditarcontratoarrendamiento'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$contrato_arrendamiento = new ModelContratosArrendamientoInmueble();
			$contrato_arrendamiento->Update($datos,$datos['id_contrato_arrendamiento']);
			// Generar ficha PDF
			$informe_contrato_arrendamiento = InformesPDFFactory::Create($datos['tipo_arrendamiento']);
			$informe_contrato_arrendamiento->Ficha($datos['id_contrato_arrendamiento']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","editar"); ?>