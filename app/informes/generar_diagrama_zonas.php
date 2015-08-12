<?php include("moduloinformes.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php include("../../modelos/graficos/InformesGraficosFactory.class.php");?>
<?php 
	// Si existe municipio y tipo
	if (isset($_GET['poblacion']) && isset($_GET['tipo_diagrama']))
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de zonas de poblaciones
		$sql_poblaciones = "SELECT * FROM zonas_poblaciones WHERE poblacion=".$_GET['poblacion'];
		$poblaciones = $DB->Execute($sql_poblaciones) or die($DB->ErrorMsg());
		$poblacion = $poblaciones->FetchRow();
		$num_poblaciones = $poblaciones->RecordCount();	
		// Comprobación de zonas
		if($num_poblaciones!=0)
		{
			$diagrama = InformesGraficosFactory::Create($_GET['tipo_diagrama']);
			$diagrama->GenerarDiagramaZonas($_GET['poblacion']);
		}
		else
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]="El municipio seleccionado no contiene ninguna zona";
			header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
		}
	}
	else
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="No han sido especificados algunos valores para la impresión de los diagramas";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>