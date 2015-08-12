<?php
/*
Translator.class.php, v 2.4 2013/05/13

Translator - Clase para traducir textos entre varios idiomas de forma dinámica

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

// No son necesarias clases auxiliares

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* Translator
*
* Clase para traducir textos entre varios idiomas de forma dinámica
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Translator.class.php, v 2.4 2013/05/13
* @access   public
*/

class Translator
{
    private $langpair;			// Cadena que representa el origen y destino de lenguajes para traducción (Por ejemplo es|en)
	private static $instancia;	// Representa la instacia de la clase con el patrón Singleton
	private $seccion;			// Fichero de lenguaje explícito que se carga
    
	/**
	 * Constructor
	 *
	 */
	
	private function __construct()
    {
		if(!isset($_SESSION['langpair']))
			$this->langpair="es|es";
		else
			$this->langpair=$_SESSION['langpair'];
    }
	
	/**
	 * Devuelve la única instancia de la clase
	 *
	 * @return Object Translator con la instancia de la clase
	 *
	 */
	 
	public static function getInstance()
	{
		if (!self::$instancia instanceof self)
		{
			self::$instancia = new self;
		}
		return self::$instancia;
	}
	
	/**
	 * Establece el tipo de traducción deseada
	 *
	 * @param [langpair]		Cadena que representa el par de traducción
	 *
	 * @return void
	 */
	function SetLangPair($langpair) 
	{  
		$_SESSION['langpair']=$langpair;
		$this->langpair=$_SESSION['langpair'];
   }
   
   /**
	 * Devuelve las siglas del idioma origen
	 *
	 *
	 * @return cadena con las siglas del idioma origen
	 */
	function GetIdiomaOrigen() 
	{  
		$langpair=substr($this->langpair,0,2);
		return $langpair;
	}
	
	/**
	 * Devuelve las siglas del idioma destino
	 *
	 *
	 * @return cadena con las siglas del idioma destino
	 */
	function GetIdiomaDestino() 
	{  
		$langpair=substr($this->langpair,3,2);
		return $langpair;
	}

	/**
	 * Realiza la consulta de un texto completo en el lenguaje indicado
	 *
	 * @param [text]		Texto a traducir
	 *
	 * @return string con la traducción al lenguaje indicado
	 */
	function TraducirTexto($text) 
	{  
		if($this->langpair=="es|es" || !isset($this->langpair))
		{
	  		$traduccion=$text;
		}
		else
		{
            $origen=$this->GetIdiomaOrigen();
            $destino=$this->GetIdiomaDestino();
            return $this->ConsultaTranslateMicrosoft($text,$origen,$destino);
            /*
			if(strpos($text,"."))
			{
				// Cada frase debe traducirse por separado por puntos
				$texto_separado_puntos=explode(".",$text);
				// Por cada frase
				for($i=0;$i<count($texto_separado_puntos);$i++)
				{
					if(strpos($texto_separado_puntos[$i],","))
					{
						// Cada frase debe traducirse por separado por comas
						$texto_separado_comas=explode(",",$texto_separado_puntos[$i]);
						// Por cada frase
						for($i_comas=0;$i_comas<count($texto_separado_comas);$i_comas++)
						{
							if($i_comas==(count($texto_separado_comas)-1))
								$traduccion.=$this->ConsultaTranslateGoogle($texto_separado_comas[$i_comas]).". ";
							else
								$traduccion.=$this->ConsultaTranslateGoogle($texto_separado_comas[$i_comas]).", ";
						}
					}
					else
					{					
						if($i==(count($texto_separado_puntos)-1))
							$traduccion.=$this->ConsultaTranslateGoogle($texto_separado_puntos[$i]);
						else
							$traduccion.=$this->ConsultaTranslateGoogle($texto_separado_puntos[$i]).". ";
					}
				}
			}
			else
			{
				$traduccion=$this->ConsultaTranslateGoogle($text);
			}
             * 
             */
		 }
		 return($traduccion); 
   }
   
   /**
	 *  Traduce un texto desde $from a $to
	 *
	 * @param [$texto]      Texto a traducir
     * @param [$from]		Lenguaje origen
     * @param [$to]         Lenguaje destino
	 *
	 * @return true or false
	 */
    
    function ConsultaTranslateMicrosoft($texto, $from, $to) {
        // Obtenemos el access token
        $fields = array(
            'grant_type' => 'client_credentials',
            'client_id' => 'hace',
            'client_secret' => '2gFpy4nX6CxYnuBd4apfiSppViDWZapOGUlTV0k0ivM=',
            'scope' => 'http://api.microsofttranslator.com'
        );
        $fields_string=http_build_query($fields);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, 'https://datamarket.accesscontrol.windows.net/v2/OAuth2-13');
        curl_setopt($ch,CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        $result = curl_exec($ch);
        curl_close($ch);
        $objresult=json_decode($result);

        // obtenemos la traduccion
        $authHeader="Authorization: Bearer ". $objresult->access_token;
        $params = "text=".urlencode($texto)."&to=".$to."&from=".$from;
        $translateUrl = "http://api.microsofttranslator.com/v2/Http.svc/Translate?$params";
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $translateUrl);
        curl_setopt ($ch, CURLOPT_HTTPHEADER, array($authHeader,"Content-Type: text/xml"));
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, False);
        $curlResponse = curl_exec($ch);

        $xmlObj = simplexml_load_string($curlResponse);
        foreach((array)$xmlObj[0] as $val){
            $translatedStr = $val;
        }
        return html_entity_decode($translatedStr);
    }

	/**
	 * Realiza la consulta de una frase simple en el lenguaje indicado
	 *
	 * @param [text]		Texto a traducir
	 *
	 * @return string con la traducción al lenguaje indicado
	 */
	private function ConsultaTranslateGoogle($text) 
	{  
		// definición de variables  
		$host = 'http://www.translate.google.com';  
		$vars = "hl=en&ie=Unknown&oe=ASCII&langpair=".$this->langpair."&text=" . urlencode($text);  
		$url  = $host."/translate_t?$vars"; 
		$html=file_get_contents($url);  
		$salida1 = explode("Spanish",$html);
		$salida3 = explode('</span></span>',$salida1[7]);
		$salida4 = explode('backgroundColor',$salida3[0]);
		$salida5 = explode('>',$salida4[2]);
		// capturando el texto traducido  
		$traduccion .= $salida5[1];
		return($traduccion); 
   }
   
   /**
	 * Establece la sección a cargar
	 *
	 * @param [seccion]		Cadena que representa la sección a cargar
	 *
	 * @return void
	 */
	function load($seccion) 
	{
		$this->seccion=$seccion;
    }
	
	/**
	 * Devuelve las siglas del idioma destino
	 *
	 *
	 * @return cadena con las siglas del idioma destino
	 */
	function GetIdioma() 
	{  
		$langpair=substr($this->langpair,3,2);
		return $langpair;
	}

	/**
	 * Realiza la consulta de un texto completo en el lenguaje indicado
	 *
	 * @param [key]		Clave a buscar de traducción
	 *
	 * @return string con la traducción al lenguaje indicado
	 */
	function lang($key) 
	{
        $idioma=$this->GetIdioma();
        include(PATHINCLUDE_FRAMEWORK_LANGUAGE.$idioma.'/'.$this->seccion.'.php');
		return $language[$key];
    }
}
?>