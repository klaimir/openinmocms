<?php
/*
ControlInmuebles.class.php, v 2.4 2013/05/13

ControlInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once(PATHINCLUDE_FRAMEWORK_APP.'Controlador.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ControlInmuebles
*
* ControlInmuebles - Clase gestionar todas las validaciones y operaciones extras realizadas en la sección
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  ControlInmuebles.class.php, v 2.4 2013/05/13
* @access   public
*/

class ControlInmuebles extends Controlador
{	
	/**
	 * Constructor
	 *
	 */
	
	function __construct()
    {  
		parent::__construct();
    }
	
	/**
	 * Comprueba las referencias para realizar determinadas acciones
	 *
	 * @param [id]			Identificador a comprobar
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */
	 
	public static function ComprobarReferencias($id,&$i,&$hayerrores,&$errores)
	{		
		$acceso_borrar=ControlInmuebles::ComprobarBorrarCompraVentaInmueble($id);
		if ($acceso_borrar<0) {$hayerrores = true; $errores[$i++] = "El inmueble seleccionado tiene algún contrato de compra-venta asociado";}
		$acceso_borrar=ControlInmuebles::ComprobarBorrarArrendamientoInmueble($id);
		if ($acceso_borrar<0) {$hayerrores = true; $errores[$i++] = "El inmueble seleccionado tiene algún contrato de arrendamiento asociado";}
		$acceso_borrar=ControlInmuebles::ComprobarUsuarioGestionaInmueble($id);
		if ($acceso_borrar<0) {$hayerrores = true; $errores[$i++] = "El usuario actual no puede gestionar la población del inmueble seleccionado";}
		// Comprobar incluido en ficha de visita
		$acceso_borrar=ControlInmuebles::ComprobarIncluidoFichasVisitaClientes($id);
		if ($acceso_borrar<0) {$hayerrores = true; $errores[$i++] = "El inmueble seleccionado está asociado a alguna ficha de visita";}
		// Comprobar incluido en recomendación
		$acceso_borrar=ControlInmuebles::ComprobarIncluidoRecomendacionesAmigos($id);
		if ($acceso_borrar<0) {$hayerrores = true; $errores[$i++] = "El inmueble seleccionado ha sido recomendado a un amigo";}
	}
	
	/**
	 * Valida los datos de entrada desde la interfaz
	 *
	 * @param [i]			Número siguiente de error
	 * @param [hayerrores]	Indica si existen errores encontrados
	 * @param [errores]		Array con los diferentes textos de errores
	 *
	 * @return void
	 */

	public static function Validar(&$i,&$hayerrores,&$errores)
	{		
		// Comprobacion del precio de compra
		if (trim($_POST['precio_compra']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el precio de compra del inmueble";
		}
		else
		{
			if(!is_numeric(formatear_numero($_POST['precio_compra'])))
			{
				$hayerrores = true; $errores[$i++] = "El formato introducido del precio de compra no es correcto";
			}
		}
		// Comprobacion del precio de alquiler
		if (trim($_POST['precio_alquiler']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se ha introducido el precio de alquiler del inmueble";
		}
		else
		{
			if(!is_numeric(formatear_numero($_POST['precio_alquiler'])))
			{
				$hayerrores = true; $errores[$i++] = "El formato introducido del precio de alquiler no es correcto";
			}
		}
		// Comprobacion de los metros
		if (trim($_POST['metros']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se han introducido los metros del inmueble";
		}
		else
		{
			$metros_numero_formateado=formatear_numero($_POST['metros']);
			if(!is_numeric($metros_numero_formateado))
			{
				$hayerrores = true; $errores[$i++] = "El formato introducido de los metros no es correcto";
			}
			else
			{
				if($metros_numero_formateado<=0)
				{
					$hayerrores = true; $errores[$i++] = "Debe introducir un valor positivo para los metros";
				}
			}
		}
		// Comprobacion de los metros útiles
		if (trim($_POST['metros_utiles']) == "") 
		{
			$hayerrores = true; $errores[$i++] = "No se han introducido los metros útiles del inmueble";
		}
		else
		{
			$metros_utiles_numero_formateado=formatear_numero($_POST['metros_utiles']);
			if(!is_numeric($metros_utiles_numero_formateado))
			{
				$hayerrores = true; $errores[$i++] = "El formato introducido de los metros útiles no es correcto";
			}
			else
			{
				if($metros_utiles_numero_formateado<=0)
				{
					$hayerrores = true; $errores[$i++] = "Debe introducir un valor positivo para los metros útiles";
				}
			}
		}
		// Comprobacion del región
		if (trim($_POST['region']) == "") {$hayerrores = true; $errores[$i++] = "No se ha introducido la región del inmueble";}
		// Comprobacion del municipio
		if (trim($_POST['poblacion_inmueble']) == "") {$hayerrores = true; $errores[$i++] = "No se ha introducido el municipio del inmueble";}
		// Comprobacion de la provincia
		if (trim($_POST['provincia_inmueble']) == "") {$hayerrores = true; $errores[$i++] = "No se ha introducido la provincia del inmueble";}
		// Comprobacion del tipo
		if (trim($_POST['tipo']) == "") {$hayerrores = true; $errores[$i++] = "No se ha introducido la tipología del inmueble";}
		
		if($_POST['estado']=="activo")
		{
			if(!$_POST['bloqueado'] && $_POST['certificacion_energetica']=="")
			{				
				if(isset($_GET['id']))
					$NumCertificacionesEnergeticas=ControlInmuebles::ObtenerNumCertificacionesEnergeticasCliente($_GET['id']);					
				else
					$NumCertificacionesEnergeticas=0;
				if($NumCertificacionesEnergeticas==0)
				{
					$hayerrores = true; $errores[$i++] = "No se puede publicar el inmueble ya que no tiene determinado aviso de certificación energética ni se ha determinado su certificación";
				}
			}
		}		
		
		// Conversión de datos
		$datos=$_POST;
		$datos['precio_compra']=formatear_numero($_POST['precio_compra']);
		$datos['precio_alquiler']=formatear_numero($_POST['precio_alquiler']);
		$datos['metros']=formatear_numero($_POST['metros']);
		$datos['metros_utiles']=formatear_numero($_POST['metros_utiles']);
		return $datos;
	}
	
	/**
	 * Comprueba que el usuario en curso puede editar el inmueble seleccionado
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarEditar($id_inmueble)
	{
		return ControlInmuebles::ComprobarUsuarioGestionaInmueble($id_inmueble);
	}
	
	/**
	 * Comprueba que el usuario en curso gestiona el inmueble actual
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarUsuarioGestionaInmueble($id_inmueble)
	{
		// Consulta de problación del inmueble
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		// Datos inmueble
		$inmueble = new ModelInmuebles();
		// Si existe
		if($inmueble->ObtenerInmuebleGestionaUsuario($id_inmueble,$_SESSION['id_usuario'])==0)
			return -1;
		
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar un contrato de compra-venta de un inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarCompraVentaInmueble($id_inmueble)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosCompraVentaInmueble.class.php');
		// Datos inmueble
		$contratos = new ModelContratosCompraVentaInmueble();
		$contratos_obtenidos=$contratos->ObtenerContratosInmueble($id_inmueble);
		$num_contratos_obtenidos=$contratos_obtenidos->RecordCount();
		// Si existen contratos
		if($num_contratos_obtenidos!=0)
			return -1;
		
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar un arrendamiento de un inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrarArrendamientoInmueble($id_inmueble)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'ContratosArrendamientoInmueble.class.php');
		// Datos inmueble
		$contratos = new ModelContratosArrendamientoInmueble();
		$contratos_obtenidos=$contratos->ObtenerContratosInmueble($id_inmueble);
		$num_contratos_obtenidos=$contratos_obtenidos->RecordCount();
		// Si existen contratos
		if($num_contratos_obtenidos!=0)
			return -1;
		
		return 1;
	}
		
	/**
	 * Comprueba que un inmueble no está incluido en una ficha de visita de algún cliente
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarIncluidoFichasVisitaClientes($id_inmueble)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'FichasVisitaCliente.class.php');
		// Datos
		$ficha_visita = new ModelFichasVisitaCliente();
		$fichas_visita_obtenidas=$ficha_visita->ObtenerFichasVisitaInmueble($id_inmueble);
		$num_fichas_visita_obtenidas=$fichas_visita_obtenidas->RecordCount();
		// Si existen
		if($num_fichas_visita_obtenidas!=0)
			return -1;
		
		return 1;
	}
	
	/**
	 * Comprueba que un inmueble no está incluido en ninguna recomendación
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarIncluidoRecomendacionesAmigos($id_inmueble)
	{		
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		// Datos
		$inmueble = new ModelInmuebles();
		$recomendaciones_obtenidas=$inmueble->ObtenerRecomendacionesAmigos($id_inmueble);
		$num_recomendaciones_obtenidas=$recomendaciones_obtenidas->RecordCount();
		// Si existen
		if($num_recomendaciones_obtenidas!=0)
			return -1;
		
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar un inmueble
	 *
	 * @param [id_cliente]		Identificador del cliente
	 *
	 * @return true or false
	 */

	public static function ComprobarBorrar($id_inmueble)
	{		
		$acceso_borrar=ControlInmuebles::ComprobarBorrarCompraVentaInmueble($id_inmueble);
		if ($acceso_borrar<0) { return -1; }
		$acceso_borrar=ControlInmuebles::ComprobarBorrarArrendamientoInmueble($id_inmueble);
		if ($acceso_borrar<0) { return -1; }
		$acceso_borrar=ControlInmuebles::ComprobarUsuarioGestionaInmueble($id_inmueble);
		if ($acceso_borrar<0) { return -2; }		
		// Comprobar incluido en ficha de visita
		$acceso_borrar=ControlInmuebles::ComprobarIncluidoFichasVisitaClientes($id_inmueble);
		if ($acceso_borrar<0) { return -3; }
		// Comprobar incluido en recomendación
		$acceso_borrar=ControlInmuebles::ComprobarIncluidoRecomendacionesAmigos($id_inmueble);
		if ($acceso_borrar<0) { return -4; }
		return 1;
	}
	
	/**
	 * Comprueba que es posible borrar un conjunto de inmuebles
	 *
	 * @param [vector_inmuebles]		Vector de inmuebles
	 *
	 * @return true or false
	 */

	public static function ComprobarInmueblesAsociadosBorrar($vector_inmuebles)
	{		
		if(count($vector_inmuebles)>0)
		{
			foreach($vector_inmuebles as $id_inmueble)
			{
				$comprobar_borrar_inmueble=ControlInmuebles::ComprobarBorrar($id_inmueble);
				if($comprobar_borrar_inmueble<0)
					return false;
			}
		}
		// Si todo fue bien
		return true;
	}
	
	/**
	 * Comprueba que es posible publicar un determinado inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [bloqueado]		Indica si se bloquea o desbloquea el inmueble
	 *
	 * @return true or false
	 */

	public static function ComprobarBloquear($id_inmueble,$bloqueado)
	{		
		$acceso_gestionar=ControlInmuebles::ComprobarUsuarioGestionaInmueble($id_inmueble);
		if ($acceso_gestionar<0) { return -3; }
		// Luego el resto de comprobaciones
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'Inmuebles.class.php');
		// Datos inmueble
		$inmueble = new ModelInmuebles();
		$inmueble->SetDataObject($id_inmueble);
		// Si el estado es no activo
		if($inmueble->estado=="cerrado")
			return -2;
		else
		{
			if($bloqueado)
				return 1;
			else
			{
				$num_certificaciones_energeticas_obtenidas=ControlInmuebles::ObtenerNumCertificacionesEnergeticasCliente($id_inmueble);				
				// Si no tiene certificación energética y no se ha creado documento
				if(is_null($inmueble->certificacion_energetica) && $num_certificaciones_energeticas_obtenidas==0)
					return -1;
			}
		}			
		return 1;
	}
	
	/**
	 * Comprueba que es posible publicar un determinado inmueble
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return true or false
	 */

	public static function ObtenerNumCertificacionesEnergeticasCliente($id_inmueble)
	{		
		// Si no tiene aviso de certificación energética
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'CertificacionesEnergeticasCliente.class.php');
		// Certificaciones energéticas
		$certificacion_energetica = new ModelCertificacionesEnergeticasCliente();
		$certificaciones_energeticas_obtenidas=$certificacion_energetica->ObtenerCertificacionesInmueble($id_inmueble);
		$num_certificaciones_energeticas_obtenidas=$certificaciones_energeticas_obtenidas->RecordCount();
		return $num_certificaciones_energeticas_obtenidas;
	}
}
?>