<?php
	function informes()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/index.php');
	}
?>
<?php
	function informe_municipios()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de provincias
		$sql_provincias = "SELECT distinct(provincia_inmueble),provincias.* FROM inmuebles, provincias WHERE id_provincia=provincia_inmueble ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Buscador registrados en la aplicacion con las opciones seleccionadas		
		$todos = $DB->Execute($_SESSION['s_busq_informes_municipios_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/informe_municipios.php');
	}
?>
<?php
	function informe_zonas()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de provincias
		$sql_provincias = "SELECT distinct(provincia_inmueble),provincias.* FROM inmuebles, provincias WHERE id_provincia=provincia_inmueble ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Buscador registrados en la aplicacion con las opciones seleccionadas		
		$todos = $DB->Execute($_SESSION['s_busq_informes_zonas_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/informe_zonas.php');
	}
?>
<?php
	function informe_regiones()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de provincias
		$sql_provincias = "SELECT distinct(provincia_inmueble),provincias.* FROM inmuebles, provincias WHERE id_provincia=provincia_inmueble ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Buscador registrados en la aplicacion con las opciones seleccionadas		
		$todos = $DB->Execute($_SESSION['s_busq_informes_regiones_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/informe_regiones.php');
	}
?>
<?php
	function informe_provincias()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/informe_provincias.php');
	}
?>
<?php
	function informe_captadores()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/informe_captadores.php');
	}
?>
<?php
	function informe_opciones()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de provincias
		$sql_provincias = "SELECT distinct(provincia_inmueble),provincias.* FROM inmuebles, provincias WHERE id_provincia=provincia_inmueble ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Buscador registrados en la aplicacion con las opciones seleccionadas		
		$todos = $DB->Execute($_SESSION['s_busq_informes_opciones_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/informe_opciones.php');
	}
?>
<?php
	function informe_tipologia()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de provincias
		$sql_provincias = "SELECT distinct(provincia_inmueble),provincias.* FROM inmuebles, provincias WHERE id_provincia=provincia_inmueble ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Buscador registrados en la aplicacion con las opciones seleccionadas		
		$todos = $DB->Execute($_SESSION['s_busq_informes_tipologia_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'informes/informe_tipologia.php');
	}
?>