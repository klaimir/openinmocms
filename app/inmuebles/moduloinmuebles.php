<?php
	function buscador()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de provincias
		$sql_provincias = "SELECT distinct(provincia_inmueble),provincias.* FROM inmuebles, provincias WHERE id_provincia=provincia_inmueble ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Obtencion de captadores		
		$sql_captadores = "SELECT * FROM usuarios ORDER BY apellidos ASC, nombre ASC";		
		$captadores = $DB->Execute($sql_captadores) or die($DB->ErrorMsg());
		$captador = $captadores->FetchRow();
		$num_captadores = $captadores->RecordCount();
		// Obtencion de opciones		
		$sql_opciones = "SELECT * FROM opciones ORDER BY nombre_opcion ASC";		
		$opciones = $DB->Execute($sql_opciones) or die($DB->ErrorMsg());
		$opcion = $opciones->FetchRow();
		$num_opciones = $opciones->RecordCount();
		// Tipos de certificación energética
		$sql = "SELECT * FROM tipos_certificacion_energetica";
		$certificaciones = $DB->Execute($sql) or die($DB->ErrorMsg());
		$certificacion = $certificaciones->FetchRow();
		$num_certificaciones = $certificaciones->RecordCount();	
		// Obtencion de tipos
		$sql_tipos = "SELECT * FROM tipos_inmueble ORDER BY nombre_tipo ASC";
		$tipos = $DB->Execute($sql_tipos) or die($DB->ErrorMsg());
		$tipo = $tipos->FetchRow();
		$num_tipos = $tipos->RecordCount();		
		// Buscador registrados en la aplicacion con las opciones seleccionadas
		$todos = $DB->Execute($_SESSION['s_busq_gest_inmuebles_todos']) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/index.php');
	}
?>
<?php
	function insertar()
	{
		// Conexión Base de datos
		$DB = new Model();
		// Obtencion de provincias
		$sql_provincias = "SELECT * FROM provincias ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Obtencion de captadores		
		$sql_captadores = "SELECT * FROM usuarios ORDER BY apellidos ASC, nombre ASC";		
		$captadores = $DB->Execute($sql_captadores) or die($DB->ErrorMsg());
		$captador = $captadores->FetchRow();
		$num_captadores = $captadores->RecordCount();
		// Obtencion de tipos
		$sql_tipos = "SELECT * FROM tipos_inmueble ORDER BY nombre_tipo ASC";
		$tipos = $DB->Execute($sql_tipos) or die($DB->ErrorMsg());
		$tipo = $tipos->FetchRow();
		$num_tipos = $tipos->RecordCount();
		// Tipos de certificación energética
		$sql = "SELECT * FROM tipos_certificacion_energetica";
		$certificaciones = $DB->Execute($sql) or die($DB->ErrorMsg());
		$certificacion = $certificaciones->FetchRow();
		$num_certificaciones = $certificaciones->RecordCount();
		// Si se da de alta cliente
		if($_GET['cliente']==1)
		{
			// Provincias
			$sql = "SELECT * FROM provincias ORDER BY provincia";
			$provincias_cliente = $DB->Execute($sql) or die($DB->ErrorMsg());
			$provincia_cliente = $provincias_cliente->FetchRow();
			$num_provincias_cliente = $provincias_cliente->RecordCount();
			// Obtencion de agentes asignados		
			$sql_agentes_asignados = "SELECT * FROM usuarios ORDER BY apellidos ASC, nombre ASC";		
			$agentes_asignados = $DB->Execute($sql_agentes_asignados) or die($DB->ErrorMsg());
			$agente_asignado = $agentes_asignados->FetchRow();
			$num_agentes_asignados = $agentes_asignados->RecordCount();
		}
		// Opciones de interfaz
		$class_campo="campo_texto";
		$readonly="";
		$row_consulta['estado']="activo";
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/insertar.php');
	}
?>
<?php
	function editar()
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Datos del inmueble
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble=".$_GET['id'];
		$consulta = $DB->Execute($sql) or die($DB->ErrorMsg());
		$row_consulta = $consulta->FetchRow();
		$num_consulta = $consulta->RecordCount();
		// Obtencion de captadores		
		$sql_captadores = "SELECT * FROM usuarios ORDER BY apellidos ASC, nombre ASC";		
		$captadores = $DB->Execute($sql_captadores) or die($DB->ErrorMsg());
		$captador = $captadores->FetchRow();
		$num_captadores = $captadores->RecordCount();
		// Tipos de certificación energética
		$sql = "SELECT * FROM tipos_certificacion_energetica";
		$certificaciones = $DB->Execute($sql) or die($DB->ErrorMsg());
		$certificacion = $certificaciones->FetchRow();
		$num_certificaciones = $certificaciones->RecordCount();
		// Clientes del inmueble
		$clientes = $DB->Execute("SELECT * FROM clientes_inmuebles WHERE inmueble = ".$_GET['id']) or die($DB->ErrorMsg());
		$cliente = $clientes->FetchRow();
		$num_clientes = $clientes->RecordCount();
		// Enlaces del inmueble
		$enlaces = $DB->Execute("SELECT * FROM enlaces_inmueble WHERE inmueble = ".$_GET['id']) or die($DB->ErrorMsg());
		$enlace = $enlaces->FetchRow();
		$num_enlaces = $enlaces->RecordCount();
		// Obtencion de provincias
		$sql_provincias = "SELECT * FROM provincias ORDER BY provincia ASC";
		$provincias = $DB->Execute($sql_provincias) or die($DB->ErrorMsg());
		$num_provincias = $provincias->RecordCount();
		$provincia = $provincias->FetchRow();
		// Obtencion de tipos
		$sql_tipos = "SELECT * FROM tipos_inmueble ORDER BY nombre_tipo ASC";
		$tipos = $DB->Execute($sql_tipos) or die($DB->ErrorMsg());
		$tipo = $tipos->FetchRow();
		$num_tipos = $tipos->RecordCount();
		// Fotos del inmueble
		$todos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=2") or die($DB->ErrorMsg());
		$num_todos = $todos->RecordCount(); 
		// Inclusión librería
		include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
		$pages = new Paginator('fotos');  
		$pages->items_total = $num_todos;  
		$pages->mid_range = 9;
		$pages->items_per_page = 1;
		$pages->url_actual = $_SESSION['rutaraiz']."app/inmuebles/editar.php?id=".$_GET['id'];
		$pages->separador = "&";
		$pages->paginate();
		// configuramos datos de consulta (ver librería)
		if($num_todos==0)
			$sql_pagination_limit_fotos="";
		else
			$sql_pagination_limit_fotos=" ".$pages->limit;
		$display_pages_fotos=$pages->display_pages();
		$display_menu_pages_fotos='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
	. $pages->display_items_per_page() . '</span>';
		// Consulta fotos
		$todos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=2".$sql_pagination_limit_fotos) or die($DB->ErrorMsg());
		$todo = $todos->FetchRow();
		$num_todos = $todos->RecordCount();
		// Planos del inmueble
		$planos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=3") or die($DB->ErrorMsg());
		$num_planos = $planos->RecordCount(); 
		// Inclusión librería
		$pages = new Paginator('planos');  
		$pages->items_total = $num_planos;  
		$pages->mid_range = 9;
		$pages->items_per_page = 1;
		$pages->url_actual = $_SESSION['rutaraiz']."app/inmuebles/editar.php?id=".$_GET['id'];
		$pages->separador = "&";
		$pages->paginate();
		// configuramos datos de consulta (ver librería)
		if($num_planos==0)
			$sql_pagination_limit_planos="";
		else
			$sql_pagination_limit_planos=" ".$pages->limit;
		$display_pages_planos=$pages->display_pages();
		$display_menu_pages_planos='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
	. $pages->display_items_per_page() . '</span>';
		// Consulta planos
		$planos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=3".$sql_pagination_limit_planos) or die($DB->ErrorMsg());
		$plano = $planos->FetchRow();
		$num_planos = $planos->RecordCount();
		// Videos del inmueble
		$videos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=4") or die($DB->ErrorMsg());
		$num_videos = $videos->RecordCount(); 
		// Inclusión librería
		$pages = new Paginator('videos');  
		$pages->items_total = $num_videos;  
		$pages->mid_range = 9;
		$pages->items_per_page = 1;
		$pages->url_actual = $_SESSION['rutaraiz']."app/inmuebles/editar.php?id=".$_GET['id'];
		$pages->separador = "&";
		$pages->paginate();
		// configuramos datos de consulta (ver librería)
		if($num_videos==0)
			$sql_pagination_limit_videos="";
		else
			$sql_pagination_limit_videos=" ".$pages->limit;
		$display_pages_videos=$pages->display_pages();
		$display_menu_pages_videos='<span style="margin-left:25px"> '. $pages->display_jump_menu()  
	. $pages->display_items_per_page() . '</span>';
		// Consulta videos
		$videos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=4".$sql_pagination_limit_videos) or die($DB->ErrorMsg());
		$video = $videos->FetchRow();
		$num_videos = $videos->RecordCount();
		// Dirección en google maps
		if($row_consulta['direccion']!="")
		{
			// La dirección se compondrá de la composición del campo dirección + poblacion + porvincia si es diferente a "Otros"
			$direccion=$row_consulta['direccion'].", ".formatear_provincia($row_consulta['poblacion_inmueble']).", ".formatear_provincia($row_consulta['provincia_inmueble']);
			// Se configura el mapa de Google
			require(PATHINCLUDE_FRAMEWORK."librerias/EasyGoogleMap.class.php");
			$gm = new EasyGoogleMap(PATHINCLUDE_KEY_GOOGLE_MAPS);
			$gm->SetMapZoom(15);
			$gm->SetMapWidth(1000);
			$gm->SetMapHeight(500);
			$gm->SetAddress($direccion);
			/*
			// Aunque los datos son correctos, al ejectura la url por el navegador se devuelve el resultado correcto, pero al ejecutar la url directamente desde producción, devuelve
			// datos de otro lugar diferente
			$direccion_url = htmlentities(trim($direccion.", España"));
			$direccion_url = str_replace(' ', '%20', $direccion_url);
			$url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$direccion_url."&sensor=true";
			$data = file_get_contents($url);
			$jsondata = json_decode($data,true);
			$lat = $jsondata['results'][0]['geometry']['location']['lat'];
			$long = $jsondata['results'][0]['geometry']['location']['lng'];
			$ruta="http://maps.google.com/staticmap?center=".$lat.",".$long."&zoom=15&size=1024x800&key=".PATHINCLUDE_KEY_GOOGLE_MAPS;
			*/
			/*
			// Este fragmento, aunque idéntico al fichero /librerias/GoogleMaps/streetview.php, lanza una excepción
			// Street view
			require( PATHINCLUDE_FRAMEWORK_LIBRERIAS.'GoogleMaps/_system/config.php' );
			// Autoload stuff
			require( PATHINCLUDE_FRAMEWORK_LIBRERIAS.'GoogleMaps/_system/autoload.php' );
			$map3 = new \PHPGoogleMaps\Map( array( 'map_id' => 'map3', 'center' => 'Calle Pablo Ruiz Picasso, 4, Cádiz, Spain' ) );
			$map3->enableStreetView( array( 'position' => 'Calle Pablo Ruiz Picasso, 4, Cádiz, Spain' ) );
			*/
			$_SESSION['direccion_street_view_google_maps']=$direccion." , Spain";
		}
		// Inmueble
		$inmueble = new ModelInmuebles();		
		$recomendaciones=$inmueble->ObtenerRecomendacionesAmigos($_GET['id']);
		$num_recomendaciones = $recomendaciones->RecordCount(); 
		// Navegador web
		$navegador=ObtenerNavegador();
		// Opciones de interfaz
		if($row_consulta['estado']=="activo")
		{
			$class_campo="campo_texto";
			$readonly="";
		}
		else
		{
			$class_campo="campo_texto_blocked";
			$readonly='readonly="readonly"';
		}
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/editar.php');
	}
?>
<?php
	function estas_seguro()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/estas_seguro.php');
	}
?>
<?php
	function estas_seguro_bloquear()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/estas_seguro_bloquear.php');
	}
?>
<?php
	function borrar()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/borrar.php');
	}
?>
<?php
	function recomendaciones_amigo()
	{
		// Inmueble
		$inmueble = new ModelInmuebles();		
		$recomendaciones=$inmueble->ObtenerRecomendacionesAmigos($_GET['id']);
		$num_recomendaciones = $recomendaciones->RecordCount(); 
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/recomendaciones_amigo.php');
	}
?>
<?php
	function documentacion_generada()
	{
		// Inmueble
		$inmueble = new ModelInmuebles();		
		$doc_generada=$inmueble->ObtenerDocumentacionGenerada($_GET['id']);
		// Certificaciones energéticas
		$certificaciones_energeticas=$doc_generada['certificaciones_energeticas'];
		$num_certificaciones_energeticas = $certificaciones_energeticas->RecordCount();
		// Fichas de visita
		$fichas_visita=$doc_generada['fichas_visita'];
		$num_fichas_visita = $fichas_visita->RecordCount();
		// Fichas de encargo
		$fichas_encargo=$doc_generada['fichas_encargo'];
		$num_fichas_encargo = $fichas_encargo->RecordCount();
		// Contratos de arrendamiento y facturas
		$contratos_arrendamiento=$doc_generada['contratos_arrendamiento'];
		$num_contratos_arrendamiento = $contratos_arrendamiento->RecordCount();
		// Contratos de compra-venta y facturas
		$contratos_compra_venta=$doc_generada['contratos_compra_venta'];
		$num_contratos_compra_venta = $contratos_compra_venta->RecordCount();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'inmuebles/documentacion_generada.php');
	}
?>