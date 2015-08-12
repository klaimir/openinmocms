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

		$_SESSION['hayerroresmodificarcliente'] = $hayerrores;
		$_SESSION['erroresmodificarcliente'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de cliente
			$cliente = new ModelClientes();
			$cliente->Update($datos,$datos['id']);
			// Si viene de un enlace externo
			include("../../general/enlace_volver_secciones.php");
		}
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","editar"); ?>
<?php
	// Conexión Base de datos
	$cliente = new ModelClientes();
	$sql = "SELECT * FROM clientes WHERE id_cliente=".$_GET['id'];
	$consulta = $cliente->Execute($sql) or die($cliente->ErrorMsg());
	$row_consulta = $consulta->FetchRow();
	$num_consulta = $consulta->RecordCount();
	// carga de poblaciones en AJAX
	if($row_consulta['estado']=="activo")
	{
		// carga de poblaciones en AJAX
		if (isset($_POST['provincia']))
		{
	?>
			<script type="text/javascript">carga_poblaciones_cliente("<?php echo  $_POST['provincia']; ?>","<?php echo  $_POST['poblacion']; ?>")</script>
	<?php
		}
		else
		{
			if(isset($_GET['id']))
			{
			?>
				<script type="text/javascript">carga_poblaciones_cliente("<?php echo  $row_consulta['provincia']; ?>","<?php echo  $row_consulta['poblacion']; ?>")</script>
			<?php
			}
		}
	}
?>