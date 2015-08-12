<?php
	function publicaciones()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Consulta
		$noticias = $DB->Execute($_SESSION['sql_busq_noticias_todos']) or die($DB->ErrorMsg());
		$noticia = $noticias->FetchRow();
		$num_noticias = $noticias->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/publicacion/index.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/publicacion/estas_seguro.php');
	}
?>
<?php
	function estas_seguro_publicar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/publicacion/estas_seguro_publicar.php');
	}
?>
<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/publicacion/insertar.php');
	}
?>
<?php
	function editar()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Consulta
		$sql_consulta = "SELECT * FROM noticias WHERE id_noticia='". $_GET['id'] . "'";
		$consulta = $DB->Execute($sql_consulta) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/publicacion/editar.php');
	}
?>
<?php
	// Función para mostrar errores al borrar noticias
	function borrar()
	{		
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/publicacion/borrar.php');
	}
?>