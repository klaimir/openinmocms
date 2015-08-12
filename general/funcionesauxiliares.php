<?php
	/**
	 * Genera el HTML con los datos de acceso
	 *
	 * @param [usuario]		Nick del usuario
	 * @param [password]	password del usuario
	 *
	 * @return string con el HTML generado
	 */
	 
	function datos_acceso_app_correo_html($usuario,$password)
	{		
		$texto_correo = '
		<div style="padding: 2px; text-align: left; width: 600px; border: solid 1px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif">
			<div style="text-align: center; background-color: '.COLORES_CORREOS_CABECERA.';color:white;"><strong>DATOS ACCESO '.NOMBRE_EMPRESA.'</strong></div>
			<div><strong>Usuario:</strong> '.$usuario.'</div >			
			<div style="background-color: '.COLORES_CORREOS_CAMPOS.'"><strong>Contraseña: </strong>'.$password.'</div >
		</div>';
		return $texto_correo;
	}
?>
<?php	
	/**
	 * Genera el HTML con los Datos del remitente del correo
	 *
	 * @param [nombre]		Nombre completo del remitente
	 * @param [correo]		Correo del remitente
	 * @param [asunto]		Texto del asunto
	 * @param [cuerpo]		Texto principal
	 *
	 * @return string con el HTML generado
	 */
	 
	function datos_remitente_correo_html($nombre,$correo,$asunto,$cuerpo)
	{		
		$texto_correo = '
		<div style="padding: 2px; text-align: left; width: 600px; border: solid 1px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif">
			<div style="text-align: center; background-color: '.COLORES_CORREOS_CABECERA.';color:white;"><strong>DATOS DEL SOLICITANTE</strong></div>
			<div><strong>Nombre:</strong> '.$nombre.'</div >			
			<div style="background-color: '.COLORES_CORREOS_CAMPOS.'"><strong>Correo: </strong>'.$correo.'</div >
			<div><strong>Asunto:</strong> '.$asunto.' </div>
			<br />	
			<div>'.$cuerpo.' </div>
		</div>';
		return $texto_correo;
	}
?>
<?php	
	/**
	 * Genera el HTML con los Datos del inmueble especificado
	 *
	 * @param [id]		Identificador del inmueble
	 *
	 * @return string con el HTML generado
	 */
	 
	function datos_inmueble_correo_html($id)
	{		
		// Conexión Base de datos
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php");
		$DB = new Model();		
		// Obtencion de datos		
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble='" . $id . "'";		
		$inmuebles = $DB->Execute($sql) or die($DB->ErrorMsg());
		$inmueble = $inmuebles->FetchRow();
		$texto_correo = '
		<div style="padding: 2px; text-align: left; width: 600px; border: solid 1px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif">
			<div style="text-align: center; background-color: '.COLORES_CORREOS_CABECERA.';color:white;"><strong>DATOS DEL INMUEBLE</strong></div>
			<div style="background-color: '.COLORES_CORREOS_CAMPOS.'"><strong>Provincia: </strong>'.formatear_provincia($inmueble['provincia_inmueble']).'</div >
			<div><strong>Identificador:</strong> '.$inmueble['id_inmueble'].'</div >
			<div style="background-color: '.COLORES_CORREOS_CAMPOS.'"><strong>Región: </strong>'.formatear_region($inmueble['region']).'</div >
			<div><strong>Municipio: </strong>'.formatear_poblacion($inmueble['poblacion_inmueble']).'</div >
			<div style="background-color: '.COLORES_CORREOS_CAMPOS.'"><strong>Zona:</strong> '.formatear_zona($inmueble['zona']).'</div >
			<div><strong>Detalles: </strong><a href="'.$_SESSION['rutaraiz'].'app/buscador/ver_datos_adicionales.php?id='.$inmueble['id_inmueble'].'">Ver Detalles</a></div >		
		</div>';
		return $texto_correo;
	}
?>
<?php	
	/**
	 * Genera el HTML con Asunto del correo
	 *
	 * @param [asunto]			Texto del asunto
	 * @param [cuerpo]			Texto principal
	 * @param [enviado_por]		Nick del usuario que remite el correo
	 *
	 * @return string con el HTML generado
	 */
	 
	function asunto_correo_html($asunto,$cuerpo,$enviado_por=NULL)
	{
		if(!is_null($enviado_por))
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de opciones		
			$sql_usu_abre = "SELECT * FROM usuarios WHERE nick='" . $enviado_por . "'";		
			$usus_abre = $DB->Execute($sql_usu_abre) or die($DB->ErrorMsg());
			$usuario_correo_abre = $usus_abre->FetchRow();
			$num_usus_abre = $usus_abre->RecordCount();
			// Nombre completo
			$nombre_completo_abre=$usuario_correo_abre['apellidos'].", ".$usuario_correo_abre['nombre'];
			$datos_enviado_por=$nombre_completo_abre.' ('.$usuario_correo_abre['correo'].')';
		}
		else
		{
			$datos_enviado_por=NOMBRE_EMPRESA;
		}
		$texto_correo = '
		<div style="padding: 2px; text-align: left; width: 600px; border: solid #004000 1px; font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif">
			<div style="text-align: center; background-color: '.COLORES_CORREOS_CABECERA.'; color:white;"><strong><?php echo  NOMBRE_EMPRESA; ?></strong></div>
			<div style="background-color: '.COLORES_CORREOS_CAMPOS.'">
				<div><strong>De:</strong> '.$datos_enviado_por.'</div>
			</div>
			<div><strong>Asunto:</strong> '.$asunto.' </div>
			<br />	
			<div>'.$cuerpo.' </div>	
		</div>
		<br clear="all">';
		return $texto_correo;
	}
?>
<?php	
	/**
	 * Genera el HTML con Cabecera del correo
	 *
	 *
	 * @return string con el HTML generado
	 */
	 
	function cabecera_correo_html()
	{
		$texto_correo = '
		<p align="center">
			<img src="'.$_SESSION['rutaimg'].'cabecera.png" title="Logo" />
			<h1><a href="'.$_SESSION['rutaraiz'].'app/login/index.php">'. NOMBRE_EMPRESA. '</a></h1>
			</div>
			<br clear="all" />
		</p>';
		return $texto_correo;
	}
?>
<?php	
	/**
	 * Genera el HTML con Pie del correo
	 *
	 *
	 * @return string con el HTML generado
	 */
	 
	function pie_correo_html()
	{
		$texto_correo = '
		<p align="center" style="font-size:12px; font-family:Verdana, Arial, Helvetica, sans-serif">
			Pulse <a style="color:#0000FF" href="'.$_SESSION['rutaraiz'].'app/login/index.php">aquí</a> si desea acceder a '.NOMBRE_EMPRESA.'
		</p>';
		$texto_correo .= '
		<br clear="all"/>
		<div style="color:#666666; font-size:9px; font-family:Verdana, Arial, Helvetica, sans-serif" >
			Este mensaje está dirigido únicamente a su destinatario y es confidencial. Si lo ha recibido por error, '.NOMBRE_EMPRESA.' le informa que su contenido es reservado y su lectura, copia, uso o publicación en cualquier medio no está autorizado.<br />
			'.NOMBRE_EMPRESA.' no garantiza la confidencialidad de los mensajes transmitidos vía internet y se reserva el derecho a ejercer las acciones legales que le correspondan contra todo tercero que acceda o utilice de forma ilegítima al contenido de este mensaje y al de los ficheros contenidos en el mismo.<br />
		</div>';
		return $texto_correo;
	}
?>
<?php
	/**
	 * Obtiene un valor debidamente formateado según el tipo de dato deseado
	 *
	 * @param [theValue]			Valor a procesar
	 * @param [theType]				Tipo de dato
	 * @param [theDefinedValue]		Valor cuando no se define un campo
	 * @param [theNotDefinedValue]	Valor cuando se define un campo
	 *
	 * @return valor formateado
	 */
	 
	function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
	{
		$theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;
		
		switch ($theType) 
		{
			case "text":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;    
			case "long":
			case "int":
			$theValue = ($theValue != "") ? intval($theValue) : "NULL";
			break;
			case "double":
			$theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
			break;
			case "date":
			$theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
			break;
			case "defined":
			$theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
			break;
		}
		return $theValue;
	}
?>
<?php
	/**
	 * Devuelve el navegador sobre el que se ejecuta la aplicación (http://php.net/manual/es/function.get-browser.php)
	 *
	 *
	 * @return String con el tipo de navegador detectado
	 */
	 
	function ObtenerNavegador() 
	{
		$browsers = array("firefox", "msie", "opera", "chrome", "safari", 
                            "mozilla", "seamonkey",    "konqueror", "netscape", 
                            "gecko", "navigator", "mosaic", "lynx", "amaya", 
                            "omniweb", "avant", "camino", "flock", "aol"); 

        $agent = strtolower($_SERVER['HTTP_USER_AGENT']); 
        foreach($browsers as $browser) 
        { 
            if (preg_match("#($browser)[/ ]?([0-9.]*)#", $agent, $match)) 
            { 
                $resultado['name'] = $match[1] ; 
                $resultado['version'] = $match[2] ; 
                break ; 
            } 
        } 
		
		return $resultado;
	}
?>
<?php
	/**
	 * Verifica cual es la sección que se está visualizando y activa el menú correspndiente
	 *
	 * @param [archivo]			Dirección a verificar
	 *
	 * @return void
	 */
	 
	function verificarURL($archivo) 
	{
		$archivo = '/'.$archivo.'/';
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		if(ereg($archivo,$url)) { echo 'class="activo"'; }
	}
?>
<?php
	/**
	 * Obtiene la extensión de un fichero
	 *
	 * @param [filename]		Nombre del fichero
	 *
	 * @return devuelve la extensión del fichero
	 */
	 
	function ObtenerExtensionFichero($filename) 
	{
		return substr(strrchr($filename, '.'), 1);
	}
?>
<?php
	/**
	 * Formatea un número entero añadiéndole n ceros delante
	 *
	 * @param [num_secuencial]		Número secuencial en formato int
	 *
	 * @return Número secuencial formateado
	 */
	 
	function ObtenerNumSecuencialFormateado($num_secuencial) 
	{
		if($num_secuencial < 10)
		{	
			$num_secuencial="000" . $num_secuencial;
		}
		else if($num_secuencial < 100)
		{
			$num_secuencial="00" . $num_secuencial;
		}
		else if($num_secuencial < 1000)
		{
			$num_secuencial="0" . $num_secuencial;
		}
		else if($num_secuencial < 10000) 
		{
			$num_secuencial=$num_secuencial;
		}
		// Devolución
		return $num_secuencial;
	}
?>
<?php
	/**
	 * Convierte un objeto de una consulta a la base de datos en un vector de resultados
	 *
	 * @param [objects]		Objeto resultado de una consulta a la base de datos
	 *
	 * @return vector con los resultados
	 */
	 
	function ObtenerVectorResultados($objects) 
	{
		// Resultados vacíos
		$resultados=array();
		// Número de resultados
		$num_objects = $objects->RecordCount();
		// Si existen resultado
		if($num_objects!=0)
		{
			while ($object = $objects->FetchRow())
			{
			   $resultados[]=$object;
			}
		}
		// Devolución
		return $resultados;
	}
?>
<?php
	/**
	 * Obtiene el valor alfabético del mes
	 *
	 * @param [num]			Número del mes
	 *
	 * @return string con el valor alfabético del mes
	 */
	function obtener_mes($num)
	{
		$valor = $num-1;
		$mes = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'); 
		return $mes[$valor];		
	}
?>
<?php
	/**
	 * Devuelve la fecha en un formato legible
	 *
	 * @param [f]			Fecha en formato de base de datos
	 *
	 * @return string con la fecha en un formato legible
	 */
	 
	function formatea_fecha($f)
	{
		$fecha_aux=explode(" ", $f);
		$trozo_fecha=$fecha_aux[0];
		$trozo_hora=$fecha_aux[1];
		$hora_aux=explode(":", $trozo_hora);
		$hora=$hora_aux[0] . ":" . $hora_aux[1];
		$fecha_aux=explode("-", $trozo_fecha);
		$fecha = $fecha_aux[2] . "/" . $fecha_aux[1] . "/" . $fecha_aux[0];
		$resultado= $fecha . "   " . $hora;
		return $resultado;
	}
?>
<?php
	/**
	 * Devuelve el número de segundo de diferencia entre ambas fechas
	 *
	 * @param [fecha1]			Primera fecha a comparar en formato dd/mm/YYYY
	 * @param [fecha2]			Segunda fecha a comparar en formato dd/mm/YYYY
	 *
	 * @return número de segundo de diferencia entre ambas fechas
	 */
	 
	function compararFechas($primera, $segunda)
	{
		$valoresPrimera = explode ("/", $primera);   
		$valoresSegunda = explode ("/", $segunda); 
		
		$diaPrimera    = $valoresPrimera[0];  
		$mesPrimera  = $valoresPrimera[1];  
		$anyoPrimera   = $valoresPrimera[2]; 
		
		$diaSegunda   = $valoresSegunda[0];  
		$mesSegunda = $valoresSegunda[1];  
		$anyoSegunda  = $valoresSegunda[2];
		
		$diasPrimeraJuliano = gregoriantojd($mesPrimera, $diaPrimera, $anyoPrimera);  
		$diasSegundaJuliano = gregoriantojd($mesSegunda, $diaSegunda, $anyoSegunda);     
		
		if(!checkdate($mesPrimera, $diaPrimera, $anyoPrimera))
		{
			return 0;
		}
		elseif(!checkdate($mesSegunda, $diaSegunda, $anyoSegunda))
		{
			return 0;
		}
		else
		{
			return  $diasPrimeraJuliano - $diasSegundaJuliano;
		}	
	}
?>
<?php
	/**
	 * Devuelve una fecha simple en formato AAAA-MM-DD
	 *
	 * @param [fecha]			Fecha en formato DD/MM/AAAA
	 *
	 * @return fecha simple en formato AAAA-MM-DD
	 */
	 
	function cambiafecha_form($fecha)
	{
		if(is_null($fecha) || $fecha=='')
		{
			$fecha_final=NULL;
		}
		else
		{
			$fecha_temp = explode("/", $fecha);
			$fecha_final = $fecha_temp[2] . "-" . $fecha_temp[1] . "-" . $fecha_temp[0];
		}
		return $fecha_final;
	}
?>
<?php
	/**
	 * Devuelve una fecha simple en formato DD/MM/AAAA
	 *
	 * @param [fecha]			Fecha en formato AAAA-MM-DD
	 *
	 * @return fecha simple en formato DD/MM/AAAA
	 */
	function cambiafecha_bd($fecha)
	{
		if(is_null($fecha) || $fecha=='')
		{
			$fecha_final=NULL;
		}
		else
		{
			$fecha_temp = explode("-", $fecha);
			$fecha_final = $fecha_temp[2] . "/" . $fecha_temp[1] . "/" . $fecha_temp[0];
		}
		return $fecha_final;
	}
?>
<?php
	/**
	 * Devuelve la hora de una fecha
	 *
	 * @param [fecha]			Fecha
	 *
	 * @return String con Horas y minutos
	 */
	 
	function formateahora_bd($hora)
	{
		$hora_temp= explode(":", $hora);
		$hora=$hora_temp[0] . ":" . $hora_temp[1];
		return $hora;
	}
?>
<?php
	/**
	 * Valida si una dirección de correo electrónico tiene un formato válido
	 *
	 * @param [correo]			dirección de correo electrónico
	 *
	 * @return true or false
	 */
	 
	function validarCorreo($correo) 
	{
    	return preg_match('/^.+@(.+\..+)$/', $correo);
	}
?>
<?php
	/**
	 * Devuelve todos los datos de un fichero almacenado en el sistema
	 *
	 * @param [path]			ruta absoluta del fichero
	 *
	 * @return un array con todos las características del fichero
	 */
	 
	function filedata($path)
	{
        // Vaciamos la caché de lectura de disco
        clearstatcache();
        // Comprobamos si el fichero existe
        $data["exists"] = is_file($path);
        // Comprobamos si el fichero es escribible
        $data["writable"] = is_writable($path);
        // Leemos los permisos del fichero
        $data["chmod"] = ($data["exists"] ? substr(sprintf("%o", fileperms($path)), -4) : FALSE);
        // Extraemos la extensión, un sólo paso
        $data["ext"] = substr(strrchr($path, "."),1);
        // Primer paso de lectura de ruta
        $data["path"] = array_shift(explode(".".$data["ext"],$path));
        // Primer paso de lectura de nombre
        $data["name"] = array_pop(explode("/",$data["path"]));
        // Ajustamos nombre a FALSE si está vacio
        $data["name"] = ($data["name"] ? $data["name"] : FALSE);
        // Ajustamos la ruta a FALSE si está vacia
        $data["path"] = ($data["exists"] ? ($data["name"] ? realpath(array_shift(explode($data["name"],$data["path"]))) : realpath(array_shift(explode($data["ext"],$data["path"])))) : ($data["name"] ? array_shift(explode($data["name"],$data["path"])) : ($data["ext"] ? array_shift(explode($data["ext"],$data["path"])) : rtrim($data["path"],"/")))) ;
        // Ajustamos el nombre a FALSE si está vacio o a su valor en caso contrario
        $data["filename"] = (($data["name"] OR $data["ext"]) ? $data["name"].($data["ext"] ? "." : "").$data["ext"] : FALSE);
        // Devolvemos los resultados
        return $data;
	}
?>
<?php
	/**
	 * Borra recursivamente el contenido de un directorio
	 *
	 * @param [dirname]			ruta absoluta del directorio
	 *
	 * @return true or false
	 */
	 
	function full_rmdir($dirname)
	{
        if ($dirHandle = opendir($dirname))
		{
            $old_cwd = getcwd();
            chdir($dirname);

            while ($file = readdir($dirHandle))
			{
                if ($file == '.' || $file == '..') continue;

                if (is_dir($file))
				{
                    if (!full_rmdir($file)) return false;
                }
				else
				{
                    if (!unlink($file)) return false;
                }
            }

            closedir($dirHandle);
            chdir($old_cwd);
            if (!rmdir($dirname)) return false;

            return true;
        }
		else
		{
            return false;
        }
    } 
?>
<?php
	/**
	 * Devuelve una subcadena de un string
	 *
	 * @param [texto]			Cadena a recortar
	 * @param [texto]			Longitud máxima de la cadena recortada
	 *
	 * @return subcadena de un string
	 */
	 
	function cortarTexto($texto, $marcador)
	{
		if(strlen($texto) < $marcador-1) 
		{
			return $texto;
		}
		return substr($texto, 0, $marcador + 1) . " ...";
	}
?>
<?php
	/**
	 * Formatea un texto acorde a varias parámetros de configuración
	 *
	 * @param [texto_entrada]			Cadena con el texto a formatear
	 * @param [tipo_visualizacion]		Parámetro de configuración
	 *
	 * @return texto formateado
	 */
	 
	function formatear_texto($texto_entrada,$tipo_visualizacion="PRIMERA_MAYUSCULA")
	{		
		$texto=$texto_entrada;
		
		switch($tipo_visualizacion)
		{
			case "TODO_MAYUSCULAS": $texto=strtoupper($tipo); break;
			case "TODO_MINUSCULAS": $texto=strtolower($tipo); break;
			case "PRIMERA_MAYUSCULA": $primera_letra=strtoupper($texto[0]); $texto[0]=$primera_letra; break;
			case "PRIMERA_MINUSCULAS": $primera_letra=strtolower($texto[0]); $texto[0]=$primera_letra; break;
			case "PLURAL_MINUSCULAS": $texto=formatear_texto($texto,"TODO_MINUSCULAS"); $texto.="s"; break;
			case "PLURAL_MAYUSCULAS": $texto=formatear_texto($texto,"TODO_MAYUSCULAS"); $texto.="S"; break;
			default:
		}
		
		return $texto;		
	}
?>
<?php
	/**
	 * Obtiene el texto alfabético de un campo check box
	 *
	 * @param [valor_check]			Cadena con el texto a formatear
	 * @param [tipo_visualizacion]		Parámetro de configuración
	 *
	 * @return texto formateado
	 */
	 
	function formatear_ckeck($valor_check,$tipo_visualizacion='PRIMERA_MAYUSCULA')
	{			
		$texto="";
		
		if($valor_check!='')
		{
			if($valor_check==1)
			{
				$texto=formatear_texto("sí",$tipo_visualizacion);
			}
			else
			{
				$texto=formatear_texto("no",$tipo_visualizacion);
			}
		}
		else
		{
			$texto=formatear_texto("no",$tipo_visualizacion);
		}
		
		return $texto;		
	}
?>
<?php
	/**
	 * Obtiene el texto alfabético de la antigüedad de un inmueble
	 *
	 * @param [antiguedad]				Cadena con el texto a formatear
	 * @param [tipo_visualizacion]		Parámetro de configuración
	 *
	 * @return texto formateado
	 */
	 
	function formatear_antiguedad_inmueble($antiguedad,$tipo_visualizacion='PRIMERA_MAYUSCULA')
	{			
		return formatear_tipo_presupuesto($antiguedad,$tipo_visualizacion);		
	}
?>
<?php
	/**
	 * Obtiene el texto alfabético de un tipo de presupuesto
	 *
	 * @param [tipo_presupuesto]		Cadena con el texto a formatear
	 * @param [tipo_visualizacion]		Parámetro de configuración
	 *
	 * @return texto formateado
	 */
	 
	function formatear_tipo_presupuesto($tipo_presupuesto,$tipo_visualizacion='PRIMERA_MAYUSCULA')
	{			
		$texto="";
		
		if($tipo_presupuesto=='nuevo_inmueble')
		{
			$texto=formatear_texto("Nuevo inmueble",$tipo_visualizacion);
		}
		else
		{		
			if($tipo_presupuesto=='inmueble_usado')
			{
				$texto=formatear_texto("Inmueble usado",$tipo_visualizacion);
			}
			else
			{
				$texto="--";
			}
		}
		
		return $texto;		
	}
?>
<?php
	/**
	 * Obtiene el texto alfabético de un la opción del inmueble en un cartel
	 *
	 * @param [opcion_vivienda]			Cadena con el texto a formatear
	 * @param [tipo_visualizacion]		Parámetro de configuración
	 *
	 * @return texto formateado
	 */
	 
	function formatear_opcion_cartel($opcion_vivienda,$tipo_visualizacion='TODO_MAYUSCULAS')
	{			
		$texto="";
		
		if($opcion_vivienda==1)
		{
			$texto=formatear_texto("venta",$tipo_visualizacion);
		}
		else
		{		
			if($opcion_vivienda==2)
			{
				$texto=formatear_texto("alquiler",$tipo_visualizacion);
			}
			else
			{
				$texto="--";
			}
		}
		
		return $texto;		
	}
?>
<?php
	/**
	 * Obtiene el texto alfabético de un tipo de cartel
	 *
	 * @param [tipo_cartel]				Cadena con el texto a formatear
	 * @param [tipo_visualizacion]		Parámetro de configuración
	 *
	 * @return texto formateado
	 */
	 
	function formatear_tipo_cartel($tipo_cartel,$tipo_visualizacion='PRIMERA_MAYUSCULA')
	{			
		$texto="";
		
		if($tipo_cartel!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM tipos_carteles WHERE id_tipo_cartel='".$tipo_cartel."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();	
			$texto=$atrib['nombre_tipo'];
		}
		else
		{
			$texto="--";
		}
		
		return $texto;		
	}
?>
<?php
	/**
	 * Obtiene un dígito de una cuenta
	 *
	 * @param [valor]			Número interno de cuenta
	 *
	 * @return Devuelve el dígito buscado
	 */
	function obtener_digito($valor)
	{
		$valores = array(1, 2, 4, 8, 5, 10, 9, 7, 3, 6);
 		$control = 0;
  		for ($i = 0; $i <= 9; $i++)
    	{
			$control += $valor[$i] * $valores[$i];
		}
  			$control = 11 - ($control % 11);
  			if ($control == 11) $control = 0;
  			else if ($control == 10) $control = 1;
  			return $control;
	}
?>
<?php
	/**
	 * Valida si un numero de cuenta bancaria es correcto
	 *
	 * @param [banco]			Número de banco
	 * @param [sucursal]		Número de sucursal
	 * @param [dc]				Número de dc
	 * @param [cuenta]			Número de cuenta interna
	 *
	 * @return Devuelve un entero con los valores válido (1) o no (-1)
	 */
	function valida_ccc($banco, $sucursal, $dc, $cuenta)
	{
		if(is_null($banco) || is_null($sucursal) || is_null($dc) || is_null($cuenta))
		{
			return -1;
		}
		else
		{
			if (strlen($banco) != 4 || strlen($sucursal) != 4 || strlen($dc) != 2 || strlen($cuenta) != 10)
			{
				return -1;
			}
      		else 
			{
				if (!is_numeric($banco) || !is_numeric($sucursal) || !is_numeric($dc) || !is_numeric($cuenta))
				{
					return -1;
				}
				else 
				{
					if (!(obtener_digito("00" . $banco . $sucursal) == $dc[0]) || 
            !(obtener_digito($cuenta) == $dc[1]))
					{
						return -1;
					}
					else
					{
						return 1;
					}
				}
			}
		}
	}
?>
<?php
	/**
	 * Traspasar la consulta a un vector de resultados
	 *
	 * @param [consulta]		Consulta ejecutada con el método Execute sobre un objeto de tipo Model
	 *
	 * @return array con los resultados
	 */
	 
	function obtener_array_resultados($consulta)
	{			
		$array=array();
		while($row_consulta = $consulta->FetchRow())
		{
			$array[]=$row_consulta;
		}
		return $array;		
	}
?>
<?php
	/**
	 * Redimensiona una fotografía para mostrarla en un formato legible
	 *
	 * @param [ruta_foto]			Ruta absoluta donde está ubicada la fotografía
	 * @param [max_pixels_altura]	Número máximo de pixeles de altura que puede ocupar la fotografía
	 * @param [max_pixels_anchura]	Número máximo de pixeles de anchura que puede ocupar la fotografía
	 *
	 * @return array con los resultados del ancho y el alto de la fotografía redimensionada
	 */
	 
	function redimensionar_fotografia($ruta_foto,$max_pixels_altura=300,$max_pixels_anchura=300)
	{			
		$resultados=array();
		// Se obtiene la dimensión de la fotografía
		$size = GetImageSize($ruta_foto);
		// Se redimensiona porcentualmente
		$anchura=$size[0];		
		$altura=$size[1];
		$proporcion_anchura_altura=$anchura/$altura;
		$proporcion_altura_anchura=$altura/$anchura;
		// Se calcula el máximo número de pixeles a la mayor dimensión
		if($anchura>$altura)
		{
			$resultados['anchura']=$max_pixels_anchura;
			$resultados['altura']=$max_pixels_anchura*$proporcion_altura_anchura;
		}
		else
		{
			$resultados['altura']=$max_pixels_altura;
			$resultados['anchura']=$max_pixels_altura*$proporcion_anchura_altura;
		}
		return $resultados;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un usuario
	 *
	 * @param [usuario]		Nick del usuario
	 * @param [clave]		Campo clave por el cual realizar la búsqueda
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_usuario($usuario,$clave="id_usuario",$origen='ficha')
	{		
		// Unificamos el usuario obtenido
		$usuario=strtolower($usuario); 
		
		if($usuario!="todos" && $usuario!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM usuarios WHERE ".$clave."='".$usuario."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();	
			$texto=$atrib['nombre']." ".$atrib['apellidos'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return formatear_texto($texto,$tipo_visualizacion);		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un usuario
	 *
	 * @param [usuario]		Nick del usuario
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_tipo_contrato_arrendamiento($tipo_contrato_arrendamiento,$origen='ficha')
	{		
		if($tipo_contrato_arrendamiento!="todos" && $tipo_contrato_arrendamiento!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM tipos_arrendamiento WHERE id_tipo_arrendamiento='".$tipo_contrato_arrendamiento."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();	
			$texto=$atrib['nombre_tipo_arrendamiento'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return formatear_texto($texto,$tipo_visualizacion);		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de una comunidad autónoma
	 *
	 * @param [id]			Identificador de la comunidad autónoma
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_comunidad_autonoma($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM comunidades_autonomas WHERE id_comunidad_autonoma='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();			
			$texto=$atrib['nombre_comunidad_autonoma'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de una región
	 *
	 * @param [id]			Identificador de la región
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_region($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM regiones WHERE id_region='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();			
			$texto=$atrib['nombre_region'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un opción
	 *
	 * @param [id]			Identificador del opción
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_opcion($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM opciones WHERE id_opcion='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();
			$texto=$atrib['nombre_opcion'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todas";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el nombre de fichero asociado a un tipo de certificación energética
	 *
	 * @param [id]			Identificador del tipo de certificación energética
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function obtener_logo_certificacion_energetica($id)
	{				
		switch($id)
		{
			case 1: return "A.png";
			case 2: return "B.png";
			case 3: return "C.png";
			case 4: return "D.png";
			case 5: return "E.png";
			case 6: return "F.png";
			case 7: return "G.png";
			default: return "incognita.png";
		}		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un tipo de certificación energética
	 *
	 * @param [id]			Identificador del tipo de certificación energética
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_tipo_certificacion_energetica($id,$origen='ficha')
	{				
		if($id!="")
		{
			if($id=="sin_definir")
			{
				$texto="Sin definir";
			}
			else
			{
				// Conexión Base de datos
				require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
				$DB = new Model();		
				// Obtencion de datos		
				$sql = "SELECT * FROM tipos_certificacion_energetica WHERE id_tipo_certificacion_energetica='".$id."'";		
				$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
				$atrib = $atribs->FetchRow();
				$num_atribs = $atribs->RecordCount();			
				$texto=$atrib['nombre_tipo_certificacion_energetica'];
			}
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un tipo
	 *
	 * @param [id]			Identificador del tipo
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_tipo($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM tipos_inmueble WHERE id_tipo='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();
			$texto=$atrib['nombre_tipo'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todas";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un cliente
	 *
	 * @param [id]			Identificador del cliente
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_cliente($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM clientes WHERE id_cliente='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();
			$texto=$atrib['nombre']." ".$atrib['apellidos'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de una zona
	 *
	 * @param [id_zona]			Identificador del zona
	 * @param [origen]			Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_zona($id_zona,$origen='ficha')
	{				
		if($id_zona!="" && $id_poblacion!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM zonas_poblaciones WHERE id_zona='".$id_zona."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();
			$texto=$atrib['nombre_zona'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todas";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un provincia
	 *
	 * @param [id]			Identificador del provincia
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_provincia($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM provincias WHERE id_provincia='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();	
			$texto=$atrib['provincia'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un mes
	 *
	 * @param [id]			Identificador del mes
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_mes($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM meses WHERE id_mes='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();	
			$texto=$atrib['nombre_mes'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Permite obtener el valor alfabético de un población
	 *
	 * @param [id]			Identificador del población
	 * @param [origen]		Origen de entrada de datos
	 *
	 * @return texto formateado
	 */
	 
	function formatear_poblacion($id,$origen='ficha')
	{				
		if($id!="")
		{
			// Conexión Base de datos
			require_once(PATHINCLUDE_FRAMEWORK_MODELOS."Model.class.php"); 
			$DB = new Model();		
			// Obtencion de datos		
			$sql = "SELECT * FROM poblaciones WHERE id_poblacion='".$id."'";		
			$atribs = $DB->Execute($sql) or die($DB->ErrorMsg());
			$atrib = $atribs->FetchRow();
			$num_atribs = $atribs->RecordCount();	
			$texto=$atrib['poblacion'];
		}
		else
		{
			if($origen=="busqueda")
				$texto="Todos";
			else
				$texto="--";
		}					
		return $texto;		
	}
?>
<?php
	/**
	 * Cambia un número en formato eee.eee.eee,dd a formato anglosajón para almecenarse en la BD
	 *
	 * @param [num]			número en formato eee.eee.eee,dd
	 *
	 * @return Número formateado
	 */
	 
	function formatear_numero($num)
	{		
		$num_original=(string)$num;
		
		for($cont=0;$cont<strlen($num_original);$cont++)
		{
			if($num_original[$cont]!=".")
			{
				if($num_original[$cont]==",")
				{
					$num_original[$cont]=".";
				}
				$num_formateado.=$num_original[$cont];
			}	
		}
						
		return $num_formateado;		
	}
?>
<?php
	/**
	 * Determina la url al cual debe de volver el navegador
	 *
	 *
	 * @return string con la url
	 */
	 
	function enlace_volver_general()
	{	
		if($_POST) return "javascript:history.go(-2);"; else return "javascript:history.go(-1);";
	}
?>
<?php
	/**
	 *  Comprueba si el elemento está contenido dentro del array
	 *
	 * @param [elemento]			Elemento a buscar
	 * @param [elemento]			Array donde buscar
	 *
	 * @return true or false
	 */
	 
	function asignado_array($elemento,$array)
	{
		if (count($array) > 0)
		{
			foreach($array as $elemento_array)
			{
				if($elemento_array==$elemento)
				{ 
					return true;
				}					
			}
		}	
		return false;
	}
?>
<?php
	/**
	 *  Obtiene la url actual con todas sus variables asociadas. Se agradece ceder este código a Jorge Pinedo Rosas (jpinedo) <jorpinedo@yahoo.es>, obtenido de su mágnifica librería paginator
	 *
	 * @return url completa actual
	 */
	 
	function obtenerURLactual() 
	{
		 // La idea es pasar también en los enlaces las variables hayan llegado por url.
		 $_pagi_enlace = $_SERVER['PHP_SELF'];
		 $_pagi_query_string = "?";
		 
		 if(!isset($_pagi_propagar)){
			//Si no se definió qué variables propagar, se propagará todo el $_GET (por compatibilidad con versiones anteriores)
			$_pagi_propagar = array_keys($_GET);
		 }elseif(!is_array($_pagi_propagar)){
			// si $_pagi_propagar no es un array... grave error!
			die("<b>Error Paginator : </b>La variable \$_pagi_propagar debe ser un array");
		 }
		 // Este foreach está tomado de la Clase Paginado de webstudio
		 // (http://www.forosdelweb.com/showthread.php?t=65528)
		 foreach($_pagi_propagar as $var){
			if(isset($GLOBALS[$var])){
				// Si la variable es global al script
				$_pagi_query_string.= $var."=".$GLOBALS[$var]."&";
			}elseif(isset($_REQUEST[$var])){
				// Si no es global (o register globals está en OFF)
				$_pagi_query_string.= $var."=".$_REQUEST[$var]."&";
			}
		 }
		
		 // Añadimos el query string a la url.
		 $_pagi_enlace .= $_pagi_query_string;
		 
		 return $_pagi_enlace;
	}
?>
<?php
	/**
	 *  Genera una cadena aleatoria de caracteres
	 *
	 * @param [DesdeLetra]			Letra de inicio del conjunto de búsqueda
	 * @param [HastaLetra]			Letra de inicio del conjunto de búsqueda
	 * @param [tam]					Tamaño de la cadena de caracteres generada
	 *
	 * @return cadena de caracteres aleatoria
	 */
	 
	function generar_cadena_aleatoria($DesdeLetra,$HastaLetra,$tam)
	{
		$cadenaAleatoria="";
		if($tam>0)
		{
			$cont=0;
			do
			{
				$letraAleatoria = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
				$cadenaAleatoria.=$letraAleatoria;
				$cont++;
			}while($cont!=$tam);
		}
		return $cadenaAleatoria;
	}
?>
<?php	 
	/**
     *  Determina si un NIF/NIE/CIF es válido. Copyright ©2005-2011 David Vidal Serra. Bajo licencia GNU GPL.
     *  
     *
     * @param [cif]			NIF/NIE/CIF
     *
     * @return 1 = NIF ok, 2 = CIF ok, 3 = NIE ok, -1 = NIF bad, -2 = CIF bad, -3 = NIE bad, 0 = ??? bad
     */
    function valida_nif($cif) {
        $cif = strtoupper($cif);
        for ($i = 0; $i < 9; $i ++) {
            $num[$i] = substr($cif, $i, 1);
        }
        
        //si no tiene un formato valido devuelve error
        if (!preg_match('/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            return 0;
        }
        //comprobacion de NIFs estandar
        if (preg_match('/(^[0-9]{8}[A-Z]{1}$)/', $cif)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1)) {
                return 1;
            } else {
                return -1;
            }
        }
        //algoritmo para comprobacion de codigos tipo CIF
        $suma = $num[2] + $num[4] + $num[6];
        for ($i = 1; $i < 8; $i += 2) {
            $suma += substr((2 * $num[$i]), 0, 1) + substr((2 * $num[$i]), 1, 1);
        }
        $n = 10 - substr($suma, strlen($suma) - 1, 1);
        //comprobacion de NIFs especiales (se calculan como CIFs o como NIFs)
        if (preg_match('/^[KLM]{1}/', $cif)) {
            if ($num[8] == chr(64 + $n) || $num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 1, 8) % 23, 1)) {
                return 1;
            } else {
                return -1;
            }
        }
        //comprobacion de CIFs
        if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif)) {
            if ($num[8] == chr(64 + $n) || $num[8] == substr($n, strlen($n) - 1, 1)) {
                return 2;
            } else {
                return -2;
            }
        }
        //comprobacion de NIEs
        if (preg_match('/^[XYZ]{1}/', $cif)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X', 'Y', 'Z'), array('0', '1', '2'), $cif), 0, 8) % 23, 1)) {
                return 3;
            } else {
                return -3;
            }
        }
        //si todavia no se ha verificado devuelve error
        return 0;
    }
?>
<?php
	/**
	 *  Obtiene el texto alfabético del intervalo de precio de compra
	 *
	 * @param [intervalo_precio_compra]			Texto del intervalo de precio de compra
	 *
	 * @return texto formateado
	 */
	 
	function formatear_intervalo_precio_compra($intervalo_precio_compra)
	{
		switch($intervalo_precio_compra)
		{
			case 'menos_120':	
				$texto="Menos de 120.000 €";											
				break;
			case '120_180':	
				$texto="120.000 - 180.000 €";											
				break;
			case '180_240':	
				$texto="180.000 - 240.000 €";											
				break;
			case 'mas_240':	
				$texto="Más de 240.000 €";											
				break;
			default:
				$texto="No seleccionado";
		}
		return $texto;
	}
?>
<?php
	/**
	 *  Obtiene el texto alfabético del intervalo de precio de alquiler
	 *
	 * @param [intervalo_precio_alquiler]			Texto del intervalo de precio de alquiler
	 *
	 * @return texto formateado
	 */
	 
	function formatear_intervalo_precio_alquiler($intervalo_precio_alquiler)
	{
		switch($intervalo_precio_alquiler)
		{
			case 'menos_400':	
				$texto="Menos de 400 €";											
				break;
			case '400_600':	
				$texto="400 - 600 €";											
				break;
			case '600_800':	
				$texto="600 - 800 €";											
				break;
			case 'mas_800':	
				$texto="Más de 800 €";											
				break;
			default:
				$texto="No seleccionado";
		}
		return $texto;
	}
?>
<?php
	/**
	 *  Obtiene el texto alfabético del tipo de un cliente
	 *
	 * @param [tipo]			Texto del tipo de un cliente
	 *
	 * @return texto formateado
	 */
	 
	function formatear_tipo_cliente($tipo)
	{
		switch($tipo)
		{
			case 'visitante':	
				$texto="Visitante";											
				break;
			case 'vendedor':	
				$texto="Vendedor";											
				break;
			default:
				$texto="No seleccionado";
		}
		return $texto;
	}
?>
<?php
	/**
	 *  Obtiene el texto alfabético de una opción de un cliente
	 *
	 * @param [opcion]			opción del cliente
	 *
	 * @return texto formateado
	 */
	 
	function formatear_opciones_cliente($opcion)
	{
		switch($opcion)
		{
			case 'busca_vender':	
				$texto="Desea vender";											
				break;
			case 'busca_comprar':	
				$texto="Busca comprar";											
				break;
			case 'busca_alquilar':	
				$texto="Desea alquilar";											
				break;
			case 'busca_alquiler':	
				$texto="Busca un alquiler";											
				break;
			default:
				$texto="No seleccionado";
		}
		return $texto;
	}
?>
<?php
	/**
	 *  Elimina caracteres extraños que me pueden molestar en las cadenas que meto en los item de los RSS
	 *
	 * @param [str]			String a formatear
	 *
	 * @return texto formateado
	 */
	 
	function clrAll($str) 
	{
		$str=str_replace("&","&",$str);
		$str=str_replace('"','"',$str);
		$str=str_replace("'","'",$str);
		$str=str_replace(">",">",$str);
		$str=str_replace("<","<",$str);
		return $str;
	}
?>
<?php
	/**
	 *  Ejecuta un comando en consola
	 *
	 * @param [comando]			Comando a ejecutar
	 *
	 * @return Múltiple. Salida del comando de consola ejecutado
	 */
	 
	function ejecutar($comando)
	{
		//shell_exec($comando, $salida);
		exec($comando, $salida);
		//passthru($comando, $salida);
		//system($comando, $salida);
		return $salida;
	}
?>
<?php
	/**
	 *  Elimina recursivamente directorios. fuente: http://es.php.net/unlink
	 *
	 * @param [fileglob]		Ruta absoluta del directorio
	 *
	 * @return true or false
	 */
	 
	function rm($fileglob)
	{
	   if (is_string($fileglob)) {
		   if (is_file($fileglob)) {
			   return unlink($fileglob);
		   } else if (is_dir($fileglob)) {
			   $ok = rm("$fileglob/*");
			   if (! $ok) {
				   return false;
			   }
			   return rmdir($fileglob);
		   } else {
			   $matching = glob($fileglob);
			   if ($matching === false) {
				   trigger_error(sprintf('No files match supplied glob %s', $fileglob), E_USER_WARNING);
				   return false;
			   }
			   $rcs = array_map('rm', $matching);
			   if (in_array(false, $rcs)) {
				   return false;
			   }
		   }
	   } else if (is_array($fileglob)) {
		   $rcs = array_map('rm', $fileglob);
		   if (in_array(false, $rcs)) {
			   return false;
		   }
	   } else {
		   trigger_error('Param #1 must be filename or glob pattern, or array of filenames or glob patterns', E_USER_ERROR);
		   return false;
	   } 
	 
	   return true;
	}
    
    /**
	 *  Parsea un HTML en un documento PDF que se almacena en una ruta o se muestra en la salida estándar
	 *
	 * @param [html]            Código HTML a parsear
     * @param [filename]		Ruta donde se generará el fichero
     * @param [stream]          Indica si se muestra en la salida estándar o no
	 *
	 * @return true or false
	 */
    
    function pdf_create($html, $filename='', $stream=TRUE) 
    {
        require_once(PATHINCLUDE_FRAMEWORK_LIBRERIAS."dompdf/dompdf_config.inc.php");

        $dompdf = new DOMPDF();
        $dompdf->load_html($html);
        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename.".pdf");
        } else {
            return $dompdf->output();
        }
    }
    
    function show_error($text)
    {
        echo $text;
    }
    
    /**
    * CSV Helpers
    * Inspiration from PHP Cookbook by David Sklar and Adam Trachtenberg
    * 
    * @author		Jérôme Jaglale
    * @link		http://maestric.com/en/doc/php/codeigniter_csv
    */

   // ------------------------------------------------------------------------

   /**
    * Array to CSV
    *
    * download == "" -> return CSV string
    * download == "toto.csv" -> download file toto.csv
    */
    function array_to_csv($array, $download = "")
    {
        if ($download != "")
        {	
            header('Content-Type: application/csv');
            header('Content-Disposition: attachement; filename="' . $download . '"');
        }		

        ob_start();
        $f = fopen('php://output', 'w') or show_error("Can't open php://output");
        $n = 0;		
        foreach ($array as $line)
        {
            $n++;
            if ( ! fputcsv($f, $line,';'))
            {
                show_error("Can't write line $n: $line");
            }
        }
        fclose($f) or show_error("Can't close php://output");
        $str = ob_get_contents();
        ob_end_clean();

        if ($download == "")
        {
            return $str;	
        }
        else
        {	
            echo $str;
        }		
    }
?>
<?php /**************************** BASES DE DATOS *****************************************/ ?>
<?php
	/**
	 *  Función para seleccionar base de datos
	 *
	 * @param [database]		Base de datos seleccionada
	 * @param [conexion]		Link de conexión
	 *
	 * @return void
	 */
	 
	function select_db($database, $conexion)
	{
		mysql_select_db($database, $conexion);
	}
?>
<?php
	/**
	 *  Función para realizar consultas
	 *
	 * @param [sql]				Sql de la consulta
	 * @param [conexion]		Link de conexión
	 *
	 * @return Object
	 */
	 
	function do_query_db($sql, $conexion)
	{
		return mysql_query($sql, $conexion);
	}
?>
<?php
	/**
	 *  Función para obtener errores en operaciones con la base de datos
	 *
	 *
	 * @return Texto de error
	 */
	 
	function get_error_db()
	{
		return mysql_error();
	}
?>
<?php
	/**
	 *  Función para obtener número de filas
	 *
	 * @param [rows]			Array asociativo producto de haber ejecutado previamente do_query_db()
	 *
	 * @return Numero de filas
	 */
	 
	function get_num_rows_db($rows)
	{
		return mysql_num_rows($rows);
	}
?>
<?php
	/**
	 *  Función para obtener datos de filas
	 *
	 * @param [rows]			Array asociativo producto de haber ejecutado previamente do_query_db()
	 *
	 * @return Array con los datos de una fila
	 */
	 
	function fetch_assoc_rows_db($rows)
	{
		return mysql_fetch_assoc($rows);
	}
?>
<?php
	/**
	 *  Función para conectar con la base de datos
	 *
	 * @param [hostname]			Nombre del Host
	 * @param [username]			Nombre de usuario de la BD
	 * @param [password]			Contraseña de la BD
	 *
	 * @return true or false
	 */
	 
	function connect_db($hostname, $username, $password)
	{
		return mysql_connect($hostname, $username, $password);
	}
?>