<?php
	function buscador()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Sql
		$sql_todos = "SELECT * FROM fichas_visita_cliente WHERE cliente = ".$_GET['id'];	
		// Buscador registrados en la aplicacion con las opciones seleccionadas
		$todos = $DB->Execute($sql_todos) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/index.php');
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
		$row_consulta['telefono']=$cliente['telefono'];
		$row_consulta['nif']=$cliente['nif'];
		// Provincias
		$sql = "SELECT * FROM provincias ORDER BY provincia";
		$provincias = $DB->Execute($sql) or die($DB->ErrorMsg());
		$provincia = $provincias->FetchRow();
		$num_provincias = $provincias->RecordCount();
		// Datos del agente
		$sql = "SELECT * FROM usuarios WHERE nick='".$_SESSION['usu']."'";
		$usuarios = $DB->Execute($sql) or die($DB->ErrorMsg());
		$usuario = $usuarios->FetchRow();
		$num_usuarios = $usuarios->RecordCount();
		// Asignación de valores agente
		$row_consulta['nombre_agente']=$usuario['nombre'];
		$row_consulta['apellidos_agente']=$usuario['apellidos'];
		$row_consulta['nif_agente']=$usuario['nif'];
		$row_consulta['agente']=$usuario['id_usuario'];
		// Fecha
		$row_consulta['fecha']=date("Y-m-d");
		// Datos agente
		$nick_usuario=$_SESSION['usu'];
		// Enlace
		$enlace="insertar_ficha_visita";
		$_SESSION['id_cliente_ficha_visita']=$_GET['id'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/insertar.php');
	}
?>
<?php
	function editar()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Provincias
		$sql = "SELECT * FROM provincias ORDER BY provincia";
		$provincias = $DB->Execute($sql) or die($DB->ErrorMsg());
		$provincia = $provincias->FetchRow();
		$num_provincias = $provincias->RecordCount();
		// Datos
		$sql = "SELECT * FROM fichas_visita_cliente WHERE id_ficha_visita=".$_GET['id_ficha_visita']." AND cliente=".$_GET['id'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Datos del agente
		$sql = "SELECT * FROM usuarios WHERE id_usuario='".$row_consulta['agente']."'";
		$usuarios = $DB->Execute($sql) or die($DB->ErrorMsg());
		$usuario = $usuarios->FetchRow();
		$num_usuarios = $usuarios->RecordCount();
		$nick_usuario=$usuario['nick'];
		// Asignación de valores agente
		$row_consulta['nombre_agente']=$usuario['nombre'];
		$row_consulta['apellidos_agente']=$usuario['apellidos'];
		$row_consulta['nif_agente']=$usuario['nif'];
		$row_consulta['agente']=$usuario['id_usuario'];
		// Inmuebles asociados
		$inmuebles = $DB->Execute("SELECT inmuebles.*,inmuebles_fichas_visita_cliente.hora FROM inmuebles, inmuebles_fichas_visita_cliente WHERE inmueble=id_inmueble AND ficha_visita=".$_GET['id_ficha_visita']." AND cliente=".$_GET['id']." ORDER BY hora") or die($DB->ErrorMsg());
		$inmueble = $inmuebles->FetchRow();
		$num_inmuebles = $inmuebles->RecordCount();
		// Enlace
		$enlace="editar_ficha_visita";
		$_SESSION['id_cliente_ficha_visita']=$_GET['id'];
		$_SESSION['id_ficha_visita']=$_GET['id_ficha_visita'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/fichas_visita/estas_seguro.php');
	}
?>