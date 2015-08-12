<?php
	function publicaciones()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Consulta
		$canales_noticias = $DB->Execute($_SESSION['sql_busq_canales_noticias_todos']) or die($DB->ErrorMsg());
		$canal_noticias = $canales_noticias->FetchRow();
		$num_canales_noticias = $canales_noticias->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/subscripcion/index.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/subscripcion/estas_seguro.php');
	}
?>
<?php
	function leer_rss()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Se leen todas las canales de noticias publicadas
		$sql_consulta = "SELECT * FROM canales_noticias WHERE id_canal_noticia='". $_GET['id'] . "'";
		$consulta = $DB->Execute($sql_consulta) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		$urlfeed = $row_consulta['enlace'];
		$vfeed = new SimplePie();
		$vfeed->feed_url($urlfeed);
		$vfeed->init();
		$vfeed->handle_content_type();
		$vmax = $vfeed->get_item_quantity();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/subscripcion/leer_rss.php');
	}
?>
<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/subscripcion/insertar.php');	
	}
?>
<?php
	function editar()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Se leen todas las canales de noticias publicadas
		$sql_consulta = "SELECT * FROM canales_noticias WHERE id_canal_noticia='". $_GET['id'] . "'";
		$consulta = $DB->Execute($sql_consulta) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/subscripcion/editar.php');
	}
?>
<?php
	// Función para mostrar errores al borrar canales_noticias
	function borrar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/subscripcion/borrar.php');
	}
?>