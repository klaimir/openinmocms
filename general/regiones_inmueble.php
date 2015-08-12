<?php require_once('funcionesauxiliares.php'); ?>
<?php require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php'); ?>
<?php
	header("Content-Type: text/html; charset=iso-8859-1"); 
	$sel = -1;
	$elegido = 0;

	if (isset($_GET['provincia']) && $_GET['provincia'] != '')
	{
		$sel = $_GET['provincia'];
	}

	if (isset($_GET['elegido']) && $_GET['elegido'] != '')
	{
		$elegido = $_GET['elegido'];
	}
	
	// Conexión Base de datos
	$DB = new Model();
	// Recupera los regiones asociados al region seleccionada
	$consulta_sql = "SELECT * FROM regiones WHERE provincia_id=" . $sel . " ORDER BY nombre_region";
	$regiones = $DB->Execute($consulta_sql) or die($DB->ErrorMsg());
	$region = $regiones->FetchRow();
	$num_regiones = $regiones->RecordCount();

	if ($num_regiones != 0)
	{
?>
		<select id="region" name="region" onchange="carga_poblaciones_inmueble(this.value,''); carga_zonas('','');" class="campo_texto">
			<option value="">Seleccione región...</option>
<?php
		do
		{
?>
			<option value="<?php echo  $region['id_region']; ?>" <?php if ($elegido == $region['id_region']) echo "selected"; ?>><?php echo  $region['nombre_region']; ?></option>
<?php
		} while($region = $regiones->FetchRow());
?>
		</select>
<?php
	}
	else
	{
?>
		<select id="region" name="region" class="campo_texto"  onchange="modificado=true">
			<option value="">Seleccione región...</option>
		</select>
<?php
	}
?>