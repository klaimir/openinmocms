<?php
	function certificacion_energetica()
	{
		// Translator
		require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS.'Translator.class.php');
		// Par de traducci�n
		$translator = Translator::getInstance();
		// Traducci�n de textos
		$textos['titulo1']=$translator->TraducirTexto('DOCUMENTO DE INFORMACI�N SOBRE EL REAL DECRETO 235/2013, DE 5 DE ABRIL, POR EL QUE SE APRUEBA EL PROCEDIMIENTO B�SICO PARA LA CERTIFICACI�N DE LA EFICIENCIA ENERG�TICA DE LOS EDIFICIOS.');
		$textos['parrafo1']=$translator->TraducirTexto('El pasado 13 de abril se ha publicado en el BOE el Real Decreto 235/2013, de 5 de abril, por el que se aprueba el procedimiento b�sico para la Certificaci�n de la Eficiencia Energ�tica de los edificios.');
		$textos['parrafo2']=$translator->TraducirTexto('Todo inmueble que se construya, venda o alquile (edificios o unidades de �stos), en   toda oferta, promoci�n y publicidad dirigida a la venta o arrendamiento, deber� aparecer la etiqueta energ�tica a partir del 1 de junio de 2013.');
		$textos['parrafo3'].=$translator->TraducirTexto('La Certificaci�n de la Eficiencia Energ�tica o una copia de �sta se deber� mostrar al comprador o nuevo arrendatario potencial y se entregar� al comprador o nuevo arrendatario, en los t�rminos que se establecen en el Procedimiento b�sico. Adem�s, este real decreto contribuye a informar de las emisiones de CO2 en el sector residencial.');
		$textos['titulo2']=$translator->TraducirTexto('A RESALTAR DEL REAL DECRETO');
		$textos['titulo3']=$translator->TraducirTexto('Art�culo 2. �mbito de aplicaci�n.');
		$textos['parrafo4'].=$translator->TraducirTexto('Este Procedimiento b�sico ser� de aplicaci�n a:
	   a) Edificios de nueva construcci�n.
	   b) Edificios o partes de edificios existentes que se vendan o alquilen a un nuevo arrendatario, siempre que no dispongan de un certificado en vigor.
	   c) Edificios o partes de edificios en los que una autoridad p�blica ocupe una superficie �til total superior a 250 m2 y que sean frecuentados habitualmente por el p�blico.
');
		$textos['parrafo5']=$translator->TraducirTexto('Exclusiones. 
	   a) Edificios y monumentos protegidos oficialmente.
	   b) Lugares de culto y para actividades religiosas.
	   c) Construcciones provisionales (hasta dos a�os).
	   d) Edificios industriales, de la defensa y agr�colas o partes de los mismos, en la parte destinada a talleres, procesos industriales, de la defensa y agr�colas no residenciales.
	   e) Los de una superficie �til total inferior a 50 m2.
	   f) Los que se compren para reformas importantes o demolici�n.
	   g) Edificios para viviendas existentes (o partes de ellos), con uso inferior a cuatro meses al a�o, o si tienen un consumo previsto de energ�a inferior al 25% del normal anual, seg�n declaraci�n responsable de su propietario.
');
		$textos['titulo4']=$translator->TraducirTexto('Art�culo 5. Certificaci�n de la eficiencia energ�tica de un edificio.');
		$textos['parrafo6'].=$translator->TraducirTexto('El responsable de encargarlo y de conservarlo es el promotor o propietario del edificio o de parte del mismo, ya sea de nueva construcci�n o existente, en los casos que venga obligado por este real decreto. Debe presentarlo al �rgano competente de la Comunidad Aut�noma, para su registro. Las autoridades lo pueden pedir al propietario o al Presidente de la Comunidad y debe de incorporarse al Libro del edificio.');
		$textos['titulo5']=$translator->TraducirTexto('Art�culo 12. Etiqueta de Eficiencia Energ�tica.');
		$textos['parrafo7'].=$translator->TraducirTexto('La etiqueta se incluir� en toda oferta, promoci�n y publicidad dirigida a la venta o arrendamiento del edificio o unidad del edificio. Deber� figurar siempre en la etiqueta, de forma clara e inequ�voca, si se refiere al certificado de eficiencia energ�tica del proyecto o al del edificio terminado.');
		$textos['titulo6']=$translator->TraducirTexto('Art�culo 18. Infracciones y sanciones');
		$textos['parrafo8'].=$translator->TraducirTexto('El incumplimiento de los preceptos contenidos en este procedimiento b�sico, se considerar� en todo caso como infracci�n en materia de certificaci�n de la eficiencia energ�tica de los edificios y se sancionar� de acuerdo con lo dispuesto en las normas de rango legal que resulten de aplicaci�n. Ser� complementaria a las ya conocidas de infracci�n de los derechos de consumidores y usuarios.
');
		$textos['titulo_seccion']=$translator->TraducirTexto("Informaci�n sobre Certificaci�n Energ�tica");
		// Interfaz
		include(PATHINCLUDE_FRAMEWORK_MEDIA_HTML.'certificacion_energetica/index.php');
	}
?>