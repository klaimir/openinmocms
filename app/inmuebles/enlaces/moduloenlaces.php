<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/enlaces/insertar.php');
	}
?>
<?php
	function editar()
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Datos del inmueble
		$sql = "SELECT * FROM enlaces_inmueble WHERE id_enlace=".$_GET['id_enlace']." AND inmueble=".$_GET['id'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/enlaces/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/enlaces/estas_seguro.php');
	}
?>