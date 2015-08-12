<?php include("../../config/config.php");?>
<?php include("moduloinmuebles.php");?>
<?php include("ControlInmuebles.class.php");?>
<?php require_once("clientes/ControlClientesInmuebles.class.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Inmuebles.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	$acceso_editar=ControlInmuebles::ComprobarEditar($_GET['id']);
	if($acceso_editar == (int)(-1))
	{
		$_SESSION['hay_errores_general']=true;
		$_SESSION['errores_general'][0]="El usuario actual no puede gestionar la población del inmueble seleccionado";
		header("Location: ".$_SESSION['rutaraiz']."media/error_general.php");
	}
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales del inmueble
		$datos=ControlInmuebles::Validar($i,$hayerrores,$errores);
		
		// Asignamos las variables que almacenan la información sobre si ha habido errores
		// y los errores cometidos en variables de sesión
		$_SESSION['hayerroreseditarinmueble'] = $hayerrores;
		$_SESSION['erroreseditarinmueble'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{			
			// Datos de Inmujeble
			$inmueble = new ModelInmuebles();
			$inmueble->Update($datos,$datos['id']);
			// Si viene de un enlace externo
			include("../../general/enlace_volver_secciones.php");
		}	
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","editar"); ?>
<?php
	// Datos de Inmujeble
	$inmueble = new ModelInmuebles();
	$sql = "SELECT * FROM inmuebles WHERE id_inmueble=".$_GET['id'];
	$consulta = $inmueble->Execute($sql) or die($inmueble->ErrorMsg());
	$row_consulta = $consulta->FetchRow();
	$num_consulta = $consulta->RecordCount();
	// carga en AJAX
	if($row_consulta['estado']=="activo")
	{
		if (isset($_POST['provincia_inmueble']))
		{
	?>
			<script type="text/javascript">carga_regiones_inmueble("<?php echo  $_POST['provincia_inmueble']; ?>","<?php echo  $_POST['region']; ?>")</script>
	<?php
		}
		else
		{
			?>
			<script type="text/javascript">carga_regiones_inmueble("<?php echo  $row_consulta['provincia_inmueble']; ?>","<?php echo  $row_consulta['region']; ?>")</script>
			<?php
		}
		
		if (isset($_POST['region']))
		{
	?>
			<script type="text/javascript">carga_poblaciones_inmueble("<?php echo  $_POST['region']; ?>","<?php echo  $_POST['poblacion_inmueble']; ?>")</script>
	<?php
		}
		else
		{
			?>
			<script type="text/javascript">carga_poblaciones_inmueble("<?php echo  $row_consulta['region']; ?>","<?php echo  $row_consulta['poblacion_inmueble']; ?>")</script>
			<?php
		}
		
		if (isset($_POST['poblacion_inmueble']))
		{
	?>
			<script type="text/javascript">carga_zonas("<?php echo  $_POST['poblacion_inmueble']; ?>","<?php echo  $_POST['zona']; ?>")</script>
	<?php
		}
		else
		{
			?>
			<script type="text/javascript">carga_zonas("<?php echo  $row_consulta['poblacion_inmueble']; ?>","<?php echo  $row_consulta['zona']; ?>")</script>
			<?php
		}
	}
?>