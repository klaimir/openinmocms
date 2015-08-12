<?php include("../../../config/config.php");?>
<?php include("modulofichas_encargo.php");?>
<?php include("ControlFichasEncargoClientes.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FichasEncargoCliente.class.php");?>
<?php require_once("../../../modelos/pdf/InformesFichasEncargoClientesPDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_editar=ControlFichasEncargoClientes::ComprobarAccesoEditar($_GET['id_ficha_encargo'],$_GET['inmueble'],$_GET['id']);
	if($acceso_editar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="La ficha de encargo para el inmueble y cliente seleccionado no existe";
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
		
		$datos=ControlFichasEncargoClientes::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroreseditarfichaencargo'] = $hayerrores;
		$_SESSION['erroreseditarfichaencargo'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$ficha_encargo = new ModelFichasEncargoCliente();
			$ficha_encargo->Update($datos,$datos['id_ficha_encargo'],$datos['cliente'],$datos['inmueble']);
			// Generar ficha encargo PDF
			$informe_ficha_encargo = new InformesFichasEncargoClientesPDF();
			$informe_ficha_encargo->Ficha($datos['id_ficha_encargo'],$datos['cliente'],$datos['inmueble']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","editar"); ?>