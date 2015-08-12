<?php include("../../../config/config.php");?>
<?php include("moduloadjuntos.php");?>
<?php include("ControlAdjuntosClientes.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/FicherosCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicializaci�n de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales del cliente
		$datos=ControlAdjuntosClientes::Validar($i,$hayerrores,$errores);
		
		// Asignamos las variables que almacenan la informaci�n sobre si ha habido errores 
		// y los errores cometidos en variables de sesi�n
		$_SESSION['hayerroresinsertaradjunto'] = $hayerrores;
		$_SESSION['erroresinsertaradjunto'] = $errores;

		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de fichero
			$fichero_cliente = new ModelFicherosCliente();
			$fichero_cliente->Insert($datos);			
			// Se obtiene el �ltimo id insertado
			header("Location: index.php?id=".$_GET['id']);
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>