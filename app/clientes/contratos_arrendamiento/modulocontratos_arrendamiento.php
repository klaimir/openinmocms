<?php
	function buscador()
	{
		$generar_contrato=ControlContratosArrendamiento::ComprobarAccesoGenerarContrato($_GET['inmueble'],$_GET['id']);
		// Conexión Base de datos
		$DB = new Model();
		// Sql de inmuebles
		$sql_todos = "SELECT * FROM contratos_arrendamiento_inmueble WHERE cliente_vendedor = ".$_GET['id']." AND inmueble = ".$_GET['inmueble'];	
		// Buscador registrados en la aplicacion con las opciones seleccionadas
		$todos = $DB->Execute($sql_todos) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/index.php');
	}
?>
<?php
	function insertar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Usuarios.class.php');
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
		$row_consulta['nif']=$cliente['nif'];
		$row_consulta['estado_civil']=$cliente['estado_civil'];
		// Datos del comprador
		$sql = "SELECT * FROM clientes WHERE id_cliente=".$_GET['cliente_comprador'];
		$compradores = $DB->Execute($sql) or die($DB->ErrorMsg());
		$comprador = $compradores->FetchRow();
		$num_compradores = $compradores->RecordCount();
		// Asignación de valores vendedor
		$row_consulta['nombre_comprador']=$comprador['nombre'];
		$row_consulta['apellidos_comprador']=$comprador['apellidos'];
		$row_consulta['provincia_comprador']=$comprador['provincia'];
		$row_consulta['poblacion_comprador']=$comprador['poblacion'];
		$row_consulta['domicilio_comprador']=$comprador['direccion'];
		$row_consulta['nif_comprador']=$comprador['nif'];
		$row_consulta['estado_civil_comprador']=$comprador['estado_civil'];
		// Datos del inmueble
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble=".$_GET['inmueble'];
		$inmuebles = $DB->Execute($sql) or die($DB->ErrorMsg());
		$inmueble = $inmuebles->FetchRow();
		$num_inmuebles = $inmuebles->RecordCount();
		// Asignación de valores inmueble
		$row_consulta['provincia_vivienda']=11;
		$row_consulta['poblacion_vivienda']=$inmueble['poblacion_inmueble'];
		$row_consulta['direccion_vivienda']=$inmueble['direccion'];
		// Registro
		$row_consulta['fecha']=date("Y-m-d");
		// Datos agente
		$usuario = new ModelUsuarios();
		$datos_usuario=$usuario->ObtenerDatosUsuario("nick",$_SESSION['usu']);
		$nick_usuario=$datos_usuario['nick'];
		// Asignación de valores agente
		$row_consulta['agente']=$datos_usuario['id_usuario'];
		$row_consulta['nombre_agente']=$datos_usuario['nombre'];
		$row_consulta['apellidos_agente']=$datos_usuario['apellidos'];
		$row_consulta['nif_agente']=$datos_usuario['nif'];
		// Cliente comprador
		$id_cliente_comprador=$_GET['cliente_comprador'];
		// Tipo de contrato
		$row_consulta['tipo_arrendamiento']=$_GET['tipo_arrendamiento'];
		// Mes de actualización de renta
		if($row_consulta['tipo_arrendamiento']==3)
		{
			$sql = "SELECT * FROM meses";
			$meses = $DB->Execute($sql) or die($DB->ErrorMsg());
			$mes = $meses->FetchRow();
			$num_meses = $meses->RecordCount();
		}
		// Valores del formulario
		$acceso_borrar_contrato=1;
		$acceso_cambiar_estado=1;
		// Opciones de interfaz
		$class_campo="campo_texto";
		$readonly="";
		// Enlace
		$enlace="insertar_contrato_arrendamiento";
		$_SESSION['id_cliente_vendedor_contrato_arrendamiento']=$_GET['id'];
		$_SESSION['id_inmueble_contrato_arrendamiento']=$_GET['inmueble'];
		$_SESSION['id_cliente_comprador_contrato_arrendamiento']=$_GET['cliente_comprador'];
		$_SESSION['id_tipo_arrendamiento_contrato_arrendamiento']=$_GET['tipo_arrendamiento'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/insertar.php');
	}
?>
<?php
	function editar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Usuarios.class.php');
		require_once('facturas/ControlFacturasContratosArrendamiento.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento=".$_GET['id_contrato_arrendamiento'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Datos de la factura
		$sql = "SELECT * FROM facturas_contratos_arrendamiento_inmueble WHERE contrato_arrendamiento=".$_GET['id_contrato_arrendamiento'];
		$facturas = $DB->Execute($sql) or die($DB->ErrorMsg());
		$factura = $facturas->FetchRow();
		$num_facturas = $facturas->RecordCount();
		// Cliente comprador
		$id_cliente_comprador=$row_consulta['cliente_comprador'];
		// Usuario agente
		$usuario = new ModelUsuarios();
		$datos_usuario=$usuario->ObtenerDatosUsuario("id_usuario",$row_consulta['agente']);
		$nick_usuario=$datos_usuario['nick'];
		// Datos NCC
		$ncc=explode(" ",$row_consulta['ncc']);
		$row_consulta['banco']=$ncc[0];
		$row_consulta['sucursal']=$ncc[1];
		$row_consulta['dc']=$ncc[2];
		$row_consulta['cuenta']=$ncc[3];
		// Mes de actualización de renta
		if($row_consulta['tipo_arrendamiento']==3)
		{
			$sql = "SELECT * FROM meses";
			$meses = $DB->Execute($sql) or die($DB->ErrorMsg());
			$mes = $meses->FetchRow();
			$num_meses = $meses->RecordCount();
		}
		// Se determina si se habilita el enlace para borrar la factura
		$acceso_borrar_factura=ControlFacturasContratosArrendamiento::ComprobarAccesoBorrar($_GET['id_contrato_arrendamiento']);
		// Se determina si se habilita el enlace para insertar o editar la factura
		$acceso_generar_factura=ControlFacturasContratosArrendamiento::ComprobarAccesoEditar($_GET['id_contrato_arrendamiento']);
		// Según el acceso a borrar se bloquearán secciones del formulario
		$acceso_borrar_contrato=ControlContratosArrendamiento::ComprobarAccesoBorrarContrato($_GET['id_contrato_arrendamiento']);
		// Opciones de interfaz
		if($acceso_borrar_contrato>0)
		{
			$class_campo="campo_texto";
			$readonly="";
		}
		else
		{
			$class_campo="campo_texto_blocked";
			$readonly='readonly="readonly"';
		}
		// Posibilidad de cambiar el estado
		$acceso_cambiar_estado=ControlContratosArrendamiento::ComprobarAccesoCambiarEstado($_GET['id_contrato_arrendamiento']);
		// Enlace
		$enlace="editar_contrato_arrendamiento";
		$_SESSION['id_cliente_vendedor_contrato_arrendamiento']=$_GET['id'];
		$_SESSION['id_inmueble_contrato_arrendamiento']=$_GET['inmueble'];
		$_SESSION['id_contrato_arrendamiento']=$_GET['id_contrato_arrendamiento'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/estas_seguro.php');
	}
?>
<?php
	function asociar_comprador()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Datos del vendedor
		$sql = "SELECT * FROM clientes WHERE id_cliente<>".$_GET['id'];
		$clientes = $DB->Execute($sql) or die($DB->ErrorMsg());
		$cliente = $clientes->FetchRow();
		$num_clientes = $clientes->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/asociar_comprador.php');
	}
?>
<?php
	function seleccionar_tipo_arrendamiento()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Datos del vendedor
		$sql = "SELECT * FROM tipos_arrendamiento ";
		$tipos_arrendamiento = $DB->Execute($sql) or die($DB->ErrorMsg());
		$tipo_arrendamiento = $tipos_arrendamiento->FetchRow();
		$num_tipos_arrendamiento = $tipos_arrendamiento->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/seleccionar_tipo_arrendamiento.php');
	}
?>