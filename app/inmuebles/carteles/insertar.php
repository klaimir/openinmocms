<?php include("../../../config/config.php");?>
<?php include("modulocarteles.php");?>
<?php include("ControlCartelesInmueble.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/CartelesInmueble.class.php");?>
<?php require_once("../../../modelos/pdf/InformesCartelesInmueblePDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_generar=ControlCarteles::ComprobarAccesoGenerar($_GET['id']);
	if($acceso_generar == (int)(-1))
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
		
		$_SESSION['hayerroresinsertarcartel'] = $hayerrores;
		$_SESSION['erroresinsertarcartel'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$cartel = new ModelCartelesInmueble();
			$ultimo_id=$cartel->Insert($datos);
			// Generar ficha PDF
			$informe_cartel = new InformesCartelesInmueblePDF();
			$informe_cartel->SetTipoCartel($datos['tipo_cartel']);
			$informe_cartel->SetDisposicionFotos($datos['disposicion_fotos']);
			$informe_cartel->SetMaxAnchura($datos['max_anchura']);
			$informe_cartel->SetMaxAltura($datos['max_altura']);
			$informe_cartel->Ficha($ultimo_id,$datos['inmueble']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","insertar"); ?>