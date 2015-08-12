<?php include("moduloinformes.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php include("../../modelos/graficos/InformesGraficosFactory.class.php");?>
<?php 
	// Si existe provincia y tipo
	if (isset($_GET['tipo_diagrama']))
	{
		$diagrama = InformesGraficosFactory::Create($_GET['tipo_diagrama']);
		$diagrama->GenerarDiagramaCaptadores($_GET['captador']);
	}
	else
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="No han sido especificados algunos valores para la impresión de los diagramas";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>