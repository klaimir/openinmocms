<?php include("../../../config/config.php");?>
<?php include("modulopresupuestos.php");?>
<?php include("ControlPresupuestosInmueble.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/PresupuestosInmueble.class.php");?>
<?php require_once("../../../modelos/pdf/InformesPresupuestosInmueblePDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_editar=ControlPresupuestos::ComprobarAccesoEditar($_GET['id_presupuesto'],$_GET['id']);
	if($acceso_editar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado no está en venta";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_generar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="La comunidad autónoma del inmueble seleccionado no tiene definidos los parámetros de configuración";
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
		
		$datos=ControlPresupuestos::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroreseditarpresupuesto'] = $hayerrores;
		$_SESSION['erroreseditarpresupuesto'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$presupuesto = new ModelPresupuestosInmueble();
			$presupuesto->Update($datos,$datos['id_presupuesto'],$datos['id']);
			// Generar ficha PDF
			$informe_presupuesto = new InformesPresupuestosInmueblePDF();
			$informe_presupuesto->SetTipoPresupuesto($datos['tipo_presupuesto']);
			$informe_presupuesto->Ficha($datos['id_presupuesto'],$datos['id']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","editar"); ?>