<?php include("modulopresupuestos.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../config/config.php");?>
<?php require_once("../../../modelos/pdf/InformesPresupuestosInmueblePDF.class.php");?>
<?php 
	// Tipo de plantilla
	if (isset($_GET['tipo']))
	{
		if($_GET['tipo']!="nuevo_inmueble" && $_GET['tipo']!="inmueble_usado")
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]="El tipo de modelo especificado es incorrecto";
			header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
		}
		else
		{
			// Generar ficha PDF
			$modelo = new InformesPresupuestosInmueblePDF();
			$modelo->SetTipoPresupuesto($_GET['tipo']);
			$modelo->PlantillaFicha();
		}
	}
	else
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="No han sido especificados algunos valores para la generación del modelo";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>