<?php include("../../config/config.php");?>
<?php include("moduloinmuebles.php");?>
<?php include("ControlInmuebles.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Inmuebles.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales del inmueble
		$datos=ControlInmuebles::Validar($i,$hayerrores,$errores);
		// Si se da de alta cliente
		if($_GET['cliente']==1)
		{
			include(PATHINCLUDE_FRAMEWORK_APP.'clientes/ControlClientes.class.php');
			$datos_clientes=ControlClientes::Validar($i,$hayerrores,$errores);
		}
		
		// Asignamos las variables que almacenan la información sobre si ha habido errores
		// y los errores cometidos en variables de sesión
		$_SESSION['hayerroresinsertarinmueble'] = $hayerrores;
		$_SESSION['erroresinsertarinmueble'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{			
			// Datos de Inmujeble
			$inmueble = new ModelInmuebles();
			$ultimo_id=$inmueble->Insert($datos);
			// Si se da de alta cliente
			if($_GET['cliente']==1)
			{
				// Datos de cliente
				require_once("../../modelos/Clientes.class.php");
				$cliente = new ModelClientes();
				$ultimo_id_cliente=$cliente->Insert($datos_clientes);
				// Datos de la asociación
				$datos_cliente_inmueble['inmueble']=$ultimo_id;
				$datos_cliente_inmueble['cliente']=$ultimo_id_cliente;
				// Se asocia el cliente
				require_once("../../modelos/ClientesInmueble.class.php");
				$cliente_inmueble = new ModelClientesInmueble();
				$cliente_inmueble->Insert($datos_cliente_inmueble);
			}
			// Volvemos a editar para añadir cualquier dato
			header("Location: editar.php?id=".$ultimo_id );
		}	
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","insertar"); ?>
<?php
	// carga de regiones en AJAX
	if (isset($_POST['provincia_inmueble']))
	{
?>
		<script type="text/javascript">carga_regiones_inmueble("<?php echo  $_POST['provincia_inmueble']; ?>","<?php echo  $_POST['region']; ?>")</script>
<?php
	}
?>
<?php
	// carga de poblaciones en AJAX
	if (isset($_POST['region']))
	{
?>
		<script type="text/javascript">carga_poblaciones_inmueble("<?php echo  $_POST['region']; ?>","<?php echo  $_POST['poblacion_inmueble']; ?>")</script>
<?php
	}
?>
<?php
	// carga de zonas en AJAX
	if (isset($_POST['poblacion_inmueble']))
	{
?>
		<script type="text/javascript">carga_zonas("<?php echo  $_POST['poblacion_inmueble']; ?>","<?php echo  $_POST['zona']; ?>")</script>
<?php
	}
?>
<?php
	// carga de regiones en AJAX
	if (isset($_POST['provincia']))
	{
?>
		<script type="text/javascript">carga_poblaciones_cliente("<?php echo  $_POST['provincia']; ?>","<?php echo  $_POST['poblacion']; ?>")</script>
<?php
	}
?>