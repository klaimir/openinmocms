<?php include("moduloinformes.php");?>
<?php include("../../config/config.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Sql de inmuebles
	$sql_todos = "SELECT * FROM inmuebles WHERE 1 ";
	$sql_ninguno = "SELECT * FROM inmuebles WHERE 0 ";
		
	// Si se realizo una busqueda, se muestra si se encontraron resultados
	if($_POST)
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		if($_POST['provincia'] == "")
		{
			$hayerrores = true; $errores[$i++] = "Debe seleccionar una provincia para la búsqueda";
			$_SESSION['s_busq_informes_regiones_todos'] = $sql_ninguno;
		}
		else
		{		
			include(PATHINCLUDE_FRAMEWORK.'general/condiciones_busq_inmuebles.php');
			// Una vez establecidos los criterios de búsqueda, se concatenan a la consultas
			$sql_todos .= $sql_provincia;
			// Establecemos las búsquedas personalizadas
			$_SESSION['s_busq_informes_regiones_todos'] = $sql_todos;
		}			
		
		// Asignamos las variables que almacenan la información sobre si ha habido errores
		// y los errores cometidos en variables de sesión
		$_SESSION['hayerroresbusqueda'] = $hayerrores;
		$_SESSION['erroresbusqueda'] = $errores;
	}
	// Valor por defecto
	else
	{
		$_SESSION['s_busq_informes_regiones_todos'] = $sql_ninguno;
	}
	
	// Conexión Base de datos
	$DB = new Model();
	// Consulta
	$todos = $DB->Execute($_SESSION['s_busq_informes_regiones_todos']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusión librería
	include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
	$pages = new Paginator('regiones');  
	$pages->items_total = $num_todos;  
	$pages->mid_range = 9;
	$pages->paginate();
	// configuramos datos de consulta (ver librería)
	if($num_todos==0)
		$sql_pagination_limit="";
	else
		$sql_pagination_limit=" ".$pages->limit;
	$_SESSION['display_pages_busq_informes_regiones']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_informes_regiones']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';

	// Paginación en el sql
	$_SESSION['s_busq_informes_regiones_todos'].=$sql_pagination_limit;
?>
<?php Interfaz::PlantillaGenerica("informes","informe_regiones"); ?>