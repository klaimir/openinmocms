<?php include("../../../config/config.php");?>
<?php include("modulocarteles.php");?>
<?php include("ControlCartelesInmueble.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/CartelesInmueble.class.php");?>
<?php require_once("../../../modelos/pdf/InformesCartelesInmueblePDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_editar=ControlCarteles::ComprobarAccesoEditar($_GET['id_cartel'],$_GET['id']);
	if($acceso_editar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble está cerrado";
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
		
		$datos=ControlCarteles::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroreseditarcartel'] = $hayerrores;
		$_SESSION['erroreseditarcartel'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$cartel = new ModelCartelesInmueble();
			$cartel->Update($datos,$datos['id_cartel'],$datos['id']);
			// Generar ficha PDF
			$informe_cartel = new InformesCartelesInmueblePDF();
			$informe_cartel->SetTipoCartel($datos['tipo_cartel']);
			$informe_cartel->SetDisposicionFotos($datos['disposicion_fotos']);
			$informe_cartel->SetMaxAnchura($datos['max_anchura']);
			$informe_cartel->SetMaxAltura($datos['max_altura']);
			$informe_cartel->Ficha($datos['id_cartel'],$datos['id']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","editar"); ?>