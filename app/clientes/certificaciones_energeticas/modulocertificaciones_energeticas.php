<?php
	function buscador()
	{
		$generar=ControlCertificacionesEnergeticas::ComprobarAccesoGenerarContrato($_GET['inmueble'],$_GET['id']);
		// Conexión Base de datos
		$DB = new Model();
		// Sql de inmuebles
		$sql_todos = "SELECT * FROM certificaciones_energeticas_cliente WHERE cliente = ".$_GET['id']." AND inmueble = ".$_GET['inmueble'];	
		// Buscador registrados en la aplicacion con las opciones seleccionadas
		$todos = $DB->Execute($sql_todos) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/certificaciones_energeticas/index.php');
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
		// Valores del formulario
		$acceso_borrar=1;
		$acceso_cambiar_estado=1;
		// Opciones de interfaz
		$class_campo="campo_texto";
		$readonly="";
		// Enlace
		$enlace="insertar_certificacion_energetica";
		$_SESSION['id_cliente_certificacion_energetica']=$_GET['id'];
		$_SESSION['id_inmueble_certificacion_energetica']=$_GET['inmueble'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/certificaciones_energeticas/insertar.php');
	}
?>
<?php
	function editar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Usuarios.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM certificaciones_energeticas_cliente WHERE inmueble=".$_GET['inmueble']." AND cliente=".$_GET['id'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Usuario agente
		$usuario = new ModelUsuarios();
		$datos_usuario=$usuario->ObtenerDatosUsuario("id_usuario",$row_consulta['agente']);
		$nick_usuario=$datos_usuario['nick'];
		// Según el acceso a borrar se bloquearán secciones del formulario
		$acceso_borrar=ControlCertificacionesEnergeticas::ComprobarAccesoBorrarContrato($_GET['inmueble'],$_GET['id']);
		// Opciones de interfaz
		if($acceso_borrar>0)
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
		$acceso_cambiar_estado=ControlCertificacionesEnergeticas::ComprobarAccesoCambiarEstado($_GET['inmueble'],$_GET['id']);
		// Enlace
		$enlace="editar_certificacion_energetica";
		$_SESSION['id_cliente_certificacion_energetica']=$_GET['id'];
		$_SESSION['id_inmueble_certificacion_energetica']=$_GET['inmueble'];
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/certificaciones_energeticas/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'clientes/certificaciones_energeticas/estas_seguro.php');
	}
?>