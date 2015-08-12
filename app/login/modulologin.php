<?php
	function login()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Campos
		$campos['usuario']=$translator->TraducirTexto("Usuario");
		$campos['password']=$translator->TraducirTexto("Contraseña");
		// Textos
		$textos['titulo_seccion']=$translator->TraducirTexto("Acceso ".NOMBRE_EMPRESA."");
		$textos['problemas_acceso']=$translator->TraducirTexto("Problemas de acceso al sistema");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'login/index.php');
	}
?>
<?php
	function login_mantenimiento()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Textos
		$textos['texto']=$translator->TraducirTexto("En estos momentos estamos realizando tareas de mantenimiento. Disculpen las molestias.");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'login/login_mantenimiento.php');
	}
?>
<?php
	function recordar_password()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Campos
		$campos['usuario']=$translator->TraducirTexto("Usuario");
		$campos['enviar_informacion']=$translator->TraducirTexto("Enviar información");
		// Textos
		$textos['titulo_seccion']=$translator->TraducirTexto("Problemas de acceso al sistema");
		$textos['parrafo1']=$translator->TraducirTexto("Si ha olvidado o extraviado su contraseña de acceso a ".NOMBRE_EMPRESA.", rellene el siguiente formulario introduciendo su nombre de usuario.");
		$textos['parrafo2']=$translator->TraducirTexto("Automáticamente, se le enviará un e-mail a la dirección almacenada en ".NOMBRE_EMPRESA." con una nueva contraseña para su cuenta.");
		$textos['informe_errores']=$translator->TraducirTexto("Informe de errores");
		$textos['errores_encontrados']=$translator->TraducirTexto("errores encontrados");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'login/recordar_password.php');
	}
?>
<?php
	function confirmacion_recordar_password()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Textos
		$textos['titulo_seccion']=$translator->TraducirTexto("Confirmación de datos de acceso a ".NOMBRE_EMPRESA."");
		$textos['parrafo1']=$translator->TraducirTexto("El sistema ha enviado un e-mail con una nueva contraseña de acceso a su cuenta");
		$textos['parrafo2']=$translator->TraducirTexto("Revise su cuenta de correo electr&oacute;nico y acceda con los datos que se indican en el mismo.");
		$textos['acceder']=$translator->TraducirTexto("Acceder a ".NOMBRE_EMPRESA);
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'login/confirmacion_recordar_password.php');
	}
?>
<?php
	function desconectar()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Textos
		$textos['titulo_seccion']=$translator->TraducirTexto("Desconectar");
		$textos['parrafo1']=$translator->TraducirTexto("Cerrando sesión con ".NOMBRE_EMPRESA.". Por favor espere");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'login/desconectar.php');
	}
?>
<?php
	function noacceso()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Textos
		$textos['titulo_seccion']=$translator->TraducirTexto("Acceso Restringido");
		$textos['parrafo1_parte1']=$translator->TraducirTexto("Acceso restringido. Para acceder al aplicativo es necesario validarse mediante usuario y contraseña pulsando");
		$textos['parrafo1_parte2']=$translator->TraducirTexto("aquí");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'login/noacceso.php');
	}
?>