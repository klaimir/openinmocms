<?php
	function ver_ficheros_adjuntos($id)
	{
		// Si no existe el directorio de adjuntos, se crea
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$id."/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$id."/");
		}
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$id."/adjuntos/"))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$id."/adjuntos/");
		}
		
		$dir= PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$id."/adjuntos/";
		$directorio = opendir($dir);
		$directorio_vacio=true;
		// Directorio externo para el enlace
		$dir_enlace=$_SESSION['rutadocs'].  "clientes/cliente_".$id."/adjuntos/";
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/adjuntos/ver_ficheros_adjuntos.php');
		// Cierre del directorio
		closedir($directorio);
	}
?>
<?php
	function adjuntos()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/adjuntos/index.php');
	}
?>
<?php
	function insertar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/adjuntos/insertar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/adjuntos/estas_seguro.php');
	}
?>