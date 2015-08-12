<?php include("modulousuarios.php");?>
<?php include("../../general/funcionesauxiliares.php");?>
<?php include("../../config/config.php");?>
<?php require_once("../../modelos/Model.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	// Sql de usuarios
	$sql_todas="SELECT * FROM usuarios WHERE 1 ";

	// Si se realizo una busqueda, se muestra si se encontraron resultados
	if($_POST)
	{
		// Si no hay errores en la busqueda...
		if(!($_SESSION['hayerroresbusqueda']))
		{
			// SQL Nombre
			if($_POST['nombre'] != "")
			{
				$nombres = explode(" ", $_POST['nombre']);
				if(count($nombres) != 0)
				{
					foreach ($nombres as $nombre)
					{
						$sql_nombres_separados .= " nombre LIKE '%" . $nombre . "%' OR ";
					}
					$sql_nombres_separados = substr($sql_nombres_separados, 0, strlen($sql_nombres_separados)-3);
					$sql_nombre = " AND ( ".$sql_nombres_separados." )";
				}
			}
			else
			{
				$sql_nombre="";
			}
			// SQL apellidos
			if($_POST['apellidos'] != "")
			{
				$apellidos = explode(" ", $_POST['apellidos']);
				if(count($apellidos) != 0)
				{
					foreach ($apellidos as $apellido)
					{
						$sql_apellidos_separados .= " apellidos LIKE '%" . $apellido . "%' OR ";
					}
					$sql_apellidos_separados = substr($sql_apellidos_separados, 0, strlen($sql_apellidos_separados)-3);
					$sql_apellidos = " AND ( ".$sql_apellidos_separados." )";
				}
			}
			else
			{
				$sql_apellidos="";
			}
			// SQL Correo
			if($_POST['correo'] != "")
			{
				$sql_correo= " AND correo ='" . $_POST['correo'] . "' ";
			}
			else
			{
				$sql_correo="";
			}																										
		}
		// SQL consulta
		$sql_todas .= $sql_nombre . $sql_apellidos . $sql_correo;			

		$_SESSION['sql_busq_usuarios_todos'] = $sql_todas;		
		$_SESSION['nombre_busq_usuarios']=$_POST['nombre'];
		$_SESSION['apellidos_busq_usuarios']=$_POST['apellidos'];
		$_SESSION['email_busq_usuarios']=$_POST['email'];
	}		
	// Resultado por defecto al entrar por primera vez
	if (!isset($_SESSION['sql_busq_usuarios_todos']))
	{
		$_SESSION['sql_busq_usuarios_todos'] = "SELECT * FROM usuarios WHERE 1 ";			
	}
	// Resultado cuando viene por un POST o una ordenación
	else
	{
		if (strpos($_SESSION['sql_busq_usuarios_todos'], "ORDER BY")!= false)
		{
			$_SESSION['sql_busq_usuarios_todos'] = substr($_SESSION['sql_busq_usuarios_todos'],0, strpos($_SESSION['sql_busq_usuarios_todos'], "ORDER BY"));
		}
	}
	
	// Conexión Base de datos
	$DB = new Model();
	// Consulta
	$todos = $DB->Execute($_SESSION['sql_busq_usuarios_todos']) or die($DB->ErrorMsg());
	$num_todos = $todos->RecordCount(); 
	// Inclusión librería
	include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
	$pages = new Paginator('usuarios');  
	$pages->items_total = $num_todos;  
	$pages->mid_range = 9;
	$pages->paginate();
	// configuramos datos de consulta (ver librería)
	if($num_todos==0)
		$sql_pagination_limit="";
	else
		$sql_pagination_limit=" ".$pages->limit;
	$_SESSION['display_pages_busq_usuarios']=$pages->display_pages();
	$_SESSION['display_menu_pages_busq_usuarios']='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
. $pages->display_items_per_page() . '</span>';
	
	if($_GET['campo'])
	{
		$_SESSION['sql_busq_usuarios_todos'] .= " ORDER BY " . $_GET['campo'] . " " . $_GET['orden'].$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_usuarios'] = $_GET['campo'];
	}
	else
	{	
		$_SESSION['sql_busq_usuarios_todos'] .= " ORDER BY apellidos ASC, nombre ASC".$sql_pagination_limit;
		$_SESSION['criterio_ordenacion_busq_usuarios'] = "nombre_completo";
	}
?>
<?php Interfaz::PlantillaGenerica("usuarios","usuarios"); ?>