<?php include("modulofacturas.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../config/config.php");?>
<?php include("../../../modelos/pdf/InformesPDFFactory.class.php");?>
<?php 
	// Tipo de plantilla
	if (isset($_GET['tipo']))
	{
		$modelo = InformesPDFFactory::Create($_GET['tipo']);
		if($_GET['tipo']==4)
			$tipo_factura="compra_venta";
		if($_GET['tipo']==5)
			$tipo_factura="arrendamiento";
		$modelo->PlantillaFicha($tipo_factura);
	}
	else
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="No han sido especificados algunos valores para la generación del modelo";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
?>