<?php include("../../../config/config.php");?>
<?php include("modulofichas_encargo.php");?>
<?php include("ControlFichasEncargoClientes.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/Usuarios.class.php");?>
<?php require_once("../../../modelos/FichasEncargoCliente.class.php");?>
<?php require_once("../../../modelos/pdf/InformesFichasEncargoClientesPDF.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if($_POST)
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		$datos=ControlFichasEncargoClientes::Validar($i,$hayerrores,$errores);
		
		$_SESSION['hayerroresinsertarfichaencargo'] = $hayerrores;
		$_SESSION['erroresinsertarfichaencargo'] = $errores;
	
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de asignación
			$ficha_encargo = new ModelFichasEncargoCliente();
			$ultimo_id=$ficha_encargo->Insert($datos);
			// Generar ficha encargo PDF
			$informe_ficha_encargo = new InformesFichasEncargoClientesPDF();
			$informe_ficha_encargo->Ficha($ultimo_id,$datos['cliente'],$datos['inmueble']);
			// Buscador
			header("Location: index.php?id=" . $_GET['id']."&inmueble=" . $_GET['inmueble']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>