<?php include("moduloinmuebles.php");?>
<?php include("../../../../config/config.php");?>
<?php include("../../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../../modelos/InmueblesFichasVisitaCliente.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Sql de inmuebles
	$sql_todos = "SELECT * FROM inmuebles WHERE id_inmueble NOT IN (SELECT inmueble FROM inmuebles_fichas_visita_cliente WHERE cliente=".$_GET['id'].") ";
	
	// Opciones por defecto	
	if ($_GET['busqueda_inicial']==1)
	{
		$_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'] = $sql_todos;
		$_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes']="";
		$_SESSION['poblacion_busq_gest_inmuebles_fichas_visita_clientes']="";
		$_SESSION['region_busq_gest_inmuebles_fichas_visita_clientes']="";
		$_SESSION['zona_busq_gest_inmuebles_fichas_visita_clientes']="";
		$_SESSION['opciones_busq_gest_inmuebles_fichas_visita_clientes']="";
		$_SESSION['palabras_busq_gest_inmuebles_fichas_visita_clientes']="";
	}
	
	// Si se realizo una busqueda, se muestra si se encontraron resultados
	if($_POST)
	{
		if(!($_SESSION['hayerroresbusqueda']))
		{
			include(PATHINCLUDE_FRAMEWORK.'general/condiciones_busq_inmuebles.php');
		}			
		// Una vez establecidos los criterios de búsqueda, se concatenan a la consultas
		$sql_todos .= $sql_opcion . $sql_region . $sql_zona. $sql_poblacion . $sql_palabras. $sql_provincia;
		// Establecemos las búsquedas personalizadas
		$_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'] = $sql_todos;
		$_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes']=$_POST['provincia'];
		$_SESSION['region_busq_gest_inmuebles_fichas_visita_clientes']=$_POST['region'];
		$_SESSION['poblacion_busq_gest_inmuebles_fichas_visita_clientes']=$_POST['poblacion'];
		$_SESSION['zona_busq_gest_inmuebles_fichas_visita_clientes']=$_POST['zona'];
		$_SESSION['opciones_busq_gest_inmuebles_fichas_visita_clientes']=$_POST['opciones'];
		$_SESSION['palabras_busq_gest_inmuebles_fichas_visita_clientes']=$_POST['palabras'];
	}
			
	// Opción por defecto al entrar en el sistema
	if (!isset($_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos']))
	{
		$_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'] = $sql_todos;
	}
	// Se puede producir porque:
	// a) Venga de una consulta haciendo "submit"
	// b) Venga de una ordenación
	else
	{				
		if (strpos($_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'], "ORDER BY")!= false)
		{
			$_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'] = substr($_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'],0, strpos($_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'], "ORDER BY"));
		}	
	}
	
	// Conexión Base de datos
	$DB = new Model();
	// Consulta
	$todos = $DB->Execute($_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusión librería
	include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
	$pages = new Paginator('clientes');  
	$pages->items_total = $num_todos;
	$pages->url_actual = $_SESSION['rutaraiz']."app/clientes/fichas_visita/inmuebles/index.php?id=".$_GET['id']."&ficha_visita=".$_GET['ficha_visita'];
	$pages->separador = "&";
	$pages->mid_range = 9;
	$pages->paginate();
	$pages->items_per_page = 10;
	// configuramos datos de consulta (ver librería)
	if($num_todos==0)
		$sql_pagination_limit="";
	else
		$sql_pagination_limit=" ".$pages->limit;
	$_SESSION['display_pages_busq_inmuebles_fichas_visita_clientes']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_inmuebles_fichas_visita_clientes']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';

	// Se adiciona el campo de ordenación si se realiza una ordenación
	if($_GET['campo'])
	{			
		$_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'] .= " ORDER BY " . $_GET['campo'] . " " . $_GET['orden'].$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_gest_inmuebles_fichas_visita_clientes_buscador'] = $_GET['campo'];
	}
	// Este caso solo se da cuando:
	// a) Entra por primera vez
	// b) se realiza una búsqueda personalizada con "submit"
	else
	{	
		$_SESSION['s_busq_gest_inmuebles_fichas_visita_clientes_todos'] .= " ORDER BY id_inmueble".$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_gest_inmuebles_fichas_visita_clientes_buscador'] = "id_inmueble";
	}
?>
<?php Interfaz::PlantillaGenerica("clientes","buscador"); ?>
<?php
	// carga de regiones en AJAX
	if (isset($_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes']))
	{
?>
		<script type="text/javascript">carga_regiones("<?php echo  $_SESSION['provincia_busq_gest_inmuebles_fichas_visita_clientes']; ?>","<?php echo  $_SESSION['region_busq_gest_inmuebles_fichas_visita_clientes']; ?>")</script>
<?php
	}
?>
<?php
	// carga de poblaciones en AJAX
	if (isset($_SESSION['region_busq_gest_inmuebles_fichas_visita_clientes']))
	{
?>
		<script type="text/javascript">carga_poblaciones("<?php echo  $_SESSION['region_busq_gest_inmuebles_fichas_visita_clientes']; ?>","<?php echo  $_SESSION['poblacion_busq_gest_inmuebles_fichas_visita_clientes']; ?>")</script>
<?php
	}
?>
<?php
	// carga de zonas en AJAX
	if (isset($_SESSION['poblacion_busq_gest_inmuebles_fichas_visita_clientes']))
	{
?>
		<script type="text/javascript">carga_zonas("<?php echo  $_SESSION['poblacion_busq_gest_inmuebles_fichas_visita_clientes']; ?>","<?php echo  $_SESSION['zona_busq_gest_inmuebles_fichas_visita_clientes']; ?>")</script>
<?php
	}
?>