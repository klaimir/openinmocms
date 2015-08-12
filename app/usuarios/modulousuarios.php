<?php
	function usuarios()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Consulta
		$usuarios = $DB->Execute($_SESSION['sql_busq_usuarios_todos']) or die($DB->ErrorMsg());
		$usuario = $usuarios->FetchRow();
		$num_usuarios = $usuarios->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'usuarios/index.php');
	}
?>
<?php
	function ver_ficha()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Consulta
		$usuarios = $DB->Execute("SELECT * FROM usuarios WHERE nick='" . $_GET['usu'] . "'") or die($DB->ErrorMsg());
		$usuario = $usuarios->FetchRow();
		$num_usuarios = $usuarios->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'usuarios/ver_ficha.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'usuarios/estas_seguro.php');
	}
?>
<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'usuarios/insertar.php');
	}
?>
<?php
	function editar()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Consulta
		$sql_consulta = "SELECT * FROM usuarios WHERE nick='". $_GET['usuario'] . "'";
		$consulta = $DB->Execute($sql_consulta) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'usuarios/editar.php');
	}
?>
<?php
	// Función para mostrar errores al borrar usuarios
	function borrar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'usuarios/borrar.php');
	}
?>