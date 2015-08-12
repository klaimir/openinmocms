<?php
	function buscador()
	{
		// Conexión Base de datos
		$carteles = new ModelCartelesInmueble();
		// Datos de carteles
		$todos = $carteles->ObtenerCartelesInmueble($_GET['id']);
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/carteles/index.php');
	}
?>
<?php
	function insertar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble=".$_GET['id'];
		$inmuebles = $DB->Execute($sql) or die($DB->ErrorMsg());
		$inmueble = $inmuebles->FetchRow();
		$num_inmuebles = $inmuebles->RecordCount();
		// Obtencion de tipos
		$sql_tipos = "SELECT * FROM tipos_carteles";
		$tipos_cartel = $DB->Execute($sql_tipos) or die($DB->ErrorMsg());
		$tipo_cartel = $tipos_cartel->FetchRow();
		$num_tipos = $tipos_cartel->RecordCount();
		// Obtencion de opciones
		$sql_opciones = "SELECT * FROM opciones";
		$opciones = $DB->Execute($sql_opciones) or die($DB->ErrorMsg());
		$opcion = $opciones->FetchRow();
		$num_opciones = $opciones->RecordCount();
		// Fotos del inmueble
		$todos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=2") or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Asignación de valores inmueble
		$row_consulta['poblacion']=$inmueble['poblacion_inmueble'];
		$row_consulta['zona']=$inmueble['zona'];
		$row_consulta['metros']=$inmueble['metros'];
		$row_consulta['banios']=$inmueble['banios'];
		$row_consulta['certificacion_energetica']=$inmueble['certificacion_energetica'];
		$row_consulta['habitaciones']=$inmueble['habitaciones'];
		$row_consulta['direccion']=$inmueble['direccion'];
		$row_consulta['observaciones']=$inmueble['observaciones'];
		$row_consulta['precio_compra']=$inmueble['precio_compra'];
		$row_consulta['precio_alquiler']=$inmueble['precio_alquiler'];
		// Valores de carteles
		$row_consulta['max_altura']=120;
		$row_consulta['max_anchura']=190;
		// Registro
		$row_consulta['fecha']=date("Y-m-d");
		// Opciones interfaz
		$class_campo="campo_texto";
		$readonly='';
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/carteles/insertar.php');
	}
?>
<?php
	function editar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'CartelesInmueble.class.php');
		// Conexión Base de datos
		$cartel = new ModelCartelesInmueble();
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM carteles_inmueble WHERE id_cartel=".$_GET['id_cartel']." AND inmueble=".$_GET['id'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Obtencion de opciones
		$sql_opciones = "SELECT * FROM opciones";
		$opciones = $DB->Execute($sql_opciones) or die($DB->ErrorMsg());
		$opcion = $opciones->FetchRow();
		$num_opciones = $opciones->RecordCount();
		// Obtencion de tipos
		$sql_tipos = "SELECT * FROM tipos_carteles";
		$tipos_cartel = $DB->Execute($sql_tipos) or die($DB->ErrorMsg());
		$tipo_cartel = $tipos_cartel->FetchRow();
		$num_tipos = $tipos_cartel->RecordCount();
		// Fotos del inmueble
		$todos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=2") or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Opciones interfaz
		$class_campo="campo_texto_blocked";
		$readonly='readonly="readonly"';
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/carteles/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/carteles/estas_seguro.php');
	}
?>