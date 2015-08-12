<?php
	function buscador()
	{
		// Conexión Base de datos
		$presupuestos = new ModelPresupuestosInmueble();
		// Datos de presupuestos
		$todos = $presupuestos->ObtenerPresupuestosInmueble($_GET['id']);
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/presupuestos/index.php');
	}
?>
<?php
	function insertar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Model.class.php');
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'PresupuestosComunidadesAutonomas.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble=".$_GET['id'];
		$inmuebles = $DB->Execute($sql) or die($DB->ErrorMsg());
		$inmueble = $inmuebles->FetchRow();
		$num_inmuebles = $inmuebles->RecordCount();
		// Asignación de valores inmueble
		$row_consulta['provincia_vivienda']=$inmueble['provincia_inmueble'];
		$row_consulta['poblacion_vivienda']=$inmueble['poblacion_inmueble'];
		$row_consulta['direccion_vivienda']=$inmueble['direccion'];
		$row_consulta['precio_vivienda']=$inmueble['precio_compra'];
		// Datos de configuración por comunidad
		$sql = "SELECT * FROM provincias WHERE id_provincia=".$row_consulta['provincia_vivienda'];
		$provincias = $DB->Execute($sql) or die($DB->ErrorMsg());
		$provincia = $provincias->FetchRow();
		$num_provincias = $provincias->RecordCount();
		// Asignación de comunidad autónoma
		$row_consulta['comunidad_autonoma']=$provincia['comunidad_autonoma'];
		// Asignación de porcentaje iajd
		$presupuesto_comunidad_autonoma = new ModelPresupuestosComunidadesAutonomas();
		$row_consulta['iajd']=$presupuesto_comunidad_autonoma->ObtenerPorcentajeIAJD($row_consulta['comunidad_autonoma'],$inmueble['antiguedad']);
		// Registro
		$row_consulta['fecha']=date("Y-m-d");
		// Tipo de presupuesto
		$row_consulta['tipo_presupuesto']=$inmueble['antiguedad'];
		// Opciones interfaz
		$class_campo="campo_texto";
		$readonly='';
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/presupuestos/insertar.php');
	}
?>
<?php
	function editar()
	{
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Usuarios.class.php');
		// Conexión Base de datos
		$DB = new Model();
		// Datos del inmueble
		$sql = "SELECT * FROM presupuestos_inmueble WHERE id_presupuesto=".$_GET['id_presupuesto']." AND inmueble=".$_GET['id'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Opciones interfaz
		$class_campo="campo_texto_blocked";
		$readonly='readonly="readonly"';
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/presupuestos/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/presupuestos/estas_seguro.php');
	}
?>