<?php
	function buscador()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Opciones del inmueble
		$clientes = $DB->Execute("SELECT * FROM clientes") or die($DB->ErrorMsg());
		$cliente = $clientes->FetchRow();
		$num_clientes = $clientes->RecordCount();
		// Obtencion de provincias
		$sql_provincias = "SELECT distinct(provincia_inmueble),provincias.* FROM inmuebles, provincias WHERE id_provincia=provincia_inmueble ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Obtencion de opciones		
		$sql_opciones = "SELECT * FROM opciones ORDER BY nombre_opcion ASC";
		$opciones = $DB->Execute($sql_opciones) or die($DB->ErrorMsg());
		$opcion = $opciones->FetchRow();
		$num_opciones = $opciones->RecordCount();
		// Buscador registrados en la aplicacion con las opciones seleccionadas
		$todos = $DB->Execute($_SESSION['s_busq_gest_inmuebles_clientes_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/inmuebles/index.php');
	}
?>
<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/inmuebles/insertar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/inmuebles/estas_seguro.php');
	}
?>