<?php require_once('funcionesauxiliares.php'); ?>
<?php require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php'); ?>
<?php
	header("Content-Type: text/html; charset=iso-8859-1"); 
	$sel = -1;
	$elegido = 0;
	
	if (isset($_GET['region']) && $_GET['region'] != '')
	{
		$sel = $_GET['region'];
	}

	if (isset($_GET['elegido']) && $_GET['elegido'] != '')
	{
		$elegido = $_GET['elegido'];
	}

	// Conexión Base de datos
	$DB = new Model();
	// Recupera los zonas asociados al municipio seleccionada
	$consulta_sql = "SELECT * FROM poblaciones WHERE region=" . $sel . " AND id_poblacion IN (SELECT oficinas_poblaciones.poblacion FROM oficinas_poblaciones,oficinas_usuarios WHERE oficinas_poblaciones.oficina=oficinas_usuarios.oficina AND usuario=".$_SESSION['id_usuario'].") ORDER BY poblacion";
	$poblaciones = $DB->Execute($consulta_sql) or die($DB->ErrorMsg());
	$poblacion = $poblaciones->FetchRow();
	$num_poblaciones = $poblaciones->RecordCount();

	if ($num_poblaciones != 0)
	{
?>
		<select id="poblacion_inmueble" name="poblacion_inmueble" onchange="carga_zonas(this.value,'');" class="campo_texto">
			<option value="">Seleccione municipio...</option>
<?php
		do
		{
?>
			<option value="<?php echo  $poblacion['id_poblacion']; ?>" <?php if ($elegido == $poblacion['id_poblacion']) echo "selected"; ?>><?php echo  $poblacion['poblacion']; ?></option>
<?php
		} while($poblacion = $poblaciones->FetchRow());
?>
		</select>
<?php
	}
	else
	{
?>
		<select id="poblacion_inmueble" name="poblacion_inmueble" class="campo_texto"  onchange="modificado=true">
			<option value="">Seleccione municipio...</option>
		</select>
<?php
	}
?>