<?php
	function certificacion_energetica()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducción
		$translator = Translator::getInstance();
		// Traducción de textos
		$textos['titulo1']=$translator->TraducirTexto('DOCUMENTO DE INFORMACIÓN SOBRE EL REAL DECRETO 235/2013, DE 5 DE ABRIL, POR EL QUE SE APRUEBA EL PROCEDIMIENTO BÁSICO PARA LA CERTIFICACIÓN DE LA EFICIENCIA ENERGÉTICA DE LOS EDIFICIOS.');
		$textos['parrafo1']=$translator->TraducirTexto('El pasado 13 de abril se ha publicado en el BOE el Real Decreto 235/2013, de 5 de abril, por el que se aprueba el procedimiento básico para la Certificación de la Eficiencia Energética de los edificios.');
		$textos['parrafo2']=$translator->TraducirTexto('Todo inmueble que se construya, venda o alquile (edificios o unidades de éstos), en   toda oferta, promoción y publicidad dirigida a la venta o arrendamiento, deberá aparecer la etiqueta energética a partir del 1 de junio de 2013.');
		$textos['parrafo3'].=$translator->TraducirTexto('La Certificación de la Eficiencia Energética o una copia de ésta se deberá mostrar al comprador o nuevo arrendatario potencial y se entregará al comprador o nuevo arrendatario, en los términos que se establecen en el Procedimiento básico. Además, este real decreto contribuye a informar de las emisiones de CO2 en el sector residencial.');
		$textos['titulo2']=$translator->TraducirTexto('A RESALTAR DEL REAL DECRETO');
		$textos['titulo3']=$translator->TraducirTexto('Artículo 2. Ámbito de aplicación.');
		$textos['parrafo4'].=$translator->TraducirTexto('Este Procedimiento básico será de aplicación a:
	   a) Edificios de nueva construcción.
	   b) Edificios o partes de edificios existentes que se vendan o alquilen a un nuevo arrendatario, siempre que no dispongan de un certificado en vigor.
	   c) Edificios o partes de edificios en los que una autoridad pública ocupe una superficie útil total superior a 250 m2 y que sean frecuentados habitualmente por el público.
');
		$textos['parrafo5']=$translator->TraducirTexto('Exclusiones. 
	   a) Edificios y monumentos protegidos oficialmente.
	   b) Lugares de culto y para actividades religiosas.
	   c) Construcciones provisionales (hasta dos años).
	   d) Edificios industriales, de la defensa y agrícolas o partes de los mismos, en la parte destinada a talleres, procesos industriales, de la defensa y agrícolas no residenciales.
	   e) Los de una superficie útil total inferior a 50 m2.
	   f) Los que se compren para reformas importantes o demolición.
	   g) Edificios para viviendas existentes (o partes de ellos), con uso inferior a cuatro meses al año, o si tienen un consumo previsto de energía inferior al 25% del normal anual, según declaración responsable de su propietario.
');
		$textos['titulo4']=$translator->TraducirTexto('Artículo 5. Certificación de la eficiencia energética de un edificio.');
		$textos['parrafo6'].=$translator->TraducirTexto('El responsable de encargarlo y de conservarlo es el promotor o propietario del edificio o de parte del mismo, ya sea de nueva construcción o existente, en los casos que venga obligado por este real decreto. Debe presentarlo al órgano competente de la Comunidad Autónoma, para su registro. Las autoridades lo pueden pedir al propietario o al Presidente de la Comunidad y debe de incorporarse al Libro del edificio.');
		$textos['titulo5']=$translator->TraducirTexto('Artículo 12. Etiqueta de Eficiencia Energética.');
		$textos['parrafo7'].=$translator->TraducirTexto('La etiqueta se incluirá en toda oferta, promoción y publicidad dirigida a la venta o arrendamiento del edificio o unidad del edificio. Deberá figurar siempre en la etiqueta, de forma clara e inequívoca, si se refiere al certificado de eficiencia energética del proyecto o al del edificio terminado.');
		$textos['titulo6']=$translator->TraducirTexto('Artículo 18. Infracciones y sanciones');
		$textos['parrafo8'].=$translator->TraducirTexto('El incumplimiento de los preceptos contenidos en este procedimiento básico, se considerará en todo caso como infracción en materia de certificación de la eficiencia energética de los edificios y se sancionará de acuerdo con lo dispuesto en las normas de rango legal que resulten de aplicación. Será complementaria a las ya conocidas de infracción de los derechos de consumidores y usuarios.
');
		$textos['titulo_seccion']=$translator->TraducirTexto("Información sobre Certificación Energética");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'certificacion_energetica/index.php');
	}
?>