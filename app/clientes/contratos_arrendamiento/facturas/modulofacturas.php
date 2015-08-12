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
		// Datos del inmueble
		$sql = "SELECT * FROM contratos_arrendamiento_inmueble WHERE id_contrato_arrendamiento=".$_GET['contrato_arrendamiento'];
		$contratos = $DB->Execute($sql) or die($DB->ErrorMsg());
		$contrato = $contratos->FetchRow();
		$num_contratos = $contratos->RecordCount();
		// Registro
		$row_consulta['fecha_emision']=date("Y-m-d");
		$row_consulta['iva']=IVA_FACTURAS_FRAMEWORK;
		$row_consulta['cantidad_parcial']=($contrato['cuota_mensual']*PORCENTAJE_COMISION_FACTURAS_FRAMEWORK)/100;
		$row_consulta['cantidad_iva']=($row_consulta['cantidad_parcial']*$row_consulta['iva'])/100;
		$row_consulta['cantidad_total']=$row_consulta['cantidad_parcial']+$row_consulta['cantidad_iva'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/facturas/insertar.php');
	}
?>
<?php
	function editar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Usuarios.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM facturas_contratos_arrendamiento_inmueble WHERE contrato_arrendamiento=".$_GET['contrato_arrendamiento'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
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
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/facturas/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/contratos_arrendamiento/facturas/estas_seguro.php');
	}
?>