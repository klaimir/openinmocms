<?php include("moduloinmuebles.php");?>
<?php include("../../config/config.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("ControlInmuebles.class.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso(); ?>
<?php
	// Sql de inmuebles
	$sql_todos = "SELECT * FROM inmuebles WHERE poblacion_inmueble IN (SELECT oficinas_poblaciones.poblacion FROM oficinas_poblaciones,oficinas_usuarios WHERE oficinas_poblaciones.oficina=oficinas_usuarios.oficina AND usuario=".$_SESSION['id_usuario'].") ";
		
	// Si se realizo una busqueda, se muestra si se encontraron resultados
	if($_POST)
	{
		if(!($_SESSION['hayerroresbusqueda']))
		{
			// Condiciones generales
			include(PATHINCLUDE_FRAMEWORK.'general/condiciones_busq_inmuebles.php');
			// Dirección
			if($_POST['direccion'] != "")  
			{
				$sql_direccion = " AND ( direccion LIKE '%" . $_POST['direccion'] . "%' )";			
			}
			else
			{
				$sql_direccion="";
			}
		}			
		// Una vez establecidos los criterios de búsqueda, se concatenan a la consultas
		$sql_todos .= $sql_opcion . $sql_region. $sql_provincia . $sql_zona . $sql_palabras. $sql_poblacion. $sql_direccion. $sql_tipo. $sql_antiguedad. $sql_captadores. $sql_tipo_certificacion_energetica;
		// Establecemos las búsquedas personalizadas
		$_SESSION['s_busq_gest_inmuebles_todos'] = $sql_todos;
		$_SESSION['region_busq_gest_inmuebles']=$_POST['region'];
		$_SESSION['poblacion_busq_gest_inmuebles']=$_POST['poblacion'];
		$_SESSION['provincia_busq_gest_inmuebles']=$_POST['provincia'];
		$_SESSION['zona_busq_gest_inmuebles']=$_POST['zona'];
		$_SESSION['opciones_busq_gest_inmuebles']=$_POST['opciones'];
		$_SESSION['captadores_busq_gest_inmuebles']=$_POST['captadores'];
		$_SESSION['tipos_busq_gest_inmuebles']=$_POST['tipos'];
		$_SESSION['tipo_certificacion_energetica_busq_gest_inmuebles']=$_POST['tipo_certificacion_energetica'];
		$_SESSION['palabras_busq_gest_inmuebles']=$_POST['palabras'];
		$_SESSION['antiguedad_busq_gest_inmuebles']=$_POST['antiguedad'];
		$_SESSION['direccion_busq_gest_inmuebles']=$_POST['direccion'];
	}
			
	// Opción por defecto al entrar en el sistema
	if (!isset($_SESSION['s_busq_gest_inmuebles_todos']))
	{
		$_SESSION['s_busq_gest_inmuebles_todos'] = $sql_todos;
	}
	// Se puede producir porque:
	// a) Venga de una consulta haciendo "submit"
	// b) Venga de una ordenación
	else
	{				
		if (strpos($_SESSION['s_busq_gest_inmuebles_todos'], "ORDER BY")!= false)
		{
			$_SESSION['s_busq_gest_inmuebles_todos'] = substr($_SESSION['s_busq_gest_inmuebles_todos'],0, strpos($_SESSION['s_busq_gest_inmuebles_todos'], "ORDER BY"));
		}	
	}
	
	// Conexión Base de datos
	$DB = new Model();
	// Consulta
	$todos = $DB->Execute($_SESSION['s_busq_gest_inmuebles_todos']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusión librería
	include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
	$pages = new Paginator('inmuebles');  
	$pages->items_total = $num_todos;  
	$pages->mid_range = 9;
	$pages->paginate();
	// configuramos datos de consulta (ver librería)
	if($num_todos==0)
		$sql_pagination_limit="";
	else
		$sql_pagination_limit=" ".$pages->limit;
	$_SESSION['display_pages_busq_inmuebles']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_inmuebles']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';
	
	// Se adiciona el campo de ordenación si se realiza una ordenación
	if($_GET['campo'])
	{			
		$_SESSION['s_busq_gest_inmuebles_todos'] .= " ORDER BY " . $_GET['campo'] . " " . $_GET['orden'].$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_gest_inmuebles_buscador'] = $_GET['campo'];
	}
	// Este caso solo se da cuando:
	// a) Entra por primera vez
	// b) se realiza una búsqueda personalizada con "submit"
	else
	{	
		$_SESSION['s_busq_gest_inmuebles_todos'] .= " ORDER BY id_inmueble".$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_gest_inmuebles_buscador'] = "id_inmueble";
	}
?>
<?php Interfaz::PlantillaGenerica("inmuebles","buscador"); ?>
<?php
	// carga de regiones en AJAX
	if (isset($_SESSION['provincia_busq_gest_inmuebles']))
	{
?>
		<script type="text/javascript">carga_regiones_agente("<?php echo  $_SESSION['provincia_busq_gest_inmuebles']; ?>","<?php echo  $_SESSION['region_busq_gest_inmuebles']; ?>")</script>
<?php
	}
?>
<?php
	// carga de poblaciones en AJAX
	if (isset($_SESSION['region_busq_gest_inmuebles']))
	{
?>
		<script type="text/javascript">carga_poblaciones_agente("<?php echo  $_SESSION['region_busq_gest_inmuebles']; ?>","<?php echo  $_SESSION['poblacion_busq_gest_inmuebles']; ?>")</script>
<?php
	}
?>
<?php
	// carga de regiones en AJAX
	if (isset($_SESSION['poblacion_busq_gest_inmuebles']))
	{
?>
		<script type="text/javascript">carga_zonas("<?php echo  $_SESSION['poblacion_busq_gest_inmuebles']; ?>","<?php echo  $_SESSION['zona_busq_gest_inmuebles']; ?>")</script>
<?php
	}
?>