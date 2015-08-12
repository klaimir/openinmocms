<?php
	function buscador()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Sql de inmuebles
		$sql_todos = "SELECT * FROM fichas_encargo_cliente WHERE cliente = ".$_GET['id']." AND inmueble = ".$_GET['inmueble'];	
		// Buscador registrados en la aplicacion con las opciones seleccionadas
		$todos = $DB->Execute($sql_todos) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_encargo/index.php');
	}
?>
<?php
	function insertar()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Datos del vendedor
		$sql = "SELECT * FROM clientes WHERE id_cliente=".$_GET['id'];
		$clientes = $DB->Execute($sql) or die($DB->ErrorMsg());
		$cliente = $clientes->FetchRow();
		$num_clientes = $clientes->RecordCount();
		// Asignación de valores vendedor
		$row_consulta['nombre']=$cliente['nombre'];
		$row_consulta['apellidos']=$cliente['apellidos'];
		$row_consulta['provincia']=$cliente['provincia'];
		$row_consulta['poblacion']=$cliente['poblacion'];
		$row_consulta['domicilio']=$cliente['direccion'];
		$row_consulta['telefono']=$cliente['telefono'];
		$row_consulta['nif']=$cliente['nif'];
		// Datos del inmueble
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble=".$_GET['inmueble'];
		$inmuebles = $DB->Execute($sql) or die($DB->ErrorMsg());
		$inmueble = $inmuebles->FetchRow();
		$num_inmuebles = $inmuebles->RecordCount();
		// Asignación de valores inmueble
		$row_consulta['precio']=number_format($inmueble['precio_compra'], 2, ',', '.');
		$row_consulta['metros']=number_format($inmueble['metros_utiles'], 2, ',', '.');
		// Datos agente
		$usuario = new ModelUsuarios();
		$datos_usuario=$usuario->ObtenerDatosUsuario("nick",$_SESSION['usu']);
		$nick_usuario=$datos_usuario['nick'];
		// Asignación de valores agente
		$row_consulta['agente']=$datos_usuario['id_usuario'];
		$row_consulta['nombre_agente']=$datos_usuario['nombre'];
		$row_consulta['apellidos_agente']=$datos_usuario['apellidos'];
		$row_consulta['nif_agente']=$datos_usuario['nif'];
		// Enlace
		$enlace="insertar_ficha_encargo";
		$_SESSION['id_cliente_ficha_encargo']=$_GET['id'];
		$_SESSION['id_inmueble_ficha_encargo']=$_GET['inmueble'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_encargo/insertar.php');
	}
?>
<?php
	function editar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Usuarios.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM fichas_encargo_cliente WHERE id_ficha_encargo=".$_GET['id_ficha_encargo']." AND cliente=".$_GET['id']." AND inmueble=".$_GET['inmueble'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Usuario agente
		$usuario = new ModelUsuarios();
		$datos_usuario=$usuario->ObtenerDatosUsuario("id_usuario",$row_consulta['agente']);
		$nick_usuario=$datos_usuario['nick'];
		// Enlace
		$enlace="editar_ficha_encargo";
		$_SESSION['id_cliente_ficha_encargo']=$_GET['id'];
		$_SESSION['id_inmueble_ficha_encargo']=$_GET['inmueble'];
		$_SESSION['id_ficha_encargo']=$_GET['id_ficha_encargo'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_encargo/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_encargo/estas_seguro.php');
	}
?>