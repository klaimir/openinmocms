<?php include("moduloinformes.php");?>
<?php include("../../config/config.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Sql de inmuebles
	$sql_todos = "SELECT * FROM inmuebles WHERE 1 ";
		
	// Si se realizo una busqueda, se muestra si se encontraron resultados
	if($_POST)
	{
		// Inicializaci�n de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;

		include(PATHINCLUDE_FRAMEWORK.'general/condiciones_busq_inmuebles.php');
		
		// Una vez establecidos los criterios de b�squeda, se concatenan a la consultas
		$sql_todos .= $sql_region. $sql_provincia. $sql_poblacion. $sql_zona;
		// Establecemos las b�squedas personalizadas
		$_SESSION['s_busq_informes_opciones_todos'] = $sql_todos;	
		
		// Asignamos las variables que almacenan la informaci�n sobre si ha habido errores
		// y los errores cometidos en variables de sesi�n
		$_SESSION['hayerroresbusqueda'] = $hayerrores;
		$_SESSION['erroresbusqueda'] = $errores;
	}
	// Valor por defecto
	else
	{
		$_SESSION['s_busq_informes_opciones_todos'] = $sql_todos;
	}
	
	// Conexi�n Base de datos
	$DB = new Model();
	// Consulta
	$todos = $DB->Execute($_SESSION['s_busq_informes_opciones_todos']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusi�n librer�a
	include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
	$pages = new Paginator('opciones');  
	$pages->items_total = $num_todos;  
	$pages->mid_range = 9;
	$pages->paginate();
	// configuramos datos de consulta (ver librer�a)
	if($num_todos==0)
		$sql_pagination_limit="";
	else
		$sql_pagination_limit=" ".$pages->limit;
	$_SESSION['display_pages_busq_informes_opciones']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_informes_opciones']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';

	// Paginaci�n en el sql
	$_SESSION['s_busq_informes_opciones_todos'].=$sql_pagination_limit;
?>
<?php Interfaz::PlantillaGenerica("informes","informe_opciones"); ?>
<?php
	// carga de regiones en AJAX
	if (isset($_POST['provincia']))
	{
?>
		<script type="text/javascript">carga_regiones("<?php echo  $_POST['provincia']; ?>","<?php echo  $_POST['region']; ?>")</script>
<?php
	}
?>
<?php
	// carga de poblaciones en AJAX
	if (isset($_POST['region']))
	{
?>
		<script type="text/javascript">carga_poblaciones("<?php echo  $_POST['region']; ?>","<?php echo  $_POST['poblacion']; ?>")</script>
<?php
	}
?>
<?php
	// carga de zonas en AJAX
	if (isset($_POST['poblacion']))
	{
?>
		<script type="text/javascript">carga_zonas("<?php echo  $_POST['poblacion']; ?>","<?php echo  $_POST['zona']; ?>")</script>
<?php
	}
?>