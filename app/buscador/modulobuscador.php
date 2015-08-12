<?php
	function buscador()
	{
		// Conexi�n Base de datos
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
		// Par de traducci�n
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
		// Criterios de ordenaci�n
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
		// Conexi�n Base de datos
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
		// Inclusi�n librer�a
		include(PATHINCLUDE_FRAMEWORK."librerias/Pagination.class.php");
		$pages = new Paginator('fotos');  
		$pages->items_total = $num_todos;  
		$pages->mid_range = 9;
		$pages->items_per_page = 1;
		$pages->url_actual = $_SESSION['rutaraiz']."app/buscador/ver_datos_adicionales.php?id=".$_GET['id'];
		$pages->separador = "&";
		$pages->paginate();
		// configuramos datos de consulta (ver librer�a)
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
		// Inclusi�n librer�a
		$pages = new Paginator('planos');  
		$pages->items_total = $num_planos;  
		$pages->mid_range = 9;
		$pages->items_per_page = 1;
		$pages->url_actual = $_SESSION['rutaraiz']."app/buscador/ver_datos_adicionales.php?id=".$_GET['id'];
		$pages->separador = "&";
		$pages->paginate();
		// configuramos datos de consulta (ver librer�a)
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
		// Inclusi�n librer�a
		$pages = new Paginator('videos');  
		$pages->items_total = $num_videos;  
		$pages->mid_range = 9;
		$pages->items_per_page = 1;
		$pages->url_actual = $_SESSION['rutaraiz']."app/buscador/ver_datos_adicionales.php?id=".$_GET['id'];
		$pages->separador = "&";
		$pages->paginate();
		// configuramos datos de consulta (ver librer�a)
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
		// Par de traducci�n
		$translator = Translator::getInstance();
		// Traducci�n de textos
		$inmueble['observaciones']=$translator->TraducirTexto($inmueble['observaciones']);
		$inmueble['tipo']=$translator->TraducirTexto(formatear_tipo($inmueble['tipo']));
		// Campos
		$campos['region']=$translator->TraducirTexto("Regi�n");
		$campos['poblacion']=$translator->TraducirTexto("Municipio");
		$campos['provincia']=$translator->TraducirTexto("Provincia");
		$campos['zona']=$translator->TraducirTexto("Zona");
		$campos['tipologia']=$translator->TraducirTexto("Tipo");
		$campos['precio_compra']=$translator->TraducirTexto("Precio de compra");
		$campos['precio_alquiler']=$translator->TraducirTexto("Precio de alquiler");
		$campos['metros']=$translator->TraducirTexto("Metros");
		$campos['habitaciones']=$translator->TraducirTexto("Habitaciones");
		$campos['banios']=$translator->TraducirTexto("Ba�os");
		$campos['metros_utiles']=$translator->TraducirTexto("Metros �tiles");
		$campos['observaciones']=$translator->TraducirTexto("Observaciones");
		// Otros
		$textos['frase_campos']=$translator->TraducirTexto("Estos son los datos asociados al inmueble seleccionado");
		$textos['informacion_general']=$translator->TraducirTexto("Informaci�n General");
		$textos['caracteristicas']=$translator->TraducirTexto("Caracter�sticas");
		$textos['ubicacion']=$translator->TraducirTexto("Ubicaci�n");
		$textos['google_maps']=$translator->TraducirTexto("Zona en Google Maps");
		$textos['direccion_google_maps']=$translator->TraducirTexto("Zona del inmueble");
		$textos['direccion_street_view']=$translator->TraducirTexto("Ver direcci�n en Street View");
		$textos['fotografias_asociadas']=$translator->TraducirTexto("Fotos");
		$textos['solicitar_informacion']=$translator->TraducirTexto("Solicitar informaci�n");
		$textos['recomendar_amigo']=$translator->TraducirTexto("Recomendar amigo/a");
		$textos['no_fotografias_asociadas']=$translator->TraducirTexto("Actualmente no hay registrada ninguna fotograf�a asociada al inmueble.");		
		$textos['planos_asociados']=$translator->TraducirTexto("Planos");
		$textos['no_planos_asociados']=$translator->TraducirTexto("Actualmente no hay registrado ning�n plano asociado al inmueble.");
		$textos['videos_asociados']=$translator->TraducirTexto("Videos");
		$textos['no_videos_asociados']=$translator->TraducirTexto("Actualmente no hay registrado ning�n video asociado al inmueble.");		
		$textos['enlaces_asociados']=$translator->TraducirTexto("Enlaces de publicidad");		
		$textos['servicios_inmobiliarios']=$translator->TraducirTexto("Servicios Inmobiliarios");
		$textos['buscador']=$translator->TraducirTexto("Buscador de inmuebles");
		$textos['titulo_seccion']=$translator->TraducirTexto("Detalles");
		// Navegador web
		$navegador=ObtenerNavegador();
		// Google maps
		if($inmueble['direccion_aprox']!="")
		{
			// La direcci�n se compondr� de la composici�n del campo direcci�n + region + provincia + poblacion si es diferente a "Otros"
			$direccion=$inmueble['direccion_aprox'].", ".formatear_poblacion($inmueble['poblacion_inmueble']).", ".formatear_provincia($inmueble['provincia_inmueble']);
			// Se configura el mapa de Google
			require(PATHINCLUDE_FRAMEWORK."librerias/EasyGoogleMap.class.php");
			$gm = new EasyGoogleMap(PATHINCLUDE_KEY_GOOGLE_MAPS);
			$gm->SetMapZoom(15);
			$gm->SetMapWidth(800);
			$gm->SetMapHeight(400);
			$gm->SetAddress($direccion);
			$gm->SetInfoWindowText($textos['direccion_google_maps']);
			// Direcci�n de street view
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
		// Par de traducci�n
		$translator = Translator::getInstance();
		// Campos
		$campos['nombre']=$translator->TraducirTexto("Nombre");
		$campos['correo']=$translator->TraducirTexto("E-mail");
		$campos['mensaje']=$translator->TraducirTexto("Mensaje");
		$campos['captcha']=$translator->TraducirTexto("Introduzca el c�digo");
		// Otros
		$textos['informe_errores']=$translator->TraducirTexto("Informe de errores");
		$textos['errores_encontrados']=$translator->TraducirTexto("errores encontrados");
		$textos['frase_campos']=$translator->TraducirTexto("Rellene el siguiente formulario para enviar la solicitud de informaci�n sobre el inmueble");
		$textos['enviar_solicitud']=$translator->TraducirTexto("Enviar solicitud");
		$textos['limpiar_todo']=$translator->TraducirTexto("Limpiar todo");
		$textos['servicios_inmobiliarios']=$translator->TraducirTexto("Servicios Inmobiliarios");
		$textos['buscador']=$translator->TraducirTexto("Buscador de inmuebles");
		$textos['detalles']=$translator->TraducirTexto("Detalles");
		$textos['titulo_seccion']=$translator->TraducirTexto("Solicitar informaci�n");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/solicitar_informacion.php');
	}
?>
<?php
	function recomendar_amigo()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducci�n
		$translator = Translator::getInstance();
		// Campos
		$campos['correo']=$translator->TraducirTexto("E-mail propio");
		$campos['correo_amigo']=$translator->TraducirTexto("E-mail amigo/a");
		$campos['mensaje']=$translator->TraducirTexto("Mensaje");
		$campos['captcha']=$translator->TraducirTexto("Introduzca el c�digo");
		$campos['aceptar_documentos']=$translator->TraducirTexto("Acepto los siguientes documentos");
		$campos['condiciones_uso']=$translator->TraducirTexto("condiciones de uso");
		$campos['politica_privacidad']=$translator->TraducirTexto("pol�tica de privacidad");
		// Otros		
		$textos['informe_errores']=$translator->TraducirTexto("Informe de errores");
		$textos['errores_encontrados']=$translator->TraducirTexto("errores encontrados");
		$textos['frase_campos']=$translator->TraducirTexto("Rellene el siguiente formulario para enviar la recomendaci�n a su amigo/a:");
		$textos['enviar_solicitud']=$translator->TraducirTexto("Enviar recomendaci�n");
		$textos['limpiar_todo']=$translator->TraducirTexto("Limpiar todo");
		$textos['servicios_inmobiliarios']=$translator->TraducirTexto("Servicios Inmobiliarios");
		$textos['buscador']=$translator->TraducirTexto("Buscador de inmuebles");
		$textos['detalles']=$translator->TraducirTexto("Detalles");
		$textos['titulo_seccion']=$translator->TraducirTexto("Enviar recomendaci�n a un amigo/a");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/recomendar_amigo.php');
	}
?>
<?php
	function politica_privacidad()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducci�n
		$translator = Translator::getInstance();
		// Otros
		$textos['titulo_seccion']=$translator->TraducirTexto("POL�TICA DE PRIVACIDAD GENERAL");
		// Secci�n 1
		$textos['titulo_seccion_1']=$translator->TraducirTexto("1. Objeto");
		$textos['parrafo_1_seccion_1']=$translator->TraducirTexto('El presente documento tiene por objeto describir la pol�tica de protecci�n de datos de '.NOMBRE_EMPRESA.', (en adelante '.NOMBRE_EMPRESA.'), domiciliada en el Avenida Ana de Viya, n�mero 2, 11007 C�diz (C�diz).');
		$textos['parrafo_2_seccion_1']=$translator->TraducirTexto('Los datos de car�cter personal que nos proporcione ser�n objeto de tratamiento automatizado e incorporados a los ficheros automatizados de '.NOMBRE_EMPRESA.', siendo esta Sociedad titular y responsable de sus propios ficheros, los cuales, conforme a la normativa vigente, se encuentran debidamente registrados en el Registro General de la Agencia de Protecci�n de Datos.');
		$textos['parrafo_3_seccion_1']=$translator->TraducirTexto('En los formularios del Registro donde se recaben datos de car�cter personal, se se�alar�n los distintos campos cuya cumplimentaci�n es necesaria para realizar el registro correspondiente. As�, salvo que se indique lo contrario las respuestas a las preguntas sobre datos personales son voluntarias, sin que la falta de contestaci�n a dichas preguntas implique una merma en la calidad o cantidad de los servicios correspondientes, a menos que se indique otra cosa.');
		$textos['parrafo_4_seccion_1']=$translator->TraducirTexto('El tratamiento automatizado a que ser�n sometidos todos los datos de car�cter personal recogidos como consecuencia de la solicitud, utilizaci�n, contrataci�n de cualquier producto o servicio o de cualquier transacci�n u operaci�n realizada a trav�s de esta p�gina web (incluidos, a estos efectos, los que sean facilitados por los Usuarios para la publicaci�n de anuncios), tiene como finalidad principal el mantenimiento de la relaci�n contractual en su caso establecida con el propietario de esta p�gina web.');
		$textos['parrafo_5_seccion_1']=$translator->TraducirTexto('Con la utilizaci�n del formulario de contacto y previa aceptaci�n de la pol�tica de privacidad, el usuario consiente que los datos personales relativos a su nombre y apellidos, correo electr�nico y, en su caso, numero de tel�fono, sean comunicados al anunciante para posibilitar el contacto y con la finalidad de poder informarle sobre caracter�sticas, condiciones y cualquier otra informaci�n que sea de su inter�s relativa al inmueble seleccionado. Esta circunstancia queda debidamente advertida al usuario quien, en cualquier momento, podr� ejercer sus derechos de acceso, rectificaci�n, cancelaci�n u oposici�n, dirigi�ndose a la entidad anunciante.');
		$textos['parrafo_6_seccion_1']=$translator->TraducirTexto('Adem�s tambi�n ser�n objeto de cesi�n toda aquella otra informaci�n que el usuario desee incluir en el mensaje con la �nica finalidad de realizar el contacto necesario para una posible transacci�n inmobiliaria.');
		$textos['parrafo_7_seccion_1']=$translator->TraducirTexto('Se entiende, en este caso, por anunciante toda aquella persona f�sica o jur�dica que oferte inmuebles en nuestra website.');
		$textos['parrafo_8_seccion_1']=$translator->TraducirTexto('Ning�n tercero ajeno a '.DOMINIO_URL_EMPRESA.' podr� acceder, sin consentimiento expreso del Usuario a ning�n otro tipo de dato de car�cter personal.   ');
		$textos['parrafo_9_seccion_1']=$translator->TraducirTexto('Asimismo, con la utilizaci�n del servicio �Ayuda de un profesional inmobiliario�, el usuario accede y consiente que sus datos sean facilitados al profesional/es de referencia para que pueda ponerse en contacto e iniciar as� una posible relaci�n profesional, en caso de que las circunstancias as� lo permitan.');
		$textos['parrafo_10_seccion_1']=$translator->TraducirTexto('Tambi�n ser�n utilizados para la gesti�n, administraci�n, prestaci�n, ampliaci�n y mejora de los servicios a los que el Usuario decida suscribirse o utilizar, por ejemplo: ');
		$textos['parrafo_11_seccion_1']=$translator->TraducirTexto('En el caso de que se haya suscrito a la recepci�n de boletines informativos, sus datos s�lo ser�n utilizados para gestionar el env�o de este bolet�n.');
		$textos['parrafo_12_seccion_1']=$translator->TraducirTexto('En el caso del env�o de publicidad, sus datos s�lo ser�n utilizados para gestionar el env�o de publicidad a trav�s de medios tradicionales y electr�nicos, adem�s de telefon�a m�vil. En este sentido se le informa que podremos enviarle publicidad tanto propia como de terceras empresas, relativa a los productos y servicios que haya utilizado a trav�s de nuestra p�gina web, y en todo caso sobre los sectores Financiero, Editorial, Educaci�n, Automoci�n, Telecomunicaciones, Inform�tica, Tecnolog�a, Hogar, Belleza, Inmobiliario, Venta a distancia, Gran consumo, Alimentaci�n, Coleccionismo, M�sica, Pasatiempos, Ocio, Viajes, Seguros, Energ�a y Agua, ONG y formaci�n entre otros.');
		$textos['parrafo_13_seccion_1']=$translator->TraducirTexto('En el caso de las direcciones de correo electr�nico o formulario de contacto de la p�gina web, los datos que nos proporcione a trav�s de los mismos, ser�n utilizados exclusivamente para atender las consultas que nos plantee por este medio.');
		$textos['parrafo_14_seccion_1']=$translator->TraducirTexto('En el caso de que nos facilite datos de un tercero, por ejemplo para informar a un conocido de la publicaci�n de un anuncio, o para recomendarle nuestra web o un art�culo publicada en la misma, se le informa que usted es responsable de haber obtenido el consentimiento de la persona y de los datos de la misma que nos facilite.');
		$textos['parrafo_15_seccion_1']=$translator->TraducirTexto('Se le informa adem�s que sus datos personales de contacto podr�n ser cedidos a alguna de las sociedades de '.NOMBRE_EMPRESA.' domiciliadas en Espa�a, al efecto de aumentar la difusi�n de sus anunciantes, y de que las publicaciones y p�ginas web propiedad de cualquiera de las sociedades de '.NOMBRE_EMPRESA.' puedan incluir los anuncios facilitados por el Usuario.');
		$textos['parrafo_16_seccion_1']=$translator->TraducirTexto('Las funciones de '.NOMBRE_EMPRESA.' y las sociedades de '.NOMBRE_EMPRESA.' son el desarrollo de actividades y prestaci�n de servicios en el �rea de publicaci�n y distribuci�n de anuncios clasificados y servicios conexos en cualquier tipo de medios, incluyendo impresos, electr�nicos o mediante internet.');
		$textos['parrafo_17_seccion_1']=$translator->TraducirTexto('En ciertos casos, adem�s, se proponen ceder m�s datos personales a terceros. Cuando proceda, esta circunstancia ser� debidamente advertida a los Usuarios en los formularios de recogida de datos personales, junto con la identificaci�n de la sociedad que los ceda y dicho tercero, el tipo de actividades a las que se dedica y la finalidad a que responde la cesi�n. El Usuario podr� oponerse en todo momento a cualquiera o todas las cesiones precitadas.');
		$textos['parrafo_18_seccion_1']=$translator->TraducirTexto('El Usuario titular de los datos personales podr� ejercer, en los t�rminos y las limitaciones establecidos la normativa vigente, los derechos de acceso, rectificaci�n, cancelaci�n y oposici�n a trav�s de las siguientes v�as:');
		$textos['parrafo_19_seccion_1']=$translator->TraducirTexto('Mediante correo postal a la direcci�n se�alada en el encabezamiento de la presente Pol�tica de Protecci�n de Datos de Car�cter Personal, indicando en el sobre "BAJA REGISTRO INTERNET".');
		$textos['parrafo_20_seccion_1']=$translator->TraducirTexto('En la carta deber� indicar:');
		$textos['parrafo_21_seccion_1']=$translator->TraducirTexto('La direcci�n de correo electr�nico con la cual figura su alta en nuestra base de datos.');
		$textos['parrafo_22_seccion_1']=$translator->TraducirTexto('La contrase�a que utiliza para acceder a nuestros servicios online.');
		$textos['parrafo_23_seccion_1']=$translator->TraducirTexto('Fotocopia de DNI. (No necesario para el Derecho de oposici�n)');
		$textos['parrafo_24_seccion_1']=$translator->TraducirTexto('Direcci�n postal.');
		$textos['parrafo_25_seccion_1']=$translator->TraducirTexto('Tel�fono de contacto.');
		$textos['parrafo_26_seccion_1']=$translator->TraducirTexto('Mediante el formulario online correspondiente que el usuario encontrar� en todos los portales, correos electr�nicos y comunicaciones de '.NOMBRE_EMPRESA.'.');
		$textos['parrafo_27_seccion_1']=$translator->TraducirTexto(NOMBRE_EMPRESA.' garantiza la confidencialidad de los datos de car�cter personal. Ello no obstante, revelar� a las autoridades p�blicas competentes los datos personales y cualquier otra informaci�n que est� en su poder o sea accesible a trav�s de sus sistemas y sea requerida de conformidad con las disposiciones legales y reglamentarias aplicables al caso. Los datos de car�cter personal podr�n ser conservados en los ficheros titularidad de '.NOMBRE_EMPRESA.' incluso una vez finalizadas las relaciones formalizadas a trav�s del Portal, exclusivamente a los fines indicados anteriormente y, en todo caso, durante los plazos legalmente establecidos, a disposici�n de autoridades administrativas o judiciales. En cualquier caso le informamos que, en caso de que se vaya a realizar la cesi�n a terceros de sus datos personales, le ser� comunicada previamente especificando la identidad de los cesionarios y la finalidad con que se van a tratar los datos que se ceden.');
		// Secci�n 1
		$textos['titulo_seccion_2']=$translator->TraducirTexto("2. Env�o de informaci�n publicitaria a tu correo electr�nico.");
		$textos['parrafo_1_seccion_2']=$translator->TraducirTexto('La aceptaci�n de las condiciones de uso y pol�tica de privacidad , ligada al uso de cualquiera de los servicios de '.NOMBRE_EMPRESA.', implica tu autorizaci�n expresa en favor de '.NOMBRE_EMPRESA.' para el env�o de informaci�n comercial a tu domicilio, tel�fono m�vil y direcci�n de correo electr�nico. Dicha autorizaci�n comprende el env�o de publicidad comercial y publicitaria relacionada con las actividades, productos y servicios de '.NOMBRE_EMPRESA.' y portales relacionados con esta Web, as� como de terceros y sus portales. Si deseas revocar dicha autorizaci�n, podr�s hacerlo de forma f�cil y gratuita dirigiendo tu petici�n al formulario electr�nico que para tal efecto se indica en el Web o bien, mediante correo postal a la direcci�n se�alada en el encabezamiento.');
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/politica_privacidad.php');
	}
?>
<?php
	function condiciones_uso()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducci�n
		$translator = Translator::getInstance();
		// Otros
		$textos['titulo_seccion']=$translator->TraducirTexto("Condiciones Generales de Uso del Portal");
		// Secci�n 1
		$textos['titulo_seccion_1']=$translator->TraducirTexto("1. Objeto");
		$textos['parrafo_1_seccion_1']=$translator->TraducirTexto('El presente documento tiene por objeto establecer las Condiciones Generales de Uso del Portal de Internet " '.DOMINIO_URL_EMPRESA.'" y todos los dem�s portales titularidad de '.NOMBRE_EMPRESA.' (en adelante '.NOMBRE_EMPRESA.'), con domicilio Social en la Avenida Ana de Viya, n�mero 2, C�diz, Espa�a, y e-mail gesticadiz@gmail.com.');
		$textos['parrafo_2_seccion_1']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' se reserva el derecho a modificar las presentes Condiciones Generales de Uso con el objeto de adecuarlas a la legislaci�n vigente aplicable en cada momento.');
		$textos['parrafo_3_seccion_1']=$translator->TraducirTexto('Las presentes Condiciones Generales de Uso no excluyen la posibilidad de que determinados Servicios del Portal, por sus caracter�sticas particulares, sean sometidos, adem�s de a las Condiciones Generales de Uso, a sus propias condiciones particulares de uso (en adelante las Condiciones Particulares).');
		$textos['parrafo_4_seccion_1']=$translator->TraducirTexto('La utilizaci�n por parte del Usuario de cualquiera de los Servicios del Portal supone su adhesi�n y aceptaci�n expresa a todas las Condiciones Generales de Uso en la versi�n publicada en el presente portal en el momento en que el usuario acceda al Portal, as� como a las Condiciones Particulares que, en su caso, sean de aplicaci�n.');
		// Secci�n 2
		$textos['titulo_seccion_2']=$translator->TraducirTexto("2. Condiciones de acceso y utilizaci�n del portal");
		$textos['titulo_seccion_2_1']=$translator->TraducirTexto("2.1. Condici�n de Usuario");
		$textos['parrafo_1_seccion_2_1']=$translator->TraducirTexto('La utilizaci�n de cualquier Servicio del Portal atribuye la Condici�n de Usuario del mismo.');
		$textos['titulo_seccion_2_2']=$translator->TraducirTexto("2.2. ".NOMBRE_EMPRESA." se reserva el derecho a difundir, total o parcialmente, los Anuncios del Anunciante en terceros portales, en campa�as publicitarias para promocionar el portal, as� como en otros sitios web, tales como redes sociales o blogs, aceptando el Anunciante dicha condici�n.");
		$textos['titulo_seccion_2_3']=$translator->TraducirTexto("2.3. Necesidad de Registro");
		$textos['parrafo_1_seccion_2_3']=$translator->TraducirTexto('Con car�cter general para el acceso a los Servicios del Portal no ser� necesario el registro del Usuario del Portal. No obstante la utilizaci�n de determinados Servicios podr� estar condicionada al registro previo del Usuario. Este registro se efectuar� en la forma expresamente se�alada en el propio Servicio o en las Condiciones Particulares que le sean de aplicaci�n.');
		$textos['titulo_seccion_2_4']=$translator->TraducirTexto("2.4. Gratuidad de los Servicios");
		$textos['parrafo_1_seccion_2_4']=$translator->TraducirTexto('Con car�cter general los Servicios ofertados a trav�s del Portal tendr�n car�cter gratuito. No obstante, la utilizaci�n de determinados Servicios del Portal puede, o podr� estar en el futuro, sujeta a contraprestaci�n econ�mica en la forma y t�rminos que se determine en las correspondientes Condiciones Particulares del Servicio.');
		$textos['titulo_seccion_2_5']=$translator->TraducirTexto("2.5. Uso del Portal y sus Servicios");
		$textos['parrafo_1_seccion_2_5']=$translator->TraducirTexto('El Usuario reconoce y acepta que el uso de los contenidos y/o servicios ofrecidos por el Portal ser� bajo su exclusivo riesgo y/o responsabilidad. El Usuario se compromete a utilizar el Portal y todo su contenido y Servicios de conformidad con la ley, la moral, el orden p�blico y las presentes Condiciones Generales de Uso, y las Condiciones Particulares que, en su caso, le sean de aplicaci�n. Asimismo, se compromete hacer un uso adecuado de los servicios y/o contenidos del Portal y a no emplearlos para realizar actividades il�citas o constitutivas de delito, que atenten contra los derechos de terceros y/o que infrinjan la regulaci�n sobre propiedad intelectual e industrial, o cualesquiera otras normas del ordenamiento jur�dico aplicable. El usuario conoce y acepta que el portal enviar� una respuesta autom�tica por cada uno de los anuncios en los que est� interesado y se ponga debidamente en contacto. En particular, el Usuario se compromete a no trasmitir, introducir, difundir y poner a disposici�n de terceros, cualquier tipo de material e informaci�n (datos contenidos, mensajes, dibujos, archivos de sonido e imagen, fotograf�as, software, etc.) que sean contrarios a la ley, la moral, el orden p�blico y las presentes Condiciones Generales de Uso y, en su caso, a las Condiciones Particulares que le sean de aplicaci�n. A t�tulo enunciativo, y en ning�n caso limitativo o excluyente, el Usuario se compromete a:');
		$textos['parrafo_2_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir contenidos o propaganda de car�cter racista, xen�fobo, pornogr�fico, de apolog�a del terrorismo o que atenten contra los derechos humanos.');
		$textos['parrafo_3_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir en la red programas de datos (virus y software nocivo) susceptibles de provocar da�os en los sistemas inform�ticos del proveedor de acceso, sus proveedores o terceros usuarios de la red Internet.');
		$textos['parrafo_4_seccion_2_5']=$translator->TraducirTexto('No difundir, transmitir o poner a disposici�n de terceros cualquier tipo de informaci�n, elemento o contenido que atente contra los derechos fundamentales y las libertades p�blicas reconocidos constitucionalmente y en los tratados internacionales.');
		$textos['parrafo_5_seccion_2_5']=$translator->TraducirTexto('No difundir, transmitir o poner a disposici�n de terceros cualquier tipo de informaci�n, elemento o contenido que constituya publicidad il�cita o desleal.');
		$textos['parrafo_6_seccion_2_5']=$translator->TraducirTexto('No transmitir publicidad no solicitada o autorizada, material publicitario, "correo basura", "cartas en cadena", "estructuras piramidales", o cualquier otra forma de solicitaci�n, excepto en aquellas �reas (tales como espacios comerciales) que hayan sido exclusivamente concebidas para ello.');
		$textos['parrafo_7_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir cualquier informaci�n y contenidos falsos, ambiguos o inexactos de forma que induzca a error a los receptores de la informaci�n.');
		$textos['parrafo_8_seccion_2_5']=$translator->TraducirTexto('No suplantar a otros usuarios utilizando sus claves de registro a los distintos servicios y/o contenidos de los Portales.');
		$textos['parrafo_9_seccion_2_5']=$translator->TraducirTexto('No difundir, transmitir o poner a disposici�n de terceros cualquier tipo de informaci�n, elemento o contenido que suponga una violaci�n de los derechos de propiedad intelectual e industrial, patentes, marcas o copyright que correspondan a los titulares de los Portales o a terceros.');
		$textos['parrafo_10_seccion_2_5']=$translator->TraducirTexto('No introducir o difundir contenidos o propaganda de car�cter racista, xen�fobo, pornogr�fico, de apolog�a del terrorismo o que atenten contra los derechos humanos.');
		// Secci�n 3
		$textos['titulo_seccion_3']=$translator->TraducirTexto("3. Propiedad intelectual e industrial");
		$textos['parrafo_1_seccion_3']=$translator->TraducirTexto('El usuario reconoce que todos los elementos del Portal y de cada uno de los Servicios prestados a trav�s del mismo, la informaci�n y materiales contenidos en el mismo, la estructura, selecci�n, ordenaci�n y presentaci�n de sus contenidos y los programas de ordenador utilizados en relaci�n con el mismo est�n protegidos por derechos de propiedad intelectual e industrial de '.NOMBRE_EMPRESA.' o de terceros.');
		$textos['parrafo_2_seccion_3']=$translator->TraducirTexto('Salvo que fuera autorizado por '.NOMBRE_EMPRESA.' o, en su caso, por los terceros titulares de los derechos correspondientes, o a menos que ello resulte legalmente permitido, el usuario no podr� reproducir, transformar, modificar, desensamblar, realizar ingenier�a inversa, distribuir, alquilar, prestar, poner a disposici�n o permitir el acceso al p�blico a trav�s de cualquier modalidad de comunicaci�n p�blica de ninguno de los elementos referidos en el p�rrafo anterior.');
		$textos['parrafo_3_seccion_3']=$translator->TraducirTexto('En particular, queda terminantemente prohibido la utilizaci�n de los textos, im�genes, anuncios y cualesquiera otro elemento incluido en el presente sitio web para su posterior inclusi�n, total o parcial, en otros sitios web ajenos a '.NOMBRE_EMPRESA.' sin contar con la autorizaci�n previa y por escrito de '.NOMBRE_EMPRESA.'.');
		$textos['parrafo_4_seccion_3']=$translator->TraducirTexto('El Usuario deber� utilizar los materiales, elementos e informaci�n a la que acceda a trav�s de la utilizaci�n del Portal y de cada uno de los correspondientes Servicios �nicamente para sus propias necesidades, oblig�ndose a no realizar ni directa ni indirectamente una explotaci�n comercial ni de los servicios ni de los materiales, elementos e informaci�n obtenidos a trav�s de los mismos.');
		$textos['parrafo_5_seccion_3']=$translator->TraducirTexto('El Usuario deber� abstenerse de suprimir los signos identificativos de los derechos (de propiedad intelectual, industrial o cualquier otro) de '.NOMBRE_EMPRESA.' o de los terceros que figuren en el Portal y en cada uno de los diversos Servicios ofrecidos a trav�s de �l. Asimismo, el Usuario deber� abstenerse de eludir o manipular cualesquiera dispositivos t�cnicos establecidos por '.NOMBRE_EMPRESA.' o por terceros, ya sea en el Portal, en cualquiera de los Servicios o en cualquiera de los materiales, elementos o informaci�n obtenidos a trav�s del mismo, para la protecci�n de sus derechos.');
		$textos['parrafo_6_seccion_3']=$translator->TraducirTexto('El usuario autoriza a reproducir, distribuir y comunicar p�blicamente las fotograf�as que inserte en su anuncio para los fines descritos en el apartado 2.2. del presente Aviso Legal, as� como a a�adir las marcas de agua de '.NOMBRE_EMPRESA.' con el fin de evitar un aprovechamiento inconsentido por parte de terceros.');
		// Secci�n 4
		$textos['titulo_seccion_4']=$translator->TraducirTexto("4. Exclusi�n de garant�as. Responsabilidad");
		$textos['titulo_seccion_4_1']=$translator->TraducirTexto("4.1. Disponibilidad y Continuidad del Portal y los Servicios ".NOMBRE_EMPRESA." no garantiza la disponibilidad, acceso y continuidad del funcionamiento del Portal y de sus Servicios.");		
		$textos['parrafo_1_seccion_4_1']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no ser� responsable, con los l�mites establecidos en el Ordenamiento Jur�dico vigente, de los da�os y perjuicios causados al Usuario como consecuencia de la indisponibilidad, fallos de acceso y falta de continuidad del Portal y sus Servicios.');
		$textos['titulo_seccion_4_2']=$translator->TraducirTexto("4.2. Contenidos y Servicios de ".NOMBRE_EMPRESA);		
		$textos['parrafo_1_seccion_4_2']=$translator->TraducirTexto(NOMBRE_EMPRESA.' responder� �nica y exclusivamente de los Servicios que preste por s� misma y de los contenidos directamente originados por '.NOMBRE_EMPRESA.' e identificados con su copyright. Dicha responsabilidad quedar� excluida en los casos en que concurran causas de fuerza mayor o en los supuestos en que la configuraci�n de los equipos del Usuario no sea la adecuada para permitir el correcto uso de los servicios de Internet prestados por '.NOMBRE_EMPRESA.'. En cualquier caso, la eventual responsabilidad de '.NOMBRE_EMPRESA.' frente al usuario por todos los conceptos quedar� limitada como m�ximo al importe de las cantidades percibidas directamente del usuario por '.NOMBRE_EMPRESA.', con exclusi�n en todo caso de responsabilidad por da�os indirectos o por lucro cesante.');
		$textos['titulo_seccion_4_3']=$translator->TraducirTexto("4.3. Contenidos y Servicios de Terceros");	
		$textos['parrafo_1_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no controla previamente, aprueba ni hace propios los contenidos, servicios, opiniones, comunicaciones datos, archivos, productos y cualquier clase de informaci�n de terceros, personas jur�dicas o f�sicas, recogidos en el Portal. De igual forma, no garantiza la licitud, fiabilidad, utilidad, veracidad, exactitud, exhaustividad y actualidad de los contenidos, informaciones y Servicios de terceros en el Portal.');
		$textos['parrafo_2_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no controla con car�cter previo y no garantiza la ausencia de virus y otros elementos en los Contenidos y servicios prestados por terceros a trav�s del Portal que puedan introducir alteraciones en el sistema inform�tico, documentos electr�nicos o ficheros de los usuarios.');
		$textos['parrafo_3_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no ser� responsable, ni indirectamente ni subsidiariamente, de los da�os y perjuicios de cualquier naturaleza derivados de la utilizaci�n y contrataci�n de los Contenidos y de los Servicios de terceros en el Portal as� como de la falta de licitud, fiabilidad, utilidad, veracidad, exactitud, exhaustividad y actualidad de los mismos. Con car�cter enunciativo, y en ning�n caso limitativo, no ser� responsable por los da�os y perjuicios de cualquier naturaleza derivados de:');
		$textos['parrafo_4_seccion_4_3']=$translator->TraducirTexto('a) La infracci�n de los derechos propiedad intelectual e industrial y el cumplimiento defectuoso o incumplimiento de los compromisos contractuales adquiridos por terceros.');
		$textos['parrafo_5_seccion_4_3']=$translator->TraducirTexto('b) La realizaci�n de actos de competencia desleal y publicidad il�cita.');
		$textos['parrafo_6_seccion_4_3']=$translator->TraducirTexto('c) La inadecuaci�n y defraudaci�n de las expectativas de los Servicios y Contenidos de los terceros.');
		$textos['parrafo_7_seccion_4_3']=$translator->TraducirTexto('d) Los vicios y defectos de toda clase de los Servicios y contenidos de terceros prestados a trav�s del Portal.');
		$textos['parrafo_8_seccion_4_3']=$translator->TraducirTexto(NOMBRE_EMPRESA.' no ser� responsable, ni indirectamente ni subsidiariamente, de los da�os y perjuicios de cualquier naturaleza causados al Usuario como consecuencia de la presencia de virus u otros elementos en los contenidos y Servicios prestados por terceros que puedan producir alteraciones en el sistema inform�tico, documentos electr�nicos o ficheros de los usuarios.');
		$textos['parrafo_9_seccion_4_3']=$translator->TraducirTexto('La exoneraci�n de responsabilidad se�alada en los p�rrafos anteriores ser� de aplicaci�n en el caso de que '.NOMBRE_EMPRESA.' no tenga conocimiento efectivo de que la actividad o la informaci�n almacenada es il�cita o de que lesiona bienes o derechos de un tercero susceptibles de indemnizaci�n, o si la tuviesen act�en con diligencia para retirar los datos y contenidos o hacer imposible el acceso a ellos.');		
		$textos['titulo_seccion_4_4']=$translator->TraducirTexto("4.4. Conducta de los Usuarios");	
		$textos['parrafo_1_seccion_4_4']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' no garantiza que los Usuarios del Portal utilicen los contenidos y/o servicios del mismo de conformidad con la ley, la moral, el orden p�blico, ni las presentes Condiciones Generales y, en su caso, las condiciones Particulares que resulten de aplicaci�n Asimismo, no garantiza la veracidad y exactitud, exhaustividad y/o autenticidad de los datos proporcionados por los Usuarios.');
		$textos['parrafo_2_seccion_4_4']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' no ser� responsable, indirecta ni subsidiariamente, de los da�os y perjuicios de cualquier naturaleza derivados de la utilizaci�n de los Servicios y Contenidos de los Portales por parte de los Usuarios o que puedan derivarse de la falta de veracidad, exactitud y/o autenticidad de los datos o informaciones proporcionadas por los Usuarios, o de la suplantaci�n de la identidad de un tercero efectuada por un Usuario en cualquier clase de actuaci�n a trav�s del Portal. A t�tulo enunciativo, pero no limitativo, '.NOMBRE_EMPRESA.' no ser� responsable indirecta o subsidiariamente de:');
		$textos['parrafo_3_seccion_4_4']=$translator->TraducirTexto('a) Los contenidos, informaciones, opiniones y manifestaciones de cualquier Usuario o de terceras personas o entidades que se comuniquen o exhiban a trav�s del Portal.');
		$textos['parrafo_4_seccion_4_4']=$translator->TraducirTexto('b) Los da�os y perjuicios causados a terceros derivados de la utilizaci�n por parte del Usuario de los servicios y contenidos del Portal.');
		$textos['parrafo_5_seccion_4_4']=$translator->TraducirTexto('c) Los da�os y perjuicios causados por la falta de veracidad, exactitud o incorrecci�n de la identidad de los usuarios y de toda informaci�n que �stos proporcionen o hagan accesible a otros usuarios.');
		$textos['parrafo_6_seccion_4_4']=$translator->TraducirTexto('d) Los da�os y perjuicios derivados de infracciones de cualquier usuario que afecten a los derechos de otro usuario, o de terceros, incluyendo los derechos de copyright, marca, patentes, informaci�n confidencial y cualquier otro derecho de propiedad intelectual e industrial.');
		// Secci�n 5
		$textos['titulo_seccion_5']=$translator->TraducirTexto("5. Contrataci�n con terceros a trav�s del portal");		
		$textos['parrafo_1_seccion_5']=$translator->TraducirTexto('El Usuario reconoce y acepta que cualquier relaci�n contractual o extracontractual que, en su caso, formalice con los anunciantes o terceras personas contactadas a trav�s del Portal, as� como su participaci�n en concursos, promociones, compraventa de bienes o servicios, se entienden realizados �nica y exclusivamente entre el Usuario y el anunciante y/o tercera persona. En consecuencia, el Usuario acepta que '.NOMBRE_EMPRESA.' no tiene ning�n tipo de responsabilidad sobre los da�os o perjuicios de cualquier naturaleza ocasionados con motivo de sus negociaciones, conversaciones y/o relaciones contractuales o extracontractuales con los anunciantes o terceras personas f�sicas o jur�dicas contactadas a trav�s del Portal.');
		// Secci�n 6
		$textos['titulo_seccion_6']=$translator->TraducirTexto("6. Dispositivos t�cnicos de enlace");
		$textos['parrafo_1_seccion_6']=$translator->TraducirTexto('El Portal pone a disposici�n de los Usuarios dispositivos t�cnicos de enlace y herramientas de b�squeda que permiten a los Usuarios el acceso a portales titularidad de terceros (enlaces). El Usuario reconoce y acepta que la utilizaci�n de los Servicios y contenidos de los portales enlazados ser� bajo su exclusivo riesgo y responsabilidad y exonera a '.NOMBRE_EMPRESA.' de cualquier responsabilidad sobre disponibilidad t�cnica de los portales enlazados, la calidad, fiabilidad exactitud y/o veracidad de los servicios, informaciones, elementos y/o contenidos a los que el Usuario pueda acceder en las mismas y en los directorios de b�squeda incluidos en el Portal.');
		$textos['parrafo_2_seccion_6']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' no ser� responsable indirecta ni subsidiariamente de los da�os y perjuicios de cualquier naturaleza derivados de:');
		$textos['parrafo_3_seccion_6']=$translator->TraducirTexto('a) El funcionamiento, indisponibilidad, inaccesibilidad y la ausencia de continuidad de los portales enlazados y/o los directorios de b�squeda disponibles.');
		$textos['parrafo_4_seccion_6']=$translator->TraducirTexto('b) La falta de mantenimiento y actualizaci�n de los contenidos y servicios contenidos en los portales enlazados.');
		$textos['parrafo_5_seccion_6']=$translator->TraducirTexto('c) La falta de calidad, inexactitud, ilicitud, inutilidad de los contenidos y servicios de los portales enlazados.');
		$textos['parrafo_6_seccion_6']=$translator->TraducirTexto('La exoneraci�n de responsabilidad se�alada en los p�rrafos anteriores ser� de aplicaci�n en el caso de que '.NOMBRE_EMPRESA.' no tenga conocimiento efectivo de que la actividad o la informaci�n a la que remite es l�cita o de que lesiona bienes o derechos de un tercero susceptibles de indemnizaci�n o, si la tuviese, act�e con diligencia para retirar los datos y contenidos o hacer imposible el acceso a ellos.');
		// Secci�n 7
		$textos['titulo_seccion_7']=$translator->TraducirTexto("7. Protecci�n de datos de car�cter personal");
		$textos['parrafo_1_seccion_7']=$translator->TraducirTexto('Antes de completar el Registro de Usuarios deber� leer la siguiente informaci�n sobre Protecci�n de Datos y Ley de Servicios de la Sociedad de la Informaci�n.');
		// Secci�n 8
		$textos['titulo_seccion_8']=$translator->TraducirTexto("8. Dispositivos t�cnicos de enlace");
		$textos['parrafo_1_seccion_8']=$translator->TraducirTexto('Para asegurar el correcto funcionamiento de este foro, '.DOMINIO_URL_EMPRESA.' ha establecido unas normas de publicaci�n y uso que tienen como objetivo mantener el buen tono dentro de la comunidad y, al mismo tiempo, promover las aportaciones de los usuarios para dar valor a�adido a los temas.');
		$textos['parrafo_2_seccion_8']=$translator->TraducirTexto('Recomendaciones de uso y escritura:');
		$textos['parrafo_3_seccion_8']=$translator->TraducirTexto('1) A la hora de insertar nuevo contenido en el foro, procura no perjudicar el aspecto general del sitio, utilizando las herramientas del gestor de contenidos de forma adecuada.');
		$textos['parrafo_4_seccion_8']=$translator->TraducirTexto('2) Cuida la ortograf�a y las normas de escritura.');
		$textos['parrafo_5_seccion_8']=$translator->TraducirTexto('3) No escribas con letras may�scula, pues en el contexto de los foros se considera que es una forma de gritar.');
		$textos['parrafo_6_seccion_8']=$translator->TraducirTexto('4) Expr�sate siempre con educaci�n. Evita expresiones y opiniones que puedan resultar ofensivas para los dem�s usuarios.');
		$textos['parrafo_7_seccion_8']=$translator->TraducirTexto('5) Intenta ser paciente con la gente nueva, pues no conocen el funcionamiento de los foros ni a las personas que participan asiduamente en ellos.');
		$textos['parrafo_8_seccion_8']=$translator->TraducirTexto('6) Utiliza la mensajer�a privada en caso de que tengas problemas personales con otros usuarios y no hagas p�blicos los mensajes que recibas a trav�s del sistema privado.');
		$textos['parrafo_9_seccion_8']=$translator->TraducirTexto('7) No utilices m�s de una cuenta de usuario.');
		$textos['parrafo_10_seccion_8']=$translator->TraducirTexto('8) No publiques datos personales de terceras personas.');
		$textos['parrafo_11_seccion_8']=$translator->TraducirTexto('Los mensajes que se insertes ser�n publicados de forma inmediata, aunque posteriormente pasar�n un proceso de revisi�n por parte de '.DOMINIO_URL_EMPRESA.'.');
		$textos['parrafo_12_seccion_8']=$translator->TraducirTexto('Tras el proceso de revisi�n, los mensajes que incumplan las siguientes normas de publicaci�n podr�n ser modificados parcialmente o eliminados de forma �ntegra:');
		$textos['parrafo_13_seccion_8']=$translator->TraducirTexto('1) Mensajes que incluyan insultos, descalificaciones, lenguaje soez o discriminaciones de cualquier �ndole.');
		$textos['parrafo_14_seccion_8']=$translator->TraducirTexto('2) Mensajes que utilicen este espacio para hacer publicidad de sus productos o servicios, as� como aquellos que incluyan propuestas comerciales o comentarios promocionales.');
		$textos['parrafo_15_seccion_8']=$translator->TraducirTexto('3) Mensajes que no est�n relacionados con la tem�tica propia del foro en el cual se ha insertado.');
		$textos['parrafo_16_seccion_8']=$translator->TraducirTexto('4) Mensajes que aborden temas relacionados con la religi�n o la pol�tica.');
		$textos['parrafo_17_seccion_8']=$translator->TraducirTexto('5) Mensajes que incluyan anuncios de venta o alquiler de inmuebles. Existen espacios espec�ficos para este prop�sito dentro de '.DOMINIO_URL_EMPRESA);
		$textos['parrafo_18_seccion_8']=$translator->TraducirTexto('6) Mensajes repetidos en m�s de una tem�tica. S�lo se validar� el primer mensaje insertado en el foro con el cual est� relacionado.');
		$textos['parrafo_19_seccion_8']=$translator->TraducirTexto('Adem�s, recordamos a los usuarios que:');
		$textos['parrafo_20_seccion_8']=$translator->TraducirTexto('1) Los mensajes publicados expresan la opini�n de los usuarios y no de '.DOMINIO_URL_EMPRESA.'.');
		$textos['parrafo_21_seccion_8']=$translator->TraducirTexto('2) '.DOMINIO_URL_EMPRESA.' se reserva el derecho de bloquear el acceso a los usuarios (mediante sus direcciones IP) que incumplan de manera reiterada la pol�tica de publicaci�n de este foro.');
		$textos['parrafo_22_seccion_8']=$translator->TraducirTexto('3) Los administradores y moderadores del foro est�n autorizados para quitar, editar, mover o cerrar cualquier tema en cualquier momento que crean conveniente.');
		$textos['parrafo_23_seccion_8']=$translator->TraducirTexto('4) Como usuario debes saber que cualquier informaci�n que suministres ser� guardada en una base de datos.');
		$textos['parrafo_24_seccion_8']=$translator->TraducirTexto('5) Para participar en este foro utiliza los datos de usuario de '.DOMINIO_URL_EMPRESA.'. Asimismo, si creas un nuevo usuario en este foro lo podr�s utilizar para entrar en el �rea de gesti�n de '.DOMINIO_URL_EMPRESA);
		// Secci�n 9
		$textos['titulo_seccion_9']=$translator->TraducirTexto("9. Resoluci�n");
		$textos['parrafo_1_seccion_9']=$translator->TraducirTexto('Sin perjuicio de la responsabilidad por da�os y perjuicios que se pudiera derivar, podr�, con car�cter inmediato y sin necesidad de preaviso, resolver y dar por terminada su relaci�n con el usuario, interrumpiendo su acceso al Portal o a sus correspondientes Servicios, si detecta un uso de los mismos o de cualquiera de los Servicios vinculados a los mismos contrario a las condiciones generales o particulares que sean de aplicaci�n. El Usuario responder� de los da�os y perjuicios de toda naturaleza que '.NOMBRE_EMPRESA.' o cualquiera de sus filiales pueda sufrir directa o indirectamente, como consecuencia del incumplimiento de cualquiera de las obligaciones derivadas de las condiciones generales o particulares en relaci�n con la utilizaci�n del Portal o de cualquiera de los Servicios vinculados al mismo. Igualmente, el usuario mantendr� a '.NOMBRE_EMPRESA.' y a sus filiales indemnes frente a cualquier sanci�n, reclamaci�n o demanda que pudiera interponerse por un tercero, incluidos cualesquiera organismos p�blicos, contra '.NOMBRE_EMPRESA.', sus empleados o agentes como consecuencia de la violaci�n de cualesquiera derechos de terceros por parte de dicho Usuario mediante la utilizaci�n del Portal o de los servicios vinculados al mismo en una forma contraria a lo previsto en las condiciones generales o particulares que fueran de aplicaci�n.');
		// Secci�n 10
		$textos['titulo_seccion_10']=$translator->TraducirTexto("10. Varios");
		$textos['titulo_seccion_10_1']=$translator->TraducirTexto("10.1. Modificaciones");		
		$textos['parrafo_1_seccion_10_1']=$translator->TraducirTexto(''.NOMBRE_EMPRESA.' se reserva el derecho a efectuar las modificaciones que estime oportunas, pudiendo modificar, suprimir e incluir nuevos contenidos y/o servicios, as� como la forma en que �stos aparezcan presentados y localizados.');
		$textos['titulo_seccion_10_2']=$translator->TraducirTexto("10.2. Menores de Edad");		
		$textos['parrafo_1_seccion_10_2']=$translator->TraducirTexto('Con car�cter general, para hacer uso de los Servicios del Portal los menores de edad deben haber obtenido previamente la autorizaci�n de sus padres, tutores o representantes legales, quienes ser�n responsables de todos los actos realizados a trav�s del Portal por los menores a su cargo. En aquellos Servicios en los que expresamente se se�ale, el acceso quedar� restringido �nica y exclusivamente a mayores de 18 a�os.');
		$textos['titulo_seccion_10_3']=$translator->TraducirTexto("10.3. Condiciones de uso de Facebook Connect en ".DOMINIO_URL_EMPRESA);		
		$textos['parrafo_1_seccion_10_3']=$translator->TraducirTexto('Facebook Connect es un servicio de facebook a trav�s del cual un usuario puede llevarse consigo a otros portales su red social. Permite que un usuario visite un portal, en este caso '.DOMINIO_URL_EMPRESA.', llevando a sus amigos de facebook �en una mochila�. Al identificarse a trav�s de �Conecta con facebook�, el usuario puede seleccionar compartir su actividad con el resto de sus amigos de facebook que tambi�n utilizan la presente aplicaci�n de '.DOMINIO_URL_EMPRESA.'. Dicha actividad puede ser consultada en la direcci�n www.'.DOMINIO_URL_EMPRESA.'. La actividad en '.DOMINIO_URL_EMPRESA.' que un usuario que conecta con facebook puede seleccionar compartir con el resto de sus amigos que tambi�n han conectado con facebook en '.DOMINIO_URL_EMPRESA.', es:');
		$textos['parrafo_1_seccion_10_4']=$translator->TraducirTexto('1) Anuncios de inmuebles que ha publicado para que sus amigos puedan ayudarle a difundirlo.');
		$textos['parrafo_1_seccion_10_5']=$translator->TraducirTexto('2) Anuncios escogidos como favoritos para que sus amigos punt�en y comenten.');
		$textos['parrafo_1_seccion_10_6']=$translator->TraducirTexto('3) Comentarios y puntuaciones sobre los favoritos de sus amigos (visibles para todos los amigos en com�n).');
		$textos['parrafo_1_seccion_10_7']=$translator->TraducirTexto('4) B�squedas guardadas para recibir novedades por e-mail (ej. �me interesan pisos en alquiler en venta en Pozuelo de Alarc�n de al menos 60 m2�). Adem�s, si el usuario as� lo desea tambi�n se le da la oportunidad de publicar en facebook dichas acciones. Por ejemplo, despu�s de publicar un piso en '.DOMINIO_URL_EMPRESA.' puede escoger publicar una historia en facebook del tipo: �he puesto en venta un piso en '.DOMINIO_URL_EMPRESA.', �me ayudas a correr la voz?� El apartado Tu actividad de '.DOMINIO_URL_EMPRESA.' permite al usuario consultar toda su actividad y elegir que informaci�n desea compartir con el resto de sus amigos. Por defecto no compartir� nada de su historial de acciones en el portal. En ning�n momento ni facebook ni Fotocasa comparten ning�n tipo de informaci�n privada sobre sus usuarios y su �nica finalidad es la establecida en las presentes condiciones generales.');
		// Secci�n 11
		$textos['titulo_seccion_11']=$translator->TraducirTexto("11. Duraci�n y terminaci�n");
		$textos['parrafo_1_seccion_11']=$translator->TraducirTexto('La prestaci�n de los servicios y/o contenidos del Portal tiene una duraci�n indefinida. Sin perjuicio de lo anterior, y de acuerdo con la cl�usula 8 de las presentes Condiciones Generales, '.NOMBRE_EMPRESA.', est� facultada para dar por terminada, suspender o interrumpir unilateralmente, en cualquier momento y sin necesidad de preaviso, la prestaci�n del servicio y del Portal y/o de cualquiera de los servicios, sin perjuicio de lo que se hubiera dispuesto al respecto en las correspondientes condiciones particulares.');
		// Secci�n 12
		$textos['titulo_seccion_12']=$translator->TraducirTexto("12. Ley y jurisdicci�n");
		$textos['parrafo_1_seccion_12']=$translator->TraducirTexto('Todas las cuestiones relativas al Portal se rigen por las Leyes del Reino de Espa�a y se someten a la jurisdicci�n del domicilio del Usuario. En el caso de que el Usuario tenga su domicilio fuera de Espa�a, '.NOMBRE_EMPRESA.' y el Usuario se someten, con renuncia expresa a cualquier otro fuero, a los juzgados y tribunales de la ciudad de C�diz (Espa�a).');
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'buscador/condiciones_uso.php');
	}
?>