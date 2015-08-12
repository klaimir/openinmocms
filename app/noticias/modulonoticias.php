<?php
	function rss()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducci�n
		$translator = Translator::getInstance();
		// Traducci�n de textos
		$textos['parrafo1']=$translator->TraducirTexto('Los canales RSS de '.NOMBRE_EMPRESA.' le permiten agregar noticias en su sitio del modo que le resulte m�s conveniente.');
		$textos['titulo1']=$translator->TraducirTexto('�Qu� es el RSS?');
		$textos['parrafo2']=$translator->TraducirTexto('El RSS ("Really Simple Syndication") es un formato que permite emitir contenidos desde un sitio para que sean agregados f�cilmente en aplicaciones o sitios web. Los contenidos que se publican en este formato incluyen titulares y sumarios.');
		$textos['titulo1']=$translator->TraducirTexto('Modo de uso');
		$textos['parrafo3'].=$translator->TraducirTexto('Se accede a este servicio a trav�s de programas conocidos como "Lectores de noticias", que organizan, actualizan y muestran el contenido de los canales.');
		$textos['parrafo3'].=$translator->TraducirTexto(' Para agregar canales, se debe ingresar la url del canal deseado en los programas lectores. Se pueden crear grupos de canales, agrupando todas las secciones del diario bajo un mismo grupo.');
		$textos['parrafo4']=$translator->TraducirTexto('Existe la posibilidad de agregar canales desde buscadores como BlogStreet, y NewsIsFree.');
		$textos['canal']=$translator->TraducirTexto('�ltimas noticias de '.NOMBRE_EMPRESA);
		$textos['titulo_seccion']=$translator->TraducirTexto("Noticias");
		// Obtenemos el idioma de traducci�n
		$idioma_rss=$translator->GetIdiomaDestino();
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/rss.php');
	}
?>
<?php
	function noticias()
	{
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'noticias/index.php');
	}
?>