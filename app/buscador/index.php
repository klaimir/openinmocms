<?php include("../../config/config.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("modulobuscador.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php	
	// Sql de inmuebles (comprar)
	$sql_comprar = "SELECT * FROM inmuebles WHERE bloqueado=0 AND precio_compra > 0 ";
	// Sql de inmuebles (alquilar)
	$sql_alquilar = "SELECT * FROM inmuebles WHERE bloqueado=0 AND precio_alquiler > 0 ";
		
	// Si se realizo una busqueda, se muestra si se encontraron resultados
	if($_POST)
	{
		if(!($_SESSION['hayerroresbusqueda']))
		{
			include(PATHINCLUDE_FRAMEWORK.'general/condiciones_busq_inmuebles.php');
		}			
		// Una vez establecidos los criterios de búsqueda, se concatenan a la consultas
		$sql_comprar .= $sql_precio_compra . $sql_region . $sql_provincia . $sql_poblacion . $sql_zona . $sql_palabras. $sql_tipo. $sql_antiguedad;
		$sql_alquilar .= $sql_precio_alquiler . $sql_region . $sql_provincia. $sql_poblacion . $sql_zona . $sql_palabras. $sql_tipo. $sql_antiguedad;
		// Establecemos las búsquedas personalizadas
		$_SESSION['s_busq_inmuebles_comprar'] = $sql_comprar;
		$_SESSION['s_busq_inmuebles_alquilar'] = $sql_alquilar;
		$_SESSION['precio_compra_busq_inmuebles']=$_POST['precio_compra'];
		$_SESSION['precio_alquiler_busq_inmuebles']=$_POST['precio_alquiler'];
		$_SESSION['tipos_busq_inmuebles']=$_POST['tipos'];
		$_SESSION['region_busq_inmuebles']=$_POST['region'];
		$_SESSION['poblacion_busq_inmuebles']=$_POST['poblacion'];
		$_SESSION['provincia_busq_inmuebles']=$_POST['provincia'];
		$_SESSION['zona_busq_inmuebles']=$_POST['zona'];
		$_SESSION['antiguedad_busq_inmuebles']=$_POST['antiguedad'];
		$_SESSION['palabras_busq_inmuebles']=$_POST['palabras'];
	}
			
	// Opción por defecto al entrar en el sistema
	if (!isset($_SESSION['s_busq_inmuebles_comprar']))
	{
		$_SESSION['s_busq_inmuebles_comprar'] = $sql_comprar;
		$_SESSION['s_busq_inmuebles_alquilar'] = $sql_alquilar;
	}
	// Se puede producir porque:
	// a) Venga de una consulta haciendo "submit"
	// b) Venga de una ordenación
	else
	{				
		if (strpos($_SESSION['s_busq_inmuebles_comprar'], "ORDER BY")!= false)
		{
			$_SESSION['s_busq_inmuebles_comprar'] = substr($_SESSION['s_busq_inmuebles_comprar'],0, strpos($_SESSION['s_busq_inmuebles_comprar'], "ORDER BY"));
		}
		if (strpos($_SESSION['s_busq_inmuebles_alquilar'], "ORDER BY")!= false)
		{
			$_SESSION['s_busq_inmuebles_alquilar'] = substr($_SESSION['s_busq_inmuebles_alquilar'],0, strpos($_SESSION['s_busq_inmuebles_alquilar'], "ORDER BY"));
		}	
	}
	// Conexión Base de datos
	$DB = new Model();
	/************************** COMPRAR **************************/
	// Consulta
	$todos = $DB->Execute($_SESSION['s_busq_inmuebles_comprar']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusión librería
	include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
	$pages = new Paginator('comprar');  
	$pages->items_total = $num_todos;  
	$pages->mid_range = 9;
	$pages->paginate();
	// configuramos datos de consulta (ver librería)
	if($num_todos==0)
		$sql_pagination_limit_comprar="";
	else
		$sql_pagination_limit_comprar=" ".$pages->limit;
	$_SESSION['display_pages_busq_inmuebles_comprar']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_inmuebles_comprar']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';
	/************************** ALQUILAR **************************/
	// Consulta	
	$todos = $DB->Execute($_SESSION['s_busq_inmuebles_alquilar']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusión librería
	$pages = new Paginator('alquilar');  
	$pages->items_total = $num_todos;  
	$pages->mid_range = 9;
	$pages->paginate();
	// configuramos datos de consulta (ver librería)
	if($num_todos==0)
		$sql_pagination_limit_alquilar="";
	else
		$sql_pagination_limit_alquilar=" ".$pages->limit;
	$_SESSION['display_pages_busq_inmuebles_alquilar']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_inmuebles_alquilar']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';
	
	// Se adiciona el campo de ordenación si se realiza una ordenación
	if($_GET['campo'])
	{			
		$_SESSION['s_busq_inmuebles_comprar'] .= " ORDER BY " . $_GET['campo'] . " " . $_GET['orden'].$sql_pagination_limit_comprar;
		$_SESSION['s_busq_inmuebles_alquilar'] .= " ORDER BY " . $_GET['campo'] . " " . $_GET['orden'].$sql_pagination_limit_alquilar;
		$_SESSION['criterio_ordenacion_busq_inmuebles_buscador'] = $_GET['campo'];
	}
	// Este caso solo se da cuando:
	// a) Entra por primera vez
	// b) se realiza una búsqueda personalizada con "submit"
	else
	{	
		$_SESSION['s_busq_inmuebles_comprar'] .= " ORDER BY precio_compra".$sql_pagination_limit_comprar;
		$_SESSION['s_busq_inmuebles_alquilar'] .= " ORDER BY precio_alquiler".$sql_pagination_limit_alquilar;
		$_SESSION['criterio_ordenacion_busq_inmuebles_buscador'] = "precio";
	}
?>
<?php Interfaz::PlantillaGenerica("buscador","buscador"); ?>
<?php
	// carga de regiones en AJAX
	if (isset($_SESSION['provincia_busq_inmuebles']))
	{
?>
		<script type="text/javascript">carga_regiones("<?php echo  $_SESSION['provincia_busq_inmuebles']; ?>","<?php echo  $_SESSION['region_busq_inmuebles']; ?>")</script>
<?php
	}
?>
<?php
	// carga de poblaciones en AJAX
	if (isset($_SESSION['region_busq_inmuebles']))
	{
?>
		<script type="text/javascript">carga_poblaciones("<?php echo  $_SESSION['region_busq_inmuebles']; ?>","<?php echo  $_SESSION['poblacion_busq_inmuebles']; ?>")</script>
<?php
	}
?>
<?php
	// carga de zonas en AJAX
	if (isset($_SESSION['poblacion_busq_inmuebles']))
	{
?>
		<script type="text/javascript">carga_zonas("<?php echo  $_SESSION['poblacion_busq_inmuebles']; ?>","<?php echo  $_SESSION['zona_busq_inmuebles']; ?>")</script>
<?php
	}
?>