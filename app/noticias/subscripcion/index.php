<?php include("modulosubscripcion.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php include("../../../config/config.php");?>
<?php require_once("../../../modelos/Model.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Sql de canales_noticias
	$sql_todas="SELECT * FROM canales_noticias WHERE 1 ";

	// Si se realizo una busqueda, se muestra si se encontraron resultados
	if($_POST)
	{
		// Si no hay errores en la busqueda...
		if(!($_SESSION['hayerroresbusqueda']))
		{
			// SQL Título
			if($_POST['titulo'] != "")
			{
				$titulos = explode(" ", $_POST['titulo']);
				if(count($titulos) != 0)
				{
					foreach ($titulos as $titulo)
					{
						$sql_titulos_separados .= " titulo LIKE '%" . $titulo . "%' OR ";
					}
					$sql_titulos_separados = substr($sql_titulos_separados, 0, strlen($sql_titulos_separados)-3);
					$sql_titulo = " AND ( ".$sql_titulos_separados." )";
				}
			}
			else
			{
				$sql_titulo="";
			}
		}
		// SQL consulta
		$sql_todas .= $sql_titulo;			

		$_SESSION['sql_busq_canales_noticias_todos'] = $sql_todas;		
		$_SESSION['titulo_busq_canales_noticias']=$_POST['titulo'];
	}		
	// Resultado por defecto al entrar por primera vez
	if (!isset($_SESSION['sql_busq_canales_noticias_todos']))
	{
		$_SESSION['sql_busq_canales_noticias_todos'] = "SELECT * FROM canales_noticias WHERE 1 ";	
	}
	// Resultado cuando viene por un POST o una ordenación
	else
	{
		if (strpos($_SESSION['sql_busq_canales_noticias_todos'], "ORDER BY")!= false)
		{
			$_SESSION['sql_busq_canales_noticias_todos'] = substr($_SESSION['sql_busq_canales_noticias_todos'],0, strpos($_SESSION['sql_busq_canales_noticias_todos'], "ORDER BY"));
		}
	}
	
	// Conexión Base de datos
	$DB = new Model();
	// Consulta
	$todos = $DB->Execute($_SESSION['sql_busq_canales_noticias_todos']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusión librería
	include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
	$pages = new Paginator('noticias');  
	$pages->items_total = $num_todos;  
	$pages->mid_range = 9;
	$pages->paginate();
	// configuramos datos de consulta (ver librería)
	if($num_todos==0)
		$sql_pagination_limit="";
	else
		$sql_pagination_limit=" ".$pages->limit;
	$_SESSION['display_pages_busq_canales_noticias']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_canales_noticias']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';
	
	if($_GET['campo'])
	{
		$_SESSION['sql_busq_canales_noticias_todos'] .= " ORDER BY " . $_GET['campo'] . " " . $_GET['orden'].$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_canales_noticias'] = $_GET['campo'];
	}
	else
	{	
		$_SESSION['sql_busq_canales_noticias_todos'] .= " ORDER BY titulo ASC".$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_canales_noticias'] = "titulo";
	}
?>
<?php Interfaz::PlantillaGenerica("noticias","publicaciones"); ?>