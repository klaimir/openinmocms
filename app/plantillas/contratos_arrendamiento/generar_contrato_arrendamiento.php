<?php include("modulocontratos_arrendamiento.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../modelos/pdf/InformesPDFFactory.class.php");?>
<?php 
	// Tipo de plantilla
	if (isset($_GET['tipo']))
	{
		$modelo = InformesPDFFactory::Create($_GET['tipo']);
		$modelo->PlantillaFicha();
	}
	else
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="No han sido especificados algunos valores para la generación del modelo";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>