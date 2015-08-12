<?php
	function insertar()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Opciones del inmueble
		$clientes = $DB->Execute("SELECT * FROM clientes") or die($DB->ErrorMsg());
		$cliente = $clientes->FetchRow();
		$num_clientes = $clientes->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/clientes/insertar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/clientes/estas_seguro.php');
	}
?>