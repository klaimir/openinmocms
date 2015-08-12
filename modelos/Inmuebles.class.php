<?php
/*
Inmuebles.class.php, v 2.4 2013/05/13

ModelInmuebles - Clase gestionar todas las peticiones y operaciones relacionadas con los inmuebles registradas

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('Model.class.php');
require_once('Clientes.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ModelInmuebles
*
* Clase gestionar todas las peticiones y operaciones relacionadas con las inmuebles registradas
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  Inmuebles.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelInmuebles extends Model
{
    public $id_inmueble;
	public $metros;
	public $metros_utiles;
	public $habitaciones;
	public $banios;
	public $precio_compra;
	public $precio_alquiler;
	public $zona;
	public $region;
	public $provincia_inmueble;
	public $tipo;
	public $observaciones;
	public $direccion;
	public $direccion_aprox;
	public $bloqueado;
	public $estado;
	public $certificacion_energetica;
	public $captador;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelInmuebles()
    {  
		parent::Model();
		$this->id_inmueble=NULL;
		$this->metros=NULL;
		$this->metros_utiles=NULL;
		$this->habitaciones=NULL;
		$this->banios=NULL;
		$this->precio_compra=NULL;
		$this->precio_alquiler=NULL;
		$this->zona=NULL;
		$this->region=NULL;
		$this->provincia_inmueble=NULL;
		$this->tipo=NULL;
		$this->observaciones=NULL;
		$this->direccion=NULL;
		$this->direccion_aprox=NULL;
		$this->bloqueado=NULL;
		$this->estado=NULL;
		$this->certificacion_energetica=NULL;
		$this->captador=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_inmueble'])) $this->id_inmueble=$datos['id_inmueble'];
		if(isset($datos['metros'])) $this->metros=$datos['metros'];
		if(isset($datos['metros_utiles'])) $this->metros_utiles=$datos['metros_utiles'];
		if(isset($datos['banios'])) $this->banios=$datos['banios'];
		if(isset($datos['habitaciones'])) $this->habitaciones=$datos['habitaciones'];
		if(isset($datos['precio_compra'])) $this->precio_compra=$datos['precio_compra'];
		if(isset($datos['precio_alquiler'])) $this->precio_alquiler=$datos['precio_alquiler'];
		if(isset($datos['zona'])) $this->zona=$datos['zona'];
		if(isset($datos['provincia_inmueble'])) $this->provincia_inmueble=$datos['provincia_inmueble'];
		if(isset($datos['region'])) $this->region=$datos['region'];
		if(isset($datos['tipo'])) $this->tipo=$datos['tipo'];
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['direccion'])) $this->direccion=$datos['direccion'];
		if(isset($datos['direccion_aprox'])) $this->direccion_aprox=$datos['direccion_aprox'];
		if(isset($datos['bloqueado'])) $this->bloqueado=$datos['bloqueado'];
		if(isset($datos['estado'])) $this->estado=$datos['estado'];
		if(isset($datos['certificacion_energetica'])) $this->certificacion_energetica=$datos['certificacion_energetica'];
		if(isset($datos['captador'])) $this->captador=$datos['captador'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [id_inmueble]		Identificador
	 *
	 */
	
	function SetDataObject($id_inmueble)
    {  
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble = ".$id_inmueble;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta un inmueble en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve el último identificador insertado o false en caso contrario
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		$this->Execute($insertSQL) or die($this->ErrorMsg());		
		$ultimo_id=$this->Insert_ID('inmuebles','id_inmueble');
		// Si no existe el directorio de documentos
		if(!is_dir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$ultimo_id))
		{
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$ultimo_id);
			mkdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$ultimo_id."/fotos");
		}
		// Devolvemos el último insertado
		return $ultimo_id;
    }
	
	/**
	 * Realiza el proceso de actualización de un inmueble
	 *
	 * @param [datos]			Array con los diferentes valores a editar
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_inmueble)
    {
		if($datos['estado']=="cerrado" && $datos['estado_anterior']=="activo")
		{
			// Se bloquea un inmueble cerrado
			$this->id_inmueble=$id_inmueble;
			$this->Bloquear(1);
			// Se cierran los clientes asociados si son los únicos asociados
			$clientes = $this->Execute("SELECT * FROM clientes_inmuebles WHERE inmueble=".$this->id_inmueble);
			$num_clientes = $clientes->RecordCount();
			if($num_clientes!=0)
			{
				// Cliente
				$object_cliente = new ModelClientes();
				while($cliente = $clientes->FetchRow())
				{
					if($object_cliente->UnicoInmuebleSinCerrar($cliente['cliente']))
					{
						$datos_cliente['estado']="cerrado";
						$object_cliente->Update($datos_cliente,$cliente['cliente']);
					}
				}
			}
		}
		// Actualización
		$sql = "SELECT * FROM inmuebles WHERE id_inmueble = '".$id_inmueble."'";
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		// Si hay diferencia, actualiza
		if(array_diff($rs_row,$datos))
		{
			$UpdateSQL = $this->GetUpdateSQL($rs,$datos);
			return $this->Execute($UpdateSQL) or die($this->ErrorMsg());
		}
		else
			return true;
    }
	
	/**
	 * Elimina un inmueble de la base de datos
	 *
	 * @param [id_inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_inmueble)
    {
		// Obtencion de fichas de encargo
		$sql = "SELECT * FROM fichas_encargo_cliente WHERE inmueble=".$id_inmueble;
		$fichas_encargo = $this->Execute($sql) or die($this->ErrorMsg());
		$ficha_encargo = $fichas_encargo->FetchRow();
		$num_fichas_encargo = $fichas_encargo->RecordCount();
		// Si hay se borran sus ficheros
		if($num_fichas_encargo!=0)
		{
			do
			{
				// Borrado de archivos asociados
				full_rmdir(PATHINCLUDE_FRAMEWORK_DOC . "clientes/cliente_".$ficha_encargo['cliente']."/inmueble_".$id_inmueble);
			} while ($ficha_encargo = $fichas_encargo->FetchRow());
		}
		// Finalmente borra de la tabla inmuebles
		$sql = "DELETE FROM inmuebles WHERE id_inmueble='".$id_inmueble."'";
		$this->Execute($sql) or die($this->ErrorMsg());	
		// Borrado de archivos asociados
		full_rmdir(PATHINCLUDE_FRAMEWORK_DOC . "inmuebles/inmueble_".$id_inmueble);
		
    }
	
	/**
	 * Bloquea/Desbloquea un inmueble
	 *
	 * @param [bloqueado]		Indica la acción a realizar
	 *
	 * @return Devuelve true o false
	 */
	 
	function Bloquear($bloqueado)
    {
		$datos['bloqueado']=$bloqueado;
		$this->Update($datos,$this->id_inmueble);
    }

	/**
	 * Envía un email de solicitud de información del inmueble
	 *
	 * @param [info]		Datos de información y contacto
	 *
	 * @return Devuelve true o false
	 */
	 
	function EnviarCorreoSolicitudInformacion($info)
	{
		// Texto del correo		
		$texto_correo='<center>'.cabecera_correo_html(). datos_inmueble_correo_html($info['id']). "<br />". datos_remitente_correo_html($info['nombre'],$info['correo'],NOMBRE_EMPRESA." - Solicitud de información de inmueble",nl2br($info['mensaje'])) . pie_correo_html().'</center>';		
		$asunto = NOMBRE_EMPRESA.' · Solicitud de información de inmueble';
		$direccion = CORREO_ADMINISTRADOR_FRAMEWORK;
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS."mail/PHPMailerApp.class.php");
		// Creamos el objeto
		$mail = new PHPMailerApp();
		// Captación de errores
		try 
		{
			// Indicamos cual es la dirección de destino del correo
			$mail->AddAddress($direccion);			
			// Asignamos asunto y cuerpo del mensaje
			$mail->Subject = $asunto;					
			$mail->Body = $texto_correo;
			// Definimos AltBody por si el destinatario del correo no admite email con formato html 
			$mail->AltBody = $texto_correo;
			//se envia el mensaje, si no ha habido problemas la variable $exito tendra el valor true
			return $mail->Send();
		}
		catch (phpmailerException $e)
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]=$e->errorMessage();
			?>
			<SCRIPT LANGUAGE="JavaScript">
				setTimeout("location.href='<?php echo  $_SESSION['rutaraiz'];?>media/error_general.php'", 1000);
			</SCRIPT>
			<?php
		}
		// Si todo fue bien
		return 1;
	}
	
	/**
	 * Envía un email de recomendación a un amigo/a del inmueble
	 *
	 * @param [info]		Datos de información y contacto
	 *
	 * @return Devuelve true o false
	 */
	 
	function EnviarCorreoRecomendarAmigo($info)
	{
		// Texto del correo		
		$texto_correo='<center>'.cabecera_correo_html(). datos_inmueble_correo_html($info['id']).  "<br />". datos_remitente_correo_html($info['correo'],$info['correo'],NOMBRE_EMPRESA." - Recomendación a un amigo/a del inmueble",nl2br($info['mensaje'])) . pie_correo_html().'</center>';		
		$asunto = NOMBRE_EMPRESA.' · Recomendación a un amigo/a del inmueble';
		$direccion = $info['correo_amigo'];
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS."mail/PHPMailerApp.class.php");
		// Creamos el objeto
		$mail = new PHPMailerApp();
		// Captación de errores
		try 
		{
			// Indicamos cual es la dirección de destino del correo
			$mail->AddAddress($direccion);			
			// Asignamos asunto y cuerpo del mensaje
			$mail->Subject = $asunto;					
			$mail->Body = $texto_correo;
			// Definimos AltBody por si el destinatario del correo no admite email con formato html 
			$mail->AltBody = $texto_correo;
			//se envia el mensaje, si no ha habido problemas la variable $exito tendra el valor true
			return $mail->Send();
		}
		catch (phpmailerException $e)
		{
			$_SESSION['hay_errores_general']=true;
			$_SESSION['errores_general'][0]=$e->errorMessage();
			?>
			<SCRIPT LANGUAGE="JavaScript">
				setTimeout("location.href='<?php echo  $_SESSION['rutaraiz'];?>media/error_general.php'", 1000);
			</SCRIPT>
			<?php
		}
		// Si todo fue bien
		return 1;
	}
	
	/**
	 * Determina si un inmueble lo gestiona un determinado usuario
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [id_usuario]		Identificador del usuario
	 *
	 * @return Devuelve 1 o 0
	 */
	
	function ObtenerInmuebleGestionaUsuario($id_inmueble,$id_usuario)
    {  
		$sql="SELECT * FROM inmuebles WHERE id_inmueble=".$id_inmueble." AND poblacion_inmueble IN (SELECT oficinas_poblaciones.poblacion FROM oficinas_poblaciones,oficinas_usuarios WHERE oficinas_poblaciones.oficina=oficinas_usuarios.oficina AND usuario=".$id_usuario.")";
		$rs = $this->Execute($sql);
		return $rs->RecordCount();
    }
	
	/**
	 * Añade la recomendación a un amigo/a del inmueble indicado
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function InsertarRecomendacionAmigo($datos)
    {  
		// si el id_recomendacion es nulo, se busca el siguiente que le corresponde 
		if(is_null($datos['id_recomendacion']))
		{	
			// Se obtiene el último id insertado
			$sql_atribs = "SELECT max(id_recomendacion) as ultimo_id FROM recomendaciones_inmueble WHERE inmueble='".$datos['inmueble']."'";
			$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
			$num_atribs = $atribs->RecordCount();
			$atrib = $atribs->FetchRow();
		
			if(is_null($atrib['ultimo_id']))
			{
				$id_recomendacion=1;
			}
			else
			{
				$id_recomendacion = $atrib['ultimo_id']+1;
			}
		}
		// Se inserta los valores de los datos
		$insertSQL = sprintf("INSERT INTO recomendaciones_inmueble (id_recomendacion, inmueble, correo, correo_amigo, mensaje, fecha) VALUES (%s, %s, %s, %s, %s, %s)", 
				   GetSQLValueString($id_recomendacion, "int"),
				   GetSQLValueString($datos['inmueble'], "text"),
				   GetSQLValueString($datos['correo'], "text"),
				   GetSQLValueString($datos['correo_amigo'], "text"),
				   GetSQLValueString($datos['mensaje'], "text"),
				   GetSQLValueString($datos['fecha'], "date"));
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Determina si un determinado usuario ha recomendado el inmueble a un amigo
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 * @param [correo]			Dirección de correo del recomendador
	 * @param [correo_amigo]	Dirección de correo del amigo/a
	 *
	 * @return Devuelve 1 o 0
	 */
	
	function ObtenerRecomendacionAmigo($id_inmueble,$correo,$correo_amigo)
    {  
		$sql="SELECT * FROM recomendaciones_inmueble WHERE inmueble=".$id_inmueble." AND correo='".$correo."' AND correo_amigo='".$correo_amigo."'";
		$rs = $this->Execute($sql);
		return $rs->RecordCount();
    }
	
	/**
	 * Devuelve las recomendación a amigos/as del inmueble indicado
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return Vector con las recomendaciones
	 */
	
	function ObtenerRecomendacionesAmigos($id_inmueble)
    {  
		$sql="SELECT * FROM recomendaciones_inmueble WHERE inmueble=".$id_inmueble;
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Devuelve toda la documentación generada del inmueble indicado
	 *
	 * @param [id_inmueble]		Identificador del inmueble
	 *
	 * @return Vector con la documentación generada
	 */
	
	function ObtenerDocumentacionGenerada($id_inmueble)
    {  
		// Array de documentos
		$doc_generada=array();
		// Certificaciones energéticas
		require_once('CertificacionesEnergeticasCliente.class.php');
		$certificaciones_energeticas = new ModelCertificacionesEnergeticasCliente();	
		$docs_certificaciones_energeticas = $certificaciones_energeticas->ObtenerCertificacionesInmueble($id_inmueble);
		$doc_generada['certificaciones_energeticas']=$docs_certificaciones_energeticas;
		// Fichas de encargo
		require_once('FichasEncargoCliente.class.php');
		$fichas_encargo = new ModelFichasEncargoCliente();	
		$docs_fichas_encargo = $fichas_encargo->ObtenerFichasInmueble($id_inmueble);
		$doc_generada['fichas_encargo']=$docs_fichas_encargo;
		// Fichas de visita
		require_once('FichasVisitaCliente.class.php');
		$fichas_visita = new ModelFichasVisitaCliente();	
		$docs_fichas_visita = $fichas_visita->ObtenerFichasVisitaInmueble($id_inmueble);
		$doc_generada['fichas_visita']=$docs_fichas_visita;
		// Contratos de arrendamiento y facturas
		require_once('ContratosArrendamientoInmueble.class.php');
		$contratos_arrendamiento = new ModelContratosArrendamientoInmueble();	
		$docs_contratos_arrendamiento = $contratos_arrendamiento->ObtenerContratosFacturasInmueble($id_inmueble);
		$doc_generada['contratos_arrendamiento']=$docs_contratos_arrendamiento;
		// Contratos de compra-venta y facturas
		require_once('ContratosCompraVentaInmueble.class.php');
		$contratos_compra_venta = new ModelContratosCompraVentaInmueble();	
		$docs_contratos_compra_venta = $contratos_compra_venta->ObtenerContratosFacturasInmueble($id_inmueble);
		$doc_generada['contratos_compra_venta']=$docs_contratos_compra_venta;
		// Se devuelve la documentación generada
		return $doc_generada;
    }
}
?>