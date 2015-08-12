<?php require_once('funcionesauxiliares.php'); ?>
<?php require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php'); ?>
<?php
	header("Content-Type: text/html; charset=iso-8859-1"); 
	$sel = -1;
	$elegido = 0;

	if (isset($_GET['poblacion']) && $_GET['poblacion'] != '')
	{
		$sel = $_GET['poblacion'];
	}

	if (isset($_GET['elegido']) && $_GET['elegido'] != '')
	{
		$elegido = $_GET['elegido'];
	}
	
	// Conexión Base de datos
	$DB = new Model();
	// Recupera los zonas asociados al poblacion seleccionada
	$consulta_sql = "SELECT * FROM zonas_poblaciones WHERE poblacion=" . $sel . " ORDER BY nombre_zona";
	$zonas = $DB->Execute($consulta_sql) or die($DB->ErrorMsg());
	$zona = $zonas->FetchRow();
	$num_zonas = $zonas->RecordCount();

	if ($num_zonas != 0)
	{
?>
		<select id="zona" name="zona" onchange="modificado=true" class="campo_texto">
			<option value="">Seleccione zona...</option>
<?php
		do
		{
?>
			<option value="<?php echo  $zona['id_zona']; ?>" <?php if ($elegido == $zona['id_zona']) echo "selected"; ?>><?php echo  $zona['nombre_zona']; ?></option>
<?php
		} while($zona = $zonas->FetchRow());
?>
		</select>
<?php
	}
	else
	{
?>
		<select id="zona" name="zona" class="campo_texto"  onchange="modificado=true">
			<option value="">Seleccione zona...</option>
		</select>
<?php
	}
?>