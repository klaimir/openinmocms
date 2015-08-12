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
		// Obtencion de tipos
		$sql_tipos = "SELECT * FROM tipos_inmueble ORDER BY nombre_tipo ASC";
		$tipos = $DB->Execute($sql_tipos) or die($DB->ErrorMsg());
		$num_tipos =  $tipos->RecordCount();
		$tipo = $tipos->FetchRow();		
		// Comprar
		// echo $_SESSION['s_busq_inmuebles_comprar'];
		$todos_comprar = $DB->Execute($_SESSION['s_busq_inmuebles_comprar']) or die($DB->ErrorMsg());
		$todo_comprar = $todos_comprar->FetchRow();
		$num_todos_comprar = $todos_comprar->RecordCount();		
		// Alquilar
		// echo $_SESSION['s_busq_inmuebles_alquilar'];
		$todos_alquilar = $DB->Execute($_SESSION['s_busq_inmuebles_alquilar']) or die($DB->ErrorMsg());
		$todo_alquilar = $todos_alquilar->FetchRow();
		$num_todos_alquilar = $todos_alquilar->RecordCount();		
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
        $translator->load('buscador');
		// Campos
		$campos['certificacion']=$translator->lang("certificacion");
		$campos['region']=$translator->lang("region");
		$campos['poblacion']=$translator->lang("poblacion");
		$campos['provincia']=$translator->lang("provincia");
		$campos['seleccionar_valor']=$translator->lang("seleccionar_valor");
		$campos['zona']=$translator->lang("zona");
		$campos['palabras_clave']=$translator->lang("palabras_clave");
		$campos['precio_compra']=$translator->lang("precio_compra");
		$campos['precio_alquiler']=$translator->lang("precio_alquiler");
		$campos['precio']=$translator->lang("precio");
		$campos['tipologia']=$translator->lang("tipologia");
		$campos['informacion_adicional']=$translator->lang("informacion_adicional");
		$campos['observaciones']=$translator->lang("observaciones");
		$campos['mas_de']=$translator->lang("mas_de");
		$campos['menos_de']=$translator->lang("menos_de");
		$campos['habitaciones']=$translator->lang("habitaciones");
		$campos['banios']=$translator->lang("banios");
		// Otros
		$textos['buscar']=$translator->lang("buscar");
		$textos['ayuda']=$translator->lang("ayuda");
		$textos['limpiar_filtros']=$translator->lang("limpiar_filtros");
		$textos['frase_buscador']=$translator->lang("frase_buscador");
		$textos['informe_errores']=$translator->lang("informe_errores");
		$textos['errores_encontrados']=$translator->lang("errores_encontrados");
		$textos['listado_comprar']=$translator->lang("listado_comprar");
		$textos['listado_alquilar']=$translator->lang("listado_alquilar");
		$textos['no_busqueda']=$translator->lang("no_busqueda");
		$textos['cabecera_comprar']=$translator->lang("cabecera_comprar");
		$textos['cabecera_alquilar']=$translator->lang("cabecera_alquilar");
		$textos['servicios_inmobiliarios']=$translator->lang("servicios_inmobiliarios");
		$textos['titulo_seccion']=$translator->lang("titulo_seccion");
		// Criterios de ordenación
		$textos['criterios_ordenacion']=$translator->lang("criterios_ordenacion");
		$textos['metros']=$translator->lang("metros");
		$textos['metros_utiles']=$translator->lang("metros_utiles");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/index.php');
	}
?>
<?php
	function test()
	{	
        $textos['buscador']="buscador";
		$textos['titulo_seccion']="TEST";
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/test.php');
	}
    
    function ver_datos_adicionales()
	{
		// Conexión Base de datos
		$DB = new Model();		
		// Datos del inmueble
		$inmueble = $DB->GetRow("SELECT * FROM inmuebles WHERE id_inmueble = ".$_GET['id']) or die($DB->ErrorMsg());
		// Fotos del inmueble
		$todos = $DB->Execute("SELECT * FROM ficheros_inmuebles WHERE inmueble = ".$_GET['id']." AND tipo_fichero=2") or die($DB->ErrorMsg());
		$num_todos = $todos->RecordCount();
		// Enlaces del inmueble
		$enlaces = $DB->Execute("SELECT * FROM enlaces_inmueble WHERE inmueble = ".$_GET['id']) or die($DB->ErrorMsg());
		$enlace = $enlaces->FetchRow();
		$num_enlaces = $enlaces->RecordCount();
		// Recomendados del inmueble
		$recomendados = $DB->Execute("SELECT * FROM recomendaciones_inmueble WHERE inmueble = ".$_GET['id']) or die($DB->ErrorMsg());
		$recomendado = $recomendados->FetchRow();
		$num_recomendados = $recomendados->RecordCount();
		// Inclusión librería
		include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
		$pages = new Paginator('fotos');  
		$pages->items_total = $num_todos;  
		$pages->mid_range = 9;
		$pages->items_per_page = 1;
		$pages->url_actual = $_SESSION['rutaraiz']."app/buscador/ver_datos_adicionales.php?id=".$_GET['id'];
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
		$pages->url_actual = $_SESSION['rutaraiz']."app/buscador/ver_datos_adicionales.php?id=".$_GET['id'];
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
		$pages->url_actual = $_SESSION['rutaraiz']."app/buscador/ver_datos_adicionales.php?id=".$_GET['id'];
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
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Traducción de textos
		$inmueble['observaciones']=$translator->TraducirTexto($inmueble['observaciones']);
		$inmueble['tipo']=$translator->TraducirTexto(formatear_tipo($inmueble['tipo']));
		// Campos
		$campos['region']=$translator->TraducirTexto("Región");
		$campos['poblacion']=$translator->TraducirTexto("Municipio");
		$campos['provincia']=$translator->TraducirTexto("Provincia");
		$campos['zona']=$translator->TraducirTexto("Zona");
		$campos['tipologia']=$translator->TraducirTexto("Tipo");
		$campos['precio_compra']=$translator->TraducirTexto("Precio de compra");
		$campos['precio_alquiler']=$translator->TraducirTexto("Precio de alquiler");
		$campos['metros']=$translator->TraducirTexto("Metros");
		$campos['habitaciones']=$translator->TraducirTexto("Habitaciones");
		$campos['banios']=$translator->TraducirTexto("Baños");
		$campos['metros_utiles']=$translator->TraducirTexto("Metros útiles");
		$campos['observaciones']=$translator->TraducirTexto("Observaciones");
		// Otros
		$textos['frase_campos']=$translator->TraducirTexto("Estos son los datos asociados al inmueble seleccionado");
		$textos['informacion_general']=$translator->TraducirTexto("Información General");
		$textos['caracteristicas']=$translator->TraducirTexto("Características");
		$textos['ubicacion']=$translator->TraducirTexto("Ubicación");
		$textos['google_maps']=$translator->TraducirTexto("Zona en Google Maps");
		$textos['direccion_google_maps']=$translator->TraducirTexto("Zona del inmueble");
		$textos['direccion_street_view']=$translator->TraducirTexto("Ver dirección en Street View");
		$textos['fotografias_asociadas']=$translator->TraducirTexto("Fotos");
		$textos['solicitar_informacion']=$translator->TraducirTexto("Solicitar información");
		$textos['recomendar_amigo']=$translator->TraducirTexto("Recomendar amigo/a");
		$textos['no_fotografias_asociadas']=$translator->TraducirTexto("Actualmente no hay registrada ninguna fotografía asociada al inmueble.");		
		$textos['planos_asociados']=$translator->TraducirTexto("Planos");
		$textos['no_planos_asociados']=$translator->TraducirTexto("Actualmente no hay registrado ningún plano asociado al inmueble.");
		$textos['videos_asociados']=$translator->TraducirTexto("Videos");
		$textos['no_videos_asociados']=$translator->TraducirTexto("Actualmente no hay registrado ningún video asociado al inmueble.");		
		$textos['enlaces_asociados']=$translator->TraducirTexto("Enlaces de publicidad");		
		$textos['servicios_inmobiliarios']=$translator->TraducirTexto("Servicios Inmobiliarios");
		$textos['buscador']=$translator->TraducirTexto("Buscador de inmuebles");
		$textos['titulo_seccion']=$translator->TraducirTexto("Detalles");
		// Navegador web
		$navegador=ObtenerNavegador();
		// Google maps
		if($inmueble['direccion_aprox']!="")
		{
			// La dirección se compondrá de la composición del campo dirección + region + provincia + poblacion si es diferente a "Otros"
			$direccion=$inmueble['direccion_aprox'].", ".formatear_poblacion($inmueble['poblacion_inmueble']).", ".formatear_provincia($inmueble['provincia_inmueble']);
			// Se configura el mapa de Google
			require(PATHINCLUDE_FRAMEWORK."librerias/EasyGoogleMap.class.php");
			$gm = new EasyGoogleMap(PATHINCLUDE_KEY_GOOGLE_MAPS);
			$gm->SetMapZoom(15);
			$gm->SetMapWidth(800);
			$gm->SetMapHeight(400);
			$gm->SetAddress($direccion);
			$gm->SetInfoWindowText($textos['direccion_google_maps']);
			// Dirección de street view
			$_SESSION['direccion_street_view_google_maps']=$direccion." , Spain";
		}
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/ver_datos_adicionales.php');
	}
?>
<?php
	function solicitar_informacion()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Campos
		$campos['nombre']=$translator->TraducirTexto("Nombre");
		$campos['correo']=$translator->TraducirTexto("E-mail");
		$campos['mensaje']=$translator->TraducirTexto("Mensaje");
		$campos['captcha']=$translator->TraducirTexto("Introduzca el código");
		// Otros
		$textos['informe_errores']=$translator->TraducirTexto("Informe de errores");
		$textos['errores_encontrados']=$translator->TraducirTexto("errores encontrados");
		$textos['frase_campos']=$translator->TraducirTexto("Rellene el siguiente formulario para enviar la solicitud de información sobre el inmueble");
		$textos['enviar_solicitud']=$translator->TraducirTexto("Enviar solicitud");
		$textos['limpiar_todo']=$translator->TraducirTexto("Limpiar todo");
		$textos['servicios_inmobiliarios']=$translator->TraducirTexto("Servicios Inmobiliarios");
		$textos['buscador']=$translator->TraducirTexto("Buscador de inmuebles");
		$textos['detalles']=$translator->TraducirTexto("Detalles");
		$textos['titulo_seccion']=$translator->TraducirTexto("Solicitar información");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/solicitar_informacion.php');
	}
?>
<?php
	function recomendar_amigo()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Campos
		$campos['correo']=$translator->TraducirTexto("E-mail propio");
		$campos['correo_amigo']=$translator->TraducirTexto("E-mail amigo/a");
		$campos['mensaje']=$translator->TraducirTexto("Mensaje");
		$campos['captcha']=$translator->TraducirTexto("Introduzca el código");
		$campos['aceptar_documentos']=$translator->TraducirTexto("Acepto los siguientes documentos");
		$campos['condiciones_uso']=$translator->TraducirTexto("condiciones de uso");
		$campos['politica_privacidad']=$translator->TraducirTexto("política de privacidad");
		// Otros		
		$textos['informe_errores']=$translator->TraducirTexto("Informe de errores");
		$textos['errores_encontrados']=$translator->TraducirTexto("errores encontrados");
		$textos['frase_campos']=$translator->TraducirTexto("Rellene el siguiente formulario para enviar la recomendación a su amigo/a:");
		$textos['enviar_solicitud']=$translator->TraducirTexto("Enviar recomendación");
		$textos['limpiar_todo']=$translator->TraducirTexto("Limpiar todo");
		$textos['servicios_inmobiliarios']=$translator->TraducirTexto("Servicios Inmobiliarios");
		$textos['buscador']=$translator->TraducirTexto("Buscador de inmuebles");
		$textos['detalles']=$translator->TraducirTexto("Detalles");
		$textos['titulo_seccion']=$translator->TraducirTexto("Enviar recomendación a un amigo/a");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/recomendar_amigo.php');
	}
?>
<?php
	function politica_privacidad()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Otros
		$textos['titulo_seccion']=$translator->TraducirTexto("POLÍTICA DE PRIVACIDAD GENERAL");
		// Sección 1
		$textos['titulo_seccion_1']=$translator->TraducirTexto("1. Objeto");
		$textos['parrafo_1_seccion_1']=$translator->TraducirTexto('El presente documento tiene por objeto describir la política de protección de datos de '.NOMBRE_EMPRESA.', (en adelante '.NOMBRE_EMPRESA.'), domiciliada en el Avenida Ana de Viya, número 2, 11007 Cádiz (Cádiz).');
		$textos['parrafo_2_seccion_1']=$translator->TraducirTexto('Los datos de carácter personal que nos proporcione serán objeto de tratamiento automatizado e incorporados a los ficheros automatizados de '.NOMBRE_EMPRESA.', siendo esta Sociedad titular y responsable de sus propios ficheros, los cuales, conforme a la normativa vigente, se encuentran debidamente registrados en el Registro General de la Agencia de Protección de Datos.');
		$textos['parrafo_3_seccion_1']=$translator->TraducirTexto('En los formularios del Registro donde se recaben datos de carácter personal, se señalarán los distintos campos cuya cumplimentación es necesaria para realizar el registro correspondiente. Así, salvo que se indique lo contrario las respuestas a las preguntas sobre datos personales son voluntarias, sin que la falta de contestación a dichas preguntas implique una merma en la calidad o cantidad de los servicios correspondientes, a menos que se indique otra cosa.');
		$textos['parrafo_4_seccion_1']=$translator->TraducirTexto('El tratamiento automatizado a que serán sometidos todos los datos de carácter personal recogidos como consecuencia de la solicitud, utilización, contratación de cualquier producto o servicio o de cualquier transacción u operación realizada a través de esta página web (incluidos, a estos efectos, los que sean facilitados por los Usuarios para la publicación de anuncios), tiene como finalidad principal el mantenimiento de la relación contractual en su caso establecida con el propietario de esta página web.');
		$textos['parrafo_5_seccion_1']=$translator->TraducirTexto('Con la utilización del formulario de contacto y previa aceptación de la política de privacidad, el usuario consiente que los datos personales relativos a su nombre y apellidos, correo electrónico y, en su caso, numero de teléfono, sean comunicados al anunciante para posibilitar el contacto y con la finalidad de poder informarle sobre características, condiciones y cualquier otra información que sea de su interés relativa al inmueble seleccionado. Esta circunstancia queda debidamente advertida al usuario quien, en cualquier momento, podrá ejercer sus derechos de acceso, rectificación, cancelación u oposición, dirigiéndose a la entidad anunciante.');
		$textos['parrafo_6_seccion_1']=$translator->TraducirTexto('Además también serán objeto de cesión toda aquella otra información que el usuario desee incluir en el mensaje con la única finalidad de realizar el contacto necesario para una posible transacción inmobiliaria.');
		$textos['parrafo_7_seccion_1']=$translator->TraducirTexto('Se entiende, en este caso, por anunciante toda aquella persona física o jurídica que oferte inmuebles en nuestra website.');
		$textos['parrafo_8_seccion_1']=$translator->TraducirTexto('Ningún tercero ajeno a '.DOMINIO_URL_EMPRESA.' podrá acceder, sin consentimiento expreso del Usuario a ningún otro tipo de dato de carácter personal.   ');
		$textos['parrafo_9_seccion_1']=$translator->TraducirTexto('Asimismo, con la utilización del servicio “Ayuda de un profesional inmobiliario”, el usuario accede y consiente que sus datos sean facilitados al profesional/es de referencia para que pueda ponerse en contacto e iniciar así una posible relación profesional, en caso de que las circunstancias así lo permitan.');
		$textos['parrafo_10_seccion_1']=$translator->TraducirTexto('También serán utilizados para la gestión, administración, prestación, ampliación y mejora de los servicios a los que el Usuario decida suscribirse o utilizar, por ejemplo: ');
		$textos['parrafo_11_seccion_1']=$translator->TraducirTexto('En el caso de que se haya suscrito a la recepción de boletines informativos, sus datos sólo serán utilizados para gestionar el envío de este boletín.');
		$textos['parrafo_12_seccion_1']=$translator->TraducirTexto('En el caso del envío de publicidad, sus datos sólo serán utilizados para gestionar el envío de publicidad a través de medios tradicionales y electrónicos, además de telefonía móvil. En este sentido se le informa que podremos enviarle publicidad tanto propia como de terceras empresas, relativa a los productos y servicios que haya utilizado a través de nuestra página web, y en todo caso sobre los sectores Financiero, Editorial, Educación, Automoción, Telecomunicaciones, Informática, Tecnología, Hogar, Belleza, Inmobiliario, Venta a distancia, Gran consumo, Alimentación, Coleccionismo, Música, Pasatiempos, Ocio, Viajes, Seguros, Energía y Agua, ONG y formación entre otros.');
		$textos['parrafo_13_seccion_1']=$translator->TraducirTexto('En el caso de las direcciones de correo electrónico o formulario de contacto de la página web, los datos que nos proporcione a través de los mismos, serán utilizados exclusivamente para atender las consultas que nos plantee por este medio.');
		$textos['parrafo_14_seccion_1']=$translator->TraducirTexto('En el caso de que nos facilite datos de un tercero, por ejemplo para informar a un conocido de la publicación de un anuncio, o para recomendarle nuestra web o un artículo publicada en la misma, se le informa que usted es responsable de haber obtenido el consentimiento de la persona y de los datos de la misma que nos facilite.');
		$textos['parrafo_15_seccion_1']=$translator->TraducirTexto('Se le informa además que sus datos personales de contacto podrán ser cedidos a alguna de las sociedades de '.NOMBRE_EMPRESA.' domiciliadas en España, al efecto de aumentar la difusión de sus anunciantes, y de que las publicaciones y páginas web propiedad de cualquiera de las sociedades de '.NOMBRE_EMPRESA.' puedan incluir los anuncios facilitados por el Usuario.');
		$textos['parrafo_16_seccion_1']=$translator->TraducirTexto('Las funciones de '.NOMBRE_EMPRESA.' y las sociedades de '.NOMBRE_EMPRESA.' son el desarrollo de actividades y prestación de servicios en el área de publicación y distribución de anuncios clasificados y servicios conexos en cualquier tipo de medios, incluyendo impresos, electrónicos o mediante internet.');
		$textos['parrafo_17_seccion_1']=$translator->TraducirTexto('En ciertos casos, además, se proponen ceder más datos personales a terceros. Cuando proceda, esta circunstancia será debidamente advertida a los Usuarios en los formularios de recogida de datos personales, junto con la identificación de la sociedad que los ceda y dicho tercero, el tipo de actividades a las que se dedica y la finalidad a que responde la cesión. El Usuario podrá oponerse en todo momento a cualquiera o todas las cesiones precitadas.');
		$textos['parrafo_18_seccion_1']=$translator->TraducirTexto('El Usuario titular de los datos personales podrá ejercer, en los términos y las limitaciones establecidos la normativa vigente, los derechos de acceso, rectificación, cancelación y oposición a través de las siguientes vías:');
		$textos['parrafo_19_seccion_1']=$translator->TraducirTexto('Mediante correo postal a la dirección señalada en el encabezamiento de la presente Política de Protección de Datos de Carácter Personal, indicando en el sobre "BAJA REGISTRO INTERNET".');
		$textos['parrafo_20_seccion_1']=$translator->TraducirTexto('En la carta deberá indicar:');
		$textos['parrafo_21_seccion_1']=$translator->TraducirTexto('La dirección de correo electrónico con la cual figura su alta en nuestra base de datos.');
		$textos['parrafo_22_seccion_1']=$translator->TraducirTexto('La contraseña que utiliza para acceder a nuestros servicios online.');
		$textos['parrafo_23_seccion_1']=$translator->TraducirTexto('Fotocopia de DNI. (No necesario para el Derecho de oposición)');
		$textos['parrafo_24_seccion_1']=$translator->TraducirTexto('Dirección postal.');
		$textos['parrafo_25_seccion_1']=$translator->TraducirTexto('Teléfono de contacto.');
		$textos['parrafo_26_seccion_1']=$translator->TraducirTexto('Mediante el formulario online correspondiente que el usuario encontrará en todos los portales, correos electrónicos y comunicaciones de '.NOMBRE_EMPRESA.'.');
		$textos['parrafo_27_seccion_1']=$translator->TraducirTexto(NOMBRE_EMPRESA.' garantiza la confidencialidad de los datos de carácter personal. Ello no obstante, revelará a las autoridades públicas competentes los datos personales y cualquier otra información que esté en su poder o sea accesible a través de sus sistemas y sea requerida de conformidad con las disposiciones legales y reglamentarias aplicables al caso. Los datos de carácter personal podrán ser conservados en los ficheros titularidad de '.NOMBRE_EMPRESA.' incluso una vez finalizadas las relaciones formalizadas a través del Portal, exclusivamente a los fines indicados anteriormente y, en todo caso, durante los plazos legalmente establecidos, a disposición de autoridades administrativas o judiciales. En cualquier caso le informamos que, en caso de que se vaya a realizar la cesión a terceros de sus datos personales, le será comunicada previamente especificando la identidad de los cesionarios y la finalidad con que se van a tratar los datos que se ceden.');
		// Sección 1
		$textos['titulo_seccion_2']=$translator->TraducirTexto("2. Envío de información publicitaria a tu correo electrónico.");
		$textos['parrafo_1_seccion_2']=$translator->TraducirTexto('La aceptación de las condiciones de uso y política de privacidad , ligada al uso de cualquiera de los servicios de '.NOMBRE_EMPRESA.', implica tu autorización expresa en favor de '.NOMBRE_EMPRESA.' para el envío de información comercial a tu domicilio, teléfono móvil y dirección de correo electrónico. Dicha autorización comprende el envío de publicidad comercial y publicitaria relacionada con las actividades, productos y servicios de '.NOMBRE_EMPRESA.' y portales relacionados con esta Web, así como de terceros y sus portales. Si deseas revocar dicha autorización, podrás hacerlo de forma fácil y gratuita dirigiendo tu petición al formulario electrónico que para tal efecto se indica en el Web o bien, mediante correo postal a la dirección señalada en el encabezamiento.');
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/politica_privacidad.php');
	}
?>
<?php
	function condiciones_uso()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Otros
		$textos['titulo_seccion']=$translator->TraducirTexto("Condiciones Generales de Uso del Portal");
		// Sección 1
		$textos['titulo_seccion_1']=$translator->TraducirTexto("1. Objeto");
		$textos['parrafo_1_seccion_1']=$translator->TraducirTexto('El presente documento tiene por objeto establecer las Condiciones Generales de Uso del Portal de Internet " '.DOMINIO_URL_EMPRESA.'" y todos los demás portales titularidad de '.NOMBRE_EMPRESA.' (en adelante '.NOMBRE_EMPRESA.'), con domicilio Social en la Avenida Ana de Viya, número 2, Cádiz, España, y e-mail gesticadiz@gmail.com.');
		$textos['parrafo_2_seccion_1']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' se reserva el derecho a modificar las presentes Condiciones Generales de Uso con el objeto de adecuarlas a la legislación vigente aplicable en cada momento.');
		$textos['parrafo_3_seccion_1']=$translator->TraducirTexto('Las presentes Condiciones Generales de Uso no excluyen la posibilidad de que determinados Servicios del Portal, por sus características particulares, sean sometidos, además de a las Condiciones Generales de Uso, a sus propias condiciones particulares de uso (en adelante las Condiciones Particulares).');
		$textos['parrafo_4_seccion_1']=$translator->TraducirTexto('La utilización por parte del Usuario de cualquiera de los Servicios del Portal supone su adhesión y aceptación expresa a todas las Condiciones Generales de Uso en la versión publicada en el presente portal en el momento en que el usuario acceda al Portal, así como a las Condiciones Particulares que, en su caso, sean de aplicación.');
		// Sección 2
		$textos['titulo_seccion_2']=$translator->TraducirTexto("2. Condiciones de acceso y utilización del portal");
		$textos['titulo_seccion_2_1']=$translator->TraducirTexto("2.1. Condición de Usuario");
		$textos['parrafo_1_seccion_2_1']=$translator->TraducirTexto('La utilización de cualquier Servicio del Portal atribuye la Condición de Usuario del mismo.');
		$textos['titulo_seccion_2_2']=$translator->TraducirTexto("2.2. ".NOMBRE_EMPRESA." se reserva el derecho a difundir, total o parcialmente, los Anuncios del Anunciante en terceros portales, en campañas publicitarias para promocionar el portal, así como en otros sitios web, tales como redes sociales o blogs, aceptando el Anunciante dicha condición.");
		$textos['titulo_seccion_2_3']=$translator->TraducirTexto("2.3. Necesidad de Registro");
		$textos['parrafo_1_seccion_2_3']=$translator->TraducirTexto('Con carácter general para el acceso a los Servicios del Portal no será necesario el registro del Usuario del Portal. No obstante la utilización de determinados Servicios podrá estar condicionada al registro previo del Usuario. Este registro se efectuará en la forma expresamente señalada en el propio Servicio o en las Condiciones Particulares que le sean de aplicación.');
		$textos['titulo_seccion_2_4']=$translator->TraducirTexto("2.4. Gratuidad de los Servicios");
		$textos['parrafo_1_seccion_2_4']=$translator->TraducirTexto('Con carácter general los Servicios ofertados a través del Portal tendrán carácter gratuito. No obstante, la utilización de determinados Servicios del Portal puede, o podrá estar en el futuro, sujeta a contraprestación económica en la forma y términos que se determine en las correspondientes Condiciones Particulares del Servicio.');
		$textos['titulo_seccion_2_5']=$translator->TraducirTexto("2.5. Uso del Portal y sus Servicios");
		$textos['parrafo_1_seccion_2_5']=$translator->TraducirTexto('El Usuario reconoce y acepta que el uso de los contenidos y/o servicios ofrecidos por el Portal será bajo su exclusivo riesgo y/o responsabilidad. El Usuario se compromete a utilizar el Portal y todo su contenido y Servicios de conformidad con la ley, la moral, el orden público y las presentes Condiciones Generales de Uso, y las Condiciones Particulares que, en su caso, le sean de aplicación. Asimismo, se compromete hacer un uso adecuado de los servicios y/o contenidos del Portal y a no emplearlos para realizar actividades ilícitas o constitutivas de delito, que atenten contra los derechos de terceros y/o que infrinjan la regulación sobre propiedad intelectual e industrial, o cualesquiera otras normas del ordenamiento jurídico aplicable. El usuario conoce y acepta que el portal enviará una respuesta automática por cada uno de los anuncios en los que esté interesado y se ponga debidamente en contacto. En particular, el Usuario se compromete a no trasmitir, introducir, difundir y poner a disposición de terceros, cualquier tipo de material e información (datos contenidos, mensajes, dibujos, archivos de sonido e imagen, fotografías, software, etc.) que sean contrarios a la ley, la moral, el orden público y las presentes Condiciones Generales de Uso y, en su caso, a las Condiciones Particulares que le sean de aplicación. A título enunciativo, y en ningún caso limitativo o excluyente, el Usuario se compromete a:');
		$textos['parrafo_2_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir contenidos o propaganda de carácter racista, xenófobo, pornográfico, de apología del terrorismo o que atenten contra los derechos humanos.');
		$textos['parrafo_3_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir en la red programas de datos (virus y software nocivo) susceptibles de provocar daños en los sistemas informáticos del proveedor de acceso, sus proveedores o terceros usuarios de la red Internet.');
		$textos['parrafo_4_seccion_2_5']=$translator->TraducirTexto('No difundir, transmitir o poner a disposición de terceros cualquier tipo de información, elemento o contenido que atente contra los derechos fundamentales y las libertades públicas reconocidos constitucionalmente y en los tratados internacionales.');
		$textos['parrafo_5_seccion_2_5']=$translator->TraducirTexto('No difundir, transmitir o poner a disposición de terceros cualquier tipo de información, elemento o contenido que constituya publicidad ilícita o desleal.');
		$textos['parrafo_6_seccion_2_5']=$translator->TraducirTexto('No transmitir publicidad no solicitada o autorizada, material publicitario, "correo basura", "cartas en cadena", "estructuras piramidales", o cualquier otra forma de solicitación, excepto en aquellas áreas (tales como espacios comerciales) que hayan sido exclusivamente concebidas para ello.');
		$textos['parrafo_7_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir cualquier información y contenidos falsos, ambiguos o inexactos de forma que induzca a error a los receptores de la información.');
		$textos['parrafo_8_seccion_2_5']=$translator->TraducirTexto('No suplantar a otros usuarios utilizando sus claves de registro a los distintos servicios y/o contenidos de los Portales.');
		$textos['parrafo_9_seccion_2_5']=$translator->TraducirTexto('No difundir, transmitir o poner a disposición de terceros cualquier tipo de información, elemento o contenido que suponga una violación de los derechos de propiedad intelectual e industrial, patentes, marcas o copyright que correspondan a los titulares de los Portales o a terceros.');
		$textos['parrafo_10_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir contenidos o propaganda de carácter racista, xenófobo, pornográfico, de apología del terrorismo o que atenten contra los derechos humanos.');
		// Sección 3
		$textos['titulo_seccion_3']=$translator->TraducirTexto("3. Propiedad intelectual e industrial");
		$textos['parrafo_1_seccion_3']=$translator->TraducirTexto('El usuario reconoce que todos los elementos del Portal y de cada uno de los Servicios prestados a través del mismo, la información y materiales contenidos en el mismo, la estructura, selección, ordenación y presentación de sus contenidos y los programas de ordenador utilizados en relación con el mismo están protegidos por derechos de propiedad intelectual e industrial de '.NOMBRE_EMPRESA.' o de terceros.');
		$textos['parrafo_2_seccion_3']=$translator->TraducirTexto('Salvo que fuera autorizado por '.NOMBRE_EMPRESA.' o, en su caso, por los terceros titulares de los derechos correspondientes, o a menos que ello resulte legalmente permitido, el usuario no podrá reproducir, transformar, modificar, desensamblar, realizar ingeniería inversa, distribuir, alquilar, prestar, poner a disposición o permitir el acceso al público a través de cualquier modalidad de comunicación pública de ninguno de los elementos referidos en el párrafo anterior.');
		$textos['parrafo_3_seccion_3']=$translator->TraducirTexto('En particular, queda terminantemente prohibido la utilización de los textos, imágenes, anuncios y cualesquiera otro elemento incluido en el presente sitio web para su posterior inclusión, total o parcial, en otros sitios web ajenos a '.NOMBRE_EMPRESA.' sin contar con la autorización previa y por escrito de '.NOMBRE_EMPRESA.'.');
		$textos['parrafo_4_seccion_3']=$translator->TraducirTexto('El Usuario deberá utilizar los materiales, elementos e información a la que acceda a través de la utilización del Portal y de cada uno de los correspondientes Servicios únicamente para sus propias necesidades, obligándose a no realizar ni directa ni indirectamente una explotación comercial ni de los servicios ni de los materiales, elementos e información obtenidos a través de los mismos.');
		$textos['parrafo_5_seccion_3']=$translator->TraducirTexto('El Usuario deberá abstenerse de suprimir los signos identificativos de los derechos (de propiedad intelectual, industrial o cualquier otro) de '.NOMBRE_EMPRESA.' o de los terceros que figuren en el Portal y en cada uno de los diversos Servicios ofrecidos a través de él. Asimismo, el Usuario deberá abstenerse de eludir o manipular cualesquiera dispositivos técnicos establecidos por '.NOMBRE_EMPRESA.' o por terceros, ya sea en el Portal, en cualquiera de los Servicios o en cualquiera de los materiales, elementos o información obtenidos a través del mismo, para la protección de sus derechos.');
		$textos['parrafo_6_seccion_3']=$translator->TraducirTexto('El usuario autoriza a reproducir, distribuir y comunicar públicamente las fotografías que inserte en su anuncio para los fines descritos en el apartado 2.2. del presente Aviso Legal, así como a añadir las marcas de agua de '.NOMBRE_EMPRESA.' con el fin de evitar un aprovechamiento inconsentido por parte de terceros.');
		// Sección 4
		$textos['titulo_seccion_4']=$translator->TraducirTexto("4. Exclusión de garantías. Responsabilidad");
		$textos['titulo_seccion_4_1']=$translator->TraducirTexto("4.1. Disponibilidad y Continuidad del Portal y los Servicios ".NOMBRE_EMPRESA." no garantiza la disponibilidad, acceso y continuidad del funcionamiento del Portal y de sus Servicios.");		
		$textos['parrafo_1_seccion_4_1']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no será responsable, con los límites establecidos en el Ordenamiento Jurídico vigente, de los daños y perjuicios causados al Usuario como consecuencia de la indisponibilidad, fallos de acceso y falta de continuidad del Portal y sus Servicios.');
		$textos['titulo_seccion_4_2']=$translator->TraducirTexto("4.2. Contenidos y Servicios de ".NOMBRE_EMPRESA);		
		$textos['parrafo_1_seccion_4_2']=$translator->TraducirTexto(NOMBRE_EMPRESA.' responderá única y exclusivamente de los Servicios que preste por sí misma y de los contenidos directamente originados por '.NOMBRE_EMPRESA.' e identificados con su copyright. Dicha responsabilidad quedará excluida en los casos en que concurran causas de fuerza mayor o en los supuestos en que la configuración de los equipos del Usuario no sea la adecuada para permitir el correcto uso de los servicios de Internet prestados por '.NOMBRE_EMPRESA.'. En cualquier caso, la eventual responsabilidad de '.NOMBRE_EMPRESA.' frente al usuario por todos los conceptos quedará limitada como máximo al importe de las cantidades percibidas directamente del usuario por '.NOMBRE_EMPRESA.', con exclusión en todo caso de responsabilidad por daños indirectos o por lucro cesante.');
		$textos['titulo_seccion_4_3']=$translator->TraducirTexto("4.3. Contenidos y Servicios de Terceros");	
		$textos['parrafo_1_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no controla previamente, aprueba ni hace propios los contenidos, servicios, opiniones, comunicaciones datos, archivos, productos y cualquier clase de información de terceros, personas jurídicas o físicas, recogidos en el Portal. De igual forma, no garantiza la licitud, fiabilidad, utilidad, veracidad, exactitud, exhaustividad y actualidad de los contenidos, informaciones y Servicios de terceros en el Portal.');
		$textos['parrafo_2_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no controla con carácter previo y no garantiza la ausencia de virus y otros elementos en los Contenidos y servicios prestados por terceros a través del Portal que puedan introducir alteraciones en el sistema informático, documentos electrónicos o ficheros de los usuarios.');
		$textos['parrafo_3_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no será responsable, ni indirectamente ni subsidiariamente, de los daños y perjuicios de cualquier naturaleza derivados de la utilización y contratación de los Contenidos y de los Servicios de terceros en el Portal así como de la falta de licitud, fiabilidad, utilidad, veracidad, exactitud, exhaustividad y actualidad de los mismos. Con carácter enunciativo, y en ningún caso limitativo, no será responsable por los daños y perjuicios de cualquier naturaleza derivados de:');
		$textos['parrafo_4_seccion_4_3']=$translator->TraducirTexto('a) La infracción de los derechos propiedad intelectual e industrial y el cumplimiento defectuoso o incumplimiento de los compromisos contractuales adquiridos por terceros.');
		$textos['parrafo_5_seccion_4_3']=$translator->TraducirTexto('b) La realización de actos de competencia desleal y publicidad ilícita.');
		$textos['parrafo_6_seccion_4_3']=$translator->TraducirTexto('c) La inadecuación y defraudación de las expectativas de los Servicios y Contenidos de los terceros.');
		$textos['parrafo_7_seccion_4_3']=$translator->TraducirTexto('d) Los vicios y defectos de toda clase de los Servicios y contenidos de terceros prestados a través del Portal.');
		$textos['parrafo_8_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no será responsable, ni indirectamente ni subsidiariamente, de los daños y perjuicios de cualquier naturaleza causados al Usuario como consecuencia de la presencia de virus u otros elementos en los contenidos y Servicios prestados por terceros que puedan producir alteraciones en el sistema informático, documentos electrónicos o ficheros de los usuarios.');
		$textos['parrafo_9_seccion_4_3']=$translator->TraducirTexto('La exoneración de responsabilidad señalada en los párrafos anteriores será de aplicación en el caso de que '.NOMBRE_EMPRESA.' no tenga conocimiento efectivo de que la actividad o la información almacenada es ilícita o de que lesiona bienes o derechos de un tercero susceptibles de indemnización, o si la tuviesen actúen con diligencia para retirar los datos y contenidos o hacer imposible el acceso a ellos.');		
		$textos['titulo_seccion_4_4']=$translator->TraducirTexto("4.4. Conducta de los Usuarios");	
		$textos['parrafo_1_seccion_4_4']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' no garantiza que los Usuarios del Portal utilicen los contenidos y/o servicios del mismo de conformidad con la ley, la moral, el orden público, ni las presentes Condiciones Generales y, en su caso, las condiciones Particulares que resulten de aplicación Asimismo, no garantiza la veracidad y exactitud, exhaustividad y/o autenticidad de los datos proporcionados por los Usuarios.');
		$textos['parrafo_2_seccion_4_4']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' no será responsable, indirecta ni subsidiariamente, de los daños y perjuicios de cualquier naturaleza derivados de la utilización de los Servicios y Contenidos de los Portales por parte de los Usuarios o que puedan derivarse de la falta de veracidad, exactitud y/o autenticidad de los datos o informaciones proporcionadas por los Usuarios, o de la suplantación de la identidad de un tercero efectuada por un Usuario en cualquier clase de actuación a través del Portal. A título enunciativo, pero no limitativo, '.NOMBRE_EMPRESA.' no será responsable indirecta o subsidiariamente de:');
		$textos['parrafo_3_seccion_4_4']=$translator->TraducirTexto('a) Los contenidos, informaciones, opiniones y manifestaciones de cualquier Usuario o de terceras personas o entidades que se comuniquen o exhiban a través del Portal.');
		$textos['parrafo_4_seccion_4_4']=$translator->TraducirTexto('b) Los daños y perjuicios causados a terceros derivados de la utilización por parte del Usuario de los servicios y contenidos del Portal.');
		$textos['parrafo_5_seccion_4_4']=$translator->TraducirTexto('c) Los daños y perjuicios causados por la falta de veracidad, exactitud o incorrección de la identidad de los usuarios y de toda información que éstos proporcionen o hagan accesible a otros usuarios.');
		$textos['parrafo_6_seccion_4_4']=$translator->TraducirTexto('d) Los daños y perjuicios derivados de infracciones de cualquier usuario que afecten a los derechos de otro usuario, o de terceros, incluyendo los derechos de copyright, marca, patentes, información confidencial y cualquier otro derecho de propiedad intelectual e industrial.');
		// Sección 5
		$textos['titulo_seccion_5']=$translator->TraducirTexto("5. Contratación con terceros a través del portal");		
		$textos['parrafo_1_seccion_5']=$translator->TraducirTexto('El Usuario reconoce y acepta que cualquier relación contractual o extracontractual que, en su caso, formalice con los anunciantes o terceras personas contactadas a través del Portal, así como su participación en concursos, promociones, compraventa de bienes o servicios, se entienden realizados única y exclusivamente entre el Usuario y el anunciante y/o tercera persona. En consecuencia, el Usuario acepta que '.NOMBRE_EMPRESA.' no tiene ningún tipo de responsabilidad sobre los daños o perjuicios de cualquier naturaleza ocasionados con motivo de sus negociaciones, conversaciones y/o relaciones contractuales o extracontractuales con los anunciantes o terceras personas físicas o jurídicas contactadas a través del Portal.');
		// Sección 6
		$textos['titulo_seccion_6']=$translator->TraducirTexto("6. Dispositivos técnicos de enlace");
		$textos['parrafo_1_seccion_6']=$translator->TraducirTexto('El Portal pone a disposición de los Usuarios dispositivos técnicos de enlace y herramientas de búsqueda que permiten a los Usuarios el acceso a portales titularidad de terceros (enlaces). El Usuario reconoce y acepta que la utilización de los Servicios y contenidos de los portales enlazados será bajo su exclusivo riesgo y responsabilidad y exonera a '.NOMBRE_EMPRESA.' de cualquier responsabilidad sobre disponibilidad técnica de los portales enlazados, la calidad, fiabilidad exactitud y/o veracidad de los servicios, informaciones, elementos y/o contenidos a los que el Usuario pueda acceder en las mismas y en los directorios de búsqueda incluidos en el Portal.');
		$textos['parrafo_2_seccion_6']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' no será responsable indirecta ni subsidiariamente de los daños y perjuicios de cualquier naturaleza derivados de:');
		$textos['parrafo_3_seccion_6']=$translator->TraducirTexto('a) El funcionamiento, indisponibilidad, inaccesibilidad y la ausencia de continuidad de los portales enlazados y/o los directorios de búsqueda disponibles.');
		$textos['parrafo_4_seccion_6']=$translator->TraducirTexto('b) La falta de mantenimiento y actualización de los contenidos y servicios contenidos en los portales enlazados.');
		$textos['parrafo_5_seccion_6']=$translator->TraducirTexto('c) La falta de calidad, inexactitud, ilicitud, inutilidad de los contenidos y servicios de los portales enlazados.');
		$textos['parrafo_6_seccion_6']=$translator->TraducirTexto('La exoneración de responsabilidad señalada en los párrafos anteriores será de aplicación en el caso de que '.NOMBRE_EMPRESA.' no tenga conocimiento efectivo de que la actividad o la información a la que remite es lícita o de que lesiona bienes o derechos de un tercero susceptibles de indemnización o, si la tuviese, actúe con diligencia para retirar los datos y contenidos o hacer imposible el acceso a ellos.');
		// Sección 7
		$textos['titulo_seccion_7']=$translator->TraducirTexto("7. Protección de datos de carácter personal");
		$textos['parrafo_1_seccion_7']=$translator->TraducirTexto('Antes de completar el Registro de Usuarios deberá leer la siguiente información sobre Protección de Datos y Ley de Servicios de la Sociedad de la Información.');
		// Sección 8
		$textos['titulo_seccion_8']=$translator->TraducirTexto("8. Dispositivos técnicos de enlace");
		$textos['parrafo_1_seccion_8']=$translator->TraducirTexto('Para asegurar el correcto funcionamiento de este foro, '.DOMINIO_URL_EMPRESA.' ha establecido unas normas de publicación y uso que tienen como objetivo mantener el buen tono dentro de la comunidad y, al mismo tiempo, promover las aportaciones de los usuarios para dar valor añadido a los temas.');
		$textos['parrafo_2_seccion_8']=$translator->TraducirTexto('Recomendaciones de uso y escritura:');
		$textos['parrafo_3_seccion_8']=$translator->TraducirTexto('1) A la hora de insertar nuevo contenido en el foro, procura no perjudicar el aspecto general del sitio, utilizando las herramientas del gestor de contenidos de forma adecuada.');
		$textos['parrafo_4_seccion_8']=$translator->TraducirTexto('2) Cuida la ortografía y las normas de escritura.');
		$textos['parrafo_5_seccion_8']=$translator->TraducirTexto('3) No escribas con letras mayúscula, pues en el contexto de los foros se considera que es una forma de gritar.');
		$textos['parrafo_6_seccion_8']=$translator->TraducirTexto('4) Exprésate siempre con educación. Evita expresiones y opiniones que puedan resultar ofensivas para los demás usuarios.');
		$textos['parrafo_7_seccion_8']=$translator->TraducirTexto('5) Intenta ser paciente con la gente nueva, pues no conocen el funcionamiento de los foros ni a las personas que participan asiduamente en ellos.');
		$textos['parrafo_8_seccion_8']=$translator->TraducirTexto('6) Utiliza la mensajería privada en caso de que tengas problemas personales con otros usuarios y no hagas públicos los mensajes que recibas a través del sistema privado.');
		$textos['parrafo_9_seccion_8']=$translator->TraducirTexto('7) No utilices más de una cuenta de usuario.');
		$textos['parrafo_10_seccion_8']=$translator->TraducirTexto('8) No publiques datos personales de terceras personas.');
		$textos['parrafo_11_seccion_8']=$translator->TraducirTexto('Los mensajes que se insertes serán publicados de forma inmediata, aunque posteriormente pasarán un proceso de revisión por parte de '.DOMINIO_URL_EMPRESA.'.');
		$textos['parrafo_12_seccion_8']=$translator->TraducirTexto('Tras el proceso de revisión, los mensajes que incumplan las siguientes normas de publicación podrán ser modificados parcialmente o eliminados de forma íntegra:');
		$textos['parrafo_13_seccion_8']=$translator->TraducirTexto('1) Mensajes que incluyan insultos, descalificaciones, lenguaje soez o discriminaciones de cualquier índole.');
		$textos['parrafo_14_seccion_8']=$translator->TraducirTexto('2) Mensajes que utilicen este espacio para hacer publicidad de sus productos o servicios, así como aquellos que incluyan propuestas comerciales o comentarios promocionales.');
		$textos['parrafo_15_seccion_8']=$translator->TraducirTexto('3) Mensajes que no estén relacionados con la temática propia del foro en el cual se ha insertado.');
		$textos['parrafo_16_seccion_8']=$translator->TraducirTexto('4) Mensajes que aborden temas relacionados con la religión o la política.');
		$textos['parrafo_17_seccion_8']=$translator->TraducirTexto('5) Mensajes que incluyan anuncios de venta o alquiler de inmuebles. Existen espacios específicos para este propósito dentro de '.DOMINIO_URL_EMPRESA);
		$textos['parrafo_18_seccion_8']=$translator->TraducirTexto('6) Mensajes repetidos en más de una temática. Sólo se validará el primer mensaje insertado en el foro con el cual esté relacionado.');
		$textos['parrafo_19_seccion_8']=$translator->TraducirTexto('Además, recordamos a los usuarios que:');
		$textos['parrafo_20_seccion_8']=$translator->TraducirTexto('1) Los mensajes publicados expresan la opinión de los usuarios y no de '.DOMINIO_URL_EMPRESA.'.');
		$textos['parrafo_21_seccion_8']=$translator->TraducirTexto('2) '.DOMINIO_URL_EMPRESA.' se reserva el derecho de bloquear el acceso a los usuarios (mediante sus direcciones IP) que incumplan de manera reiterada la política de publicación de este foro.');
		$textos['parrafo_22_seccion_8']=$translator->TraducirTexto('3) Los administradores y moderadores del foro están autorizados para quitar, editar, mover o cerrar cualquier tema en cualquier momento que crean conveniente.');
		$textos['parrafo_23_seccion_8']=$translator->TraducirTexto('4) Como usuario debes saber que cualquier información que suministres será guardada en una base de datos.');
		$textos['parrafo_24_seccion_8']=$translator->TraducirTexto('5) Para participar en este foro utiliza los datos de usuario de '.DOMINIO_URL_EMPRESA.'. Asimismo, si creas un nuevo usuario en este foro lo podrás utilizar para entrar en el área de gestión de '.DOMINIO_URL_EMPRESA);
		// Sección 9
		$textos['titulo_seccion_9']=$translator->TraducirTexto("9. Resolución");
		$textos['parrafo_1_seccion_9']=$translator->TraducirTexto('Sin perjuicio de la responsabilidad por daños y perjuicios que se pudiera derivar, podrá, con carácter inmediato y sin necesidad de preaviso, resolver y dar por terminada su relación con el usuario, interrumpiendo su acceso al Portal o a sus correspondientes Servicios, si detecta un uso de los mismos o de cualquiera de los Servicios vinculados a los mismos contrario a las condiciones generales o particulares que sean de aplicación. El Usuario responderá de los daños y perjuicios de toda naturaleza que '.NOMBRE_EMPRESA.' o cualquiera de sus filiales pueda sufrir directa o indirectamente, como consecuencia del incumplimiento de cualquiera de las obligaciones derivadas de las condiciones generales o particulares en relación con la utilización del Portal o de cualquiera de los Servicios vinculados al mismo. Igualmente, el usuario mantendrá a '.NOMBRE_EMPRESA.' y a sus filiales indemnes frente a cualquier sanción, reclamación o demanda que pudiera interponerse por un tercero, incluidos cualesquiera organismos públicos, contra '.NOMBRE_EMPRESA.', sus empleados o agentes como consecuencia de la violación de cualesquiera derechos de terceros por parte de dicho Usuario mediante la utilización del Portal o de los servicios vinculados al mismo en una forma contraria a lo previsto en las condiciones generales o particulares que fueran de aplicación.');
		// Sección 10
		$textos['titulo_seccion_10']=$translator->TraducirTexto("10. Varios");
		$textos['titulo_seccion_10_1']=$translator->TraducirTexto("10.1. Modificaciones");		
		$textos['parrafo_1_seccion_10_1']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' se reserva el derecho a efectuar las modificaciones que estime oportunas, pudiendo modificar, suprimir e incluir nuevos contenidos y/o servicios, así como la forma en que éstos aparezcan presentados y localizados.');
		$textos['titulo_seccion_10_2']=$translator->TraducirTexto("10.2. Menores de Edad");		
		$textos['parrafo_1_seccion_10_2']=$translator->TraducirTexto('Con carácter general, para hacer uso de los Servicios del Portal los menores de edad deben haber obtenido previamente la autorización de sus padres, tutores o representantes legales, quienes serán responsables de todos los actos realizados a través del Portal por los menores a su cargo. En aquellos Servicios en los que expresamente se señale, el acceso quedará restringido única y exclusivamente a mayores de 18 años.');
		$textos['titulo_seccion_10_3']=$translator->TraducirTexto("10.3. Condiciones de uso de Facebook Connect en ".DOMINIO_URL_EMPRESA);		
		$textos['parrafo_1_seccion_10_3']=$translator->TraducirTexto('Facebook Connect es un servicio de facebook a través del cual un usuario puede llevarse consigo a otros portales su red social. Permite que un usuario visite un portal, en este caso '.DOMINIO_URL_EMPRESA.', llevando a sus amigos de facebook “en una mochila”. Al identificarse a través de “Conecta con facebook”, el usuario puede seleccionar compartir su actividad con el resto de sus amigos de facebook que también utilizan la presente aplicación de '.DOMINIO_URL_EMPRESA.'. Dicha actividad puede ser consultada en la dirección www.'.DOMINIO_URL_EMPRESA.'. La actividad en '.DOMINIO_URL_EMPRESA.' que un usuario que conecta con facebook puede seleccionar compartir con el resto de sus amigos que también han conectado con facebook en '.DOMINIO_URL_EMPRESA.', es:');
		$textos['parrafo_1_seccion_10_4']=$translator->TraducirTexto('1) Anuncios de inmuebles que ha publicado para que sus amigos puedan ayudarle a difundirlo.');
		$textos['parrafo_1_seccion_10_5']=$translator->TraducirTexto('2) Anuncios escogidos como favoritos para que sus amigos puntúen y comenten.');
		$textos['parrafo_1_seccion_10_6']=$translator->TraducirTexto('3) Comentarios y puntuaciones sobre los favoritos de sus amigos (visibles para todos los amigos en común).');
		$textos['parrafo_1_seccion_10_7']=$translator->TraducirTexto('4) Búsquedas guardadas para recibir novedades por e-mail (ej. “me interesan pisos en alquiler en venta en Pozuelo de Alarcón de al menos 60 m2”). Además, si el usuario así lo desea también se le da la oportunidad de publicar en facebook dichas acciones. Por ejemplo, después de publicar un piso en '.DOMINIO_URL_EMPRESA.' puede escoger publicar una historia en facebook del tipo: “he puesto en venta un piso en '.DOMINIO_URL_EMPRESA.', ¿me ayudas a correr la voz?” El apartado Tu actividad de '.DOMINIO_URL_EMPRESA.' permite al usuario consultar toda su actividad y elegir que información desea compartir con el resto de sus amigos. Por defecto no compartirá nada de su historial de acciones en el portal. En ningún momento ni facebook ni Fotocasa comparten ningún tipo de información privada sobre sus usuarios y su única finalidad es la establecida en las presentes condiciones generales.');
		// Sección 11
		$textos['titulo_seccion_11']=$translator->TraducirTexto("11. Duración y terminación");
		$textos['parrafo_1_seccion_11']=$translator->TraducirTexto('La prestación de los servicios y/o contenidos del Portal tiene una duración indefinida. Sin perjuicio de lo anterior, y de acuerdo con la cláusula 8 de las presentes Condiciones Generales, '.NOMBRE_EMPRESA.', está facultada para dar por terminada, suspender o interrumpir unilateralmente, en cualquier momento y sin necesidad de preaviso, la prestación del servicio y del Portal y/o de cualquiera de los servicios, sin perjuicio de lo que se hubiera dispuesto al respecto en las correspondientes condiciones particulares.');
		// Sección 12
		$textos['titulo_seccion_12']=$translator->TraducirTexto("12. Ley y jurisdicción");
		$textos['parrafo_1_seccion_12']=$translator->TraducirTexto('Todas las cuestiones relativas al Portal se rigen por las Leyes del Reino de España y se someten a la jurisdicción del domicilio del Usuario. En el caso de que el Usuario tenga su domicilio fuera de España, '.NOMBRE_EMPRESA.' y el Usuario se someten, con renuncia expresa a cualquier otro fuero, a los juzgados y tribunales de la ciudad de Cádiz (España).');
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/condiciones_uso.php');
	}
?>