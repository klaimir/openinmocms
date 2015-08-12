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
		$todos = $DB->Execute($_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/inmuebles/index.php');
	}
?>
<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/inmuebles/insertar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/inmuebles/estas_seguro.php');
	}
?>
<?php
	function asignar_hora()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Hora registrada
		$consulta = $DB->Execute("SELECT * FROM inmuebles_fichas_visita_cliente WHERE ficha_visita=".$_GET['ficha_visita']." AND cliente=".$_GET['id']." AND inmueble=".$_GET['inmueble']) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		// Intervalos de hora
		$intervalos_hora=array("08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/inmuebles/asignar_hora.php');
	}
?>