<?php include("../../../config/config.php");?>
<?php include("modulocertificaciones_energeticas.php");?>
<?php include("ControlCertificacionesEnergeticas.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/CertificacionesEnergeticasCliente.class.php");?>
<?php require_once("../../../modelos/pdf/InformesCertificacionesEnergeticasClientePDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php 
	$acceso_generar=ControlCertificacionesEnergeticas::ComprobarAccesoGenerarContrato($_GET['inmueble'],$_GET['id']);
	if($acceso_generar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado no tiene ficha de encargo";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if($acceso_generar == (int)(-2))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El inmueble seleccionado ya tiene generado un aviso de certificación energética para el cliente actual";
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
		
		$datos=ControlCertificacionesEnergeticas::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroresinsertarcertificacionenergetica'] = $hayerrores;
		$_SESSION['erroresinsertarcertificacionenergetica'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
			$certificacion_energetica->Insert($datos);
			// Generar ficha PDF
			$informe_certificacion_energetica = new InformesCertificacionesEnergeticasClientePDF();
			$informe_certificacion_energetica->Ficha($datos['inmueble'],$datos['cliente']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>