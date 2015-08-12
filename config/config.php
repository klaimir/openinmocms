<?php
    error_reporting(E_ALL ^ E_NOTICE);
	session_start();
	// Rutas para include
	define('PATHINCLUDE_FRAMEWORK', $_SERVER['DOCUMENT_ROOT'].'/gesticadiz/');
	// Adición de ruta include para imágenes
	define('PATHINCLUDE_FRAMEWORK_IMG', PATHINCLUDE_FRAMEWORK.'media/img/');
    // Adición de ruta include para languages
	define('PATHINCLUDE_FRAMEWORK_LANGUAGE', PATHINCLUDE_FRAMEWORK.'language/');
	// Adición de ruta include para documentos
	define('PATHINCLUDE_FRAMEWORK_DOC', PATHINCLUDE_FRAMEWORK.'docs/');
	// Adición de ruta include para media
	define('PATHINCLUDE_FRAMEWORK_MEDIA', PATHINCLUDE_FRAMEWORK.'media/');
	// Adición de ruta include para html
	define('PATHINCLUDE_FRAMEWORK_MEDIA_HTML', PATHINCLUDE_FRAMEWORK_MEDIA.'html/');
	// Adición de ruta include para scripts
	define('PATHINCLUDE_FRAMEWORK_SCRIPTS', PATHINCLUDE_FRAMEWORK.'scripts/');
	// Adición de ruta include para app
	define('PATHINCLUDE_FRAMEWORK_APP', PATHINCLUDE_FRAMEWORK.'app/');
	// Adición de ruta include para librerías
	define('PATHINCLUDE_FRAMEWORK_LIBRERIAS', PATHINCLUDE_FRAMEWORK.'librerias/');
	// Adición de ruta include para módulos
	define('PATHINCLUDE_FRAMEWORK_MODULOS', PATHINCLUDE_FRAMEWORK.'modulos/');
	// Adición de ruta include para modelos
	define('PATHINCLUDE_FRAMEWORK_MODELOS', PATHINCLUDE_FRAMEWORK.'modelos/');
	// Adición de ruta include para configuración
	define('PATHINCLUDE_FRAMEWORK_CONFIG', PATHINCLUDE_FRAMEWORK.'config/');
	// Adición de key para interacción con google maps
	define('PATHINCLUDE_KEY_GOOGLE_MAPS', "AIzaSyCVeNG5XiGj--htp-gk_7zu2bzgQ44VmvI");
	// Adición de ruta para fuentes PDF
	define('FPDF_FONTPATH',PATHINCLUDE_FRAMEWORK.'librerias/fpdf/font/');
	// Correo del administrador
	define('CORREO_ADMINISTRADOR_FRAMEWORK', "gesticadiz@gmail.com");
	// VALORES PARA RSS
	// title
	define('TITLE_RSS_FRAMEWORK', 'Noticias de Gesticadiz Inmobiliaria');
	// link
	define('LINK_RSS_FRAMEWORK', '<?php echo  URL_EMPRESA; ?>');
	// description
	define('DESCRIPTION_RSS_FRAMEWORK', 'Últimas noticias publicadas');
	// copyright
	define('COPYRIGHT_RSS_FRAMEWORK', 'Gesticadiz.es');
	// IVA
	define('IVA_FACTURAS_FRAMEWORK', '21.0');
	// Porcentaje de comisión
	define('PORCENTAJE_COMISION_FACTURAS_FRAMEWORK', '2.0');
	// Tamaño máximo para ficheros adjuntos (general)
	define('MAXTAM_FICHADJUNT', 2);
	// Tamaño máximo para video
	define('MAXTAM_VIDEOS', 50);
	define('MB', 1048576);
	// Tamaño máximo para sesión
	define('TIEMPO_ACCESO_SESION', 3600);
	// Colores de correos
	define('COLORES_CORREOS_CAMPOS', "#FF8080");
	define('COLORES_CORREOS_CABECERA', "#2D73AC");
	// Datos de configuración de la empresa
	define('NOMBRE_EMPRESA', "GESTICADIZ");
	define('URL_EMPRESA', "http://www.gesticadiz.es");
	define('DOMINIO_URL_EMPRESA', "gesticadiz.es");
	// Rutas de aplicación
	$ruta_raiz=$_SESSION['rutaraiz']="http://".$_SERVER['SERVER_NAME']."/gesticadiz/";
	$_SESSION['rutaimg'] = $ruta_raiz."media/img/";
	$_SESSION['rutacss'] = $ruta_raiz."media/css/";
	$_SESSION['rutajs'] =  $ruta_raiz."media/js/";
	$_SESSION['rutadocs'] =  $ruta_raiz."docs/";
	$_SESSION['rutalibs'] =  $ruta_raiz."librerias/";
    // Rutas de bootstrap
    $_SESSION['rutacssbootstrap'] = $ruta_raiz."media/bootstrap-3.3.2-dist/css/";
    // Librerías para bootstrap
	require_once(PATHINCLUDE_FRAMEWORK_MEDIA.'InterfazBootStrap.class.php');
	// Librerías por defecto
	require_once(PATHINCLUDE_FRAMEWORK_MEDIA.'Interfaz.class.php');
	require_once(PATHINCLUDE_FRAMEWORK_MEDIA.'modulomedia.php');
	require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Session.class.php');
?>