<?php
	function clientes()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de agentes asignados		
		$sql_agentes_asignados = "SELECT * FROM usuarios ORDER BY apellidos ASC, nombre ASC";		
		$agentes_asignados = $DB->Execute($sql_agentes_asignados) or die($DB->ErrorMsg());
		$agente_asignado = $agentes_asignados->FetchRow();
		$num_agentes_asignados = $agentes_asignados->RecordCount();
		// Buscador registrados en la aplicacion con las opciones seleccionadas
		$clientes = $DB->Execute($_SESSION['sql_busq_clientes_todos']) or die($DB->ErrorMsg());
		$cliente = $clientes->FetchRow();
		$num_clientes = $clientes->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/index.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/estas_seguro.php');
	}
?>
<?php
	function insertar()
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Provincias
		$sql = "SELECT * FROM provincias ORDER BY provincia";
		$provincias_cliente = $DB->Execute($sql) or die($DB->ErrorMsg());
		$provincia_cliente = $provincias_cliente->FetchRow();
		$num_provincias_cliente = $provincias_cliente->RecordCount();
		// Obtencion de agentes asignados		
		$sql_agentes_asignados = "SELECT * FROM usuarios ORDER BY apellidos ASC, nombre ASC";		
		$agentes_asignados = $DB->Execute($sql_agentes_asignados) or die($DB->ErrorMsg());
		$agente_asignado = $agentes_asignados->FetchRow();
		$num_agentes_asignados = $agentes_asignados->RecordCount();
		// Opciones de interfaz
		$class_campo="campo_texto";
		$readonly="";
		$row_consulta['estado']="activo";
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/insertar.php');	
	}
?>
<?php
	function editar()
	{
		// Contratos de compra-venta
		require_once('inmuebles/ControlInmueblesClientes.class.php');
		// Conexión Base de datos
		$DB = new Model();		
		// Cliente a modificar
		$sql_consulta = "SELECT * FROM clientes WHERE id_cliente='". $_GET['id'] . "'";
		$consulta = $DB->Execute($sql_consulta) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Provincias
		$sql = "SELECT * FROM provincias ORDER BY provincia";
		$provincias_cliente = $DB->Execute($sql) or die($DB->ErrorMsg());
		$provincia_cliente = $provincias_cliente->FetchRow();
		$num_provincias_cliente = $provincias_cliente->RecordCount();
		// Obtencion de agentes asignados		
		$sql_agentes_asignados = "SELECT * FROM usuarios ORDER BY apellidos ASC, nombre ASC";		
		$agentes_asignados = $DB->Execute($sql_agentes_asignados) or die($DB->ErrorMsg());
		$agente_asignado = $agentes_asignados->FetchRow();
		$num_agentes_asignados = $agentes_asignados->RecordCount();
		// Inmuebles del cliente
		$inmuebles = $DB->Execute("SELECT inmuebles.* FROM clientes_inmuebles,inmuebles WHERE inmueble=id_inmueble AND cliente = ".$_GET['id']) or die($DB->ErrorMsg());
		$inmueble = $inmuebles->FetchRow();
		$num_inmuebles = $inmuebles->RecordCount();
		// Opciones de interfaz
		if($row_consulta['estado']=="activo")
		{
			$class_campo="campo_texto";
			$readonly="";
		}
		else
		{
			$class_campo="campo_texto_blocked";
			$readonly='readonly="readonly"';
		}
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/editar.php');
	}
?>
<?php
	// Función para mostrar errores al borrar clientes
	function borrar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/borrar.php');
	}
?>