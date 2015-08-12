<?php include("../../config/config.php");?>
<?php include("moduloclientes.php");?>
<?php include("ControlClientes.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Clientes.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales del cliente
		$datos=ControlClientes::Validar($i,$hayerrores,$errores);	
		
		$_SESSION['hayerroresinsertarcliente'] = $hayerrores;
		$_SESSION['erroresinsertarcliente'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de cliente
			$cliente = new ModelClientes();
			$ultimo_id=$cliente->Insert($datos);
			// Volvemos a editar para añadir cualquier dato
			header("Location: editar.php?id=".$ultimo_id );
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","insertar"); ?>
<?php
	// carga de regiones en AJAX
	if (isset($_POST['provincia']))
	{
?>
		<script type="text/javascript">carga_poblaciones_cliente("<?php echo  $_POST['provincia']; ?>","<?php echo  $_POST['poblacion']; ?>")</script>
<?php
	}
?>