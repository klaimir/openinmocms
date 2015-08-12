<?php
/*
CartelesInmueble.class.php, v 2.4 2013/05/13

ModelCartelesInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los carteles de los inmuebles registrados

Esta librería es propiedad de Ángel Luis Berasuain Ruiz, cualquier uso que pudiera darse
tendrá que estar autorizado expresamente bajo mi supervisión.

Si tienes cualquier sugerencia, duda o comentario, por favor enviámela a:

Ángel Luis Berasuain Ruiz
klaimir@hotmail.com

*/

/* load classes */

require_once('Model.class.php');

/* load libraries */

// No son necesarias librerías auxiliares

/**
*
* ModelCartelesInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los carteles de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  CartelesInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelCartelesInmueble extends Model
{
    public $id_cartel;
	public $inmueble;
	public $opcion_vivienda;
	public $tipo_cartel;
	public $disposicion_fotos;
	public $max_anchura;
	public $max_altura;
	public $poblacion;
	public $zona;
	public $direccion;		
	public $observaciones;
	public $fecha;
	public $precio_compra;
	public $precio_alquiler;
	public $metros;
	public $banios;
	public $habitaciones;
	public $certificacion_energetica;
	public $enlace_web;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelCartelesInmueble()
    {  
		parent::Model();
		$this->id_cartel=NULL;
		$this->inmueble=NULL;
		$this->opcion_vivienda=NULL;
		$this->tipo_cartel=NULL;
		$this->disposicion_fotos=NULL;
		$this->max_anchura=NULL;
		$this->max_altura=NULL;
		$this->poblacion=NULL;
		$this->zona=NULL;
		$this->direccion=NULL;
		$this->precio_compra=NULL;
		$this->precio_alquiler=NULL;
		$this->metros=NULL;
		$this->banios=NULL;
		$this->habitaciones=NULL;
		$this->certificacion_energetica=NULL;
		$this->observaciones=NULL;
		$this->fecha=NULL;
		$this->enlace_web=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_cartel'])) $this->id_cartel=$datos['id_cartel'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['opcion_vivienda'])) $this->opcion_vivienda=$datos['opcion_vivienda'];	
		if(isset($datos['tipo_cartel'])) $this->tipo_cartel=$datos['tipo_cartel'];
		if(isset($datos['disposicion_fotos'])) $this->disposicion_fotos=$datos['disposicion_fotos'];
		if(isset($datos['max_altura'])) $this->max_altura=$datos['max_altura'];
		if(isset($datos['max_anchura'])) $this->max_anchura=$datos['max_anchura'];
		if(isset($datos['poblacion'])) $this->poblacion=$datos['poblacion'];
		if(isset($datos['zona'])) $this->zona=$datos['zona'];
		if(isset($datos['precio_compra'])) $this->precio_compra=$datos['precio_compra'];
		if(isset($datos['precio_alquiler'])) $this->precio_alquiler=$datos['precio_alquiler'];	
		if(isset($datos['direccion'])) $this->direccion=$datos['direccion'];
		if(isset($datos['metros'])) $this->metros=$datos['metros'];
		if(isset($datos['banios'])) $this->banios=$datos['banios'];
		if(isset($datos['habitaciones'])) $this->habitaciones=$datos['habitaciones'];
		if(isset($datos['certificacion_energetica'])) $this->certificacion_energetica=$datos['certificacion_energetica'];
		if(isset($datos['enlace_web'])) $this->enlace_web=$datos['enlace_web'];
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha'])) $this->fecha=$datos['fecha'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [id_cartel]		Identificador del cartel
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 */
	
	function SetDataObject($id_cartel,$inmueble)
    {  
		$sql = "SELECT * FROM carteles_inmueble WHERE id_cartel = ".$id_cartel." AND inmueble = ".$inmueble;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta un cartel en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return El último identificador calculado
	 */
	 
	function Insert($datos)
    {
		// Se obtiene el último id insertado
		$sql_atribs = "SELECT max(id_cartel) as ultimo_id FROM carteles_inmueble WHERE inmueble=".$datos['inmueble'];
		$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
		$num_atribs = $atribs->RecordCount();
		$atrib = $atribs->FetchRow();
		// Asignación de identificador
		if(is_null($atrib['ultimo_id']))
		{
			$id_cartel=1;
		}
		else
		{
			$id_cartel = $atrib['ultimo_id']+1;
		}
		$datos['id_cartel']=$id_cartel;
		// Insertamos los valores con el identificador calculado
		$this->InsertBD($datos);
		// Insertamos las fotos asociadas si las hay
		$this->AsociarFotografias($id_cartel,$datos['inmueble'],$datos['fotos_selec']);
		// Devolvemos el identificador
		return $id_cartel;	
    }
	
	/**
	 * Elimina una cartel de un inmueble de la base de datos
	 *
	 * @param [cartel]		Indentificador de la cartel
	 * @param [inmueble]	Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function EliminarFotografiasAsociadas($cartel, $inmueble)
    {  
		$sql = sprintf("DELETE FROM fotos_carteles_inmueble WHERE cartel=%s AND inmueble=%s",
							GetSQLValueString($cartel, "int"),
							GetSQLValueString($inmueble, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
    }
	
	/**
	 * Asocia una fotografía a un cartel
	 *
	 * @param [cartel]			Indentificador del cartel
	 * @param [inmueble]		Indentificador del inmueble
	 * @param [fotos_selec]		Vector con los identificadores de las fotografías seleccionadas
	 *
	 * @return Devuelve true o false
	 *
	 */
	
	function AsociarFotografias($cartel,$inmueble,$fotos_selec)
    { 
		// Borra las existentes
		$this->EliminarFotografiasAsociadas($cartel,$inmueble);
		// Asocia si existen
		if(count($fotos_selec)!=0)
		{
			foreach($fotos_selec as $foto_selec)
			{
				$this->AsociarFotografia($cartel,$foto_selec,$inmueble);
			}
		}
    }
	
	/**
	 * Asocia una fotografía a un cartel
	 *
	 * @param [cartel]			Indentificador del cartel
	 * @param [foto]			Indentificador de la fotografía
	 * @param [inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 *
	 */
	
	function AsociarFotografia($cartel,$foto,$inmueble)
    {  
		// Conversión al vector
		$datos['cartel']=$cartel;
		$datos['foto']=$foto;
		$datos['inmueble']=$inmueble;
		// Inserción de datos
		$sql = "SELECT * FROM fotos_carteles_inmueble WHERE cartel = -1 AND foto = -1 AND inmueble = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Inserta un cartel en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function InsertBD($datos)
    {  
		$sql = "SELECT * FROM carteles_inmueble WHERE id_cartel = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de una cartel
	 *
	 * @param [datos]				Array con los diferentes valores a editar
	 * @param [id_cartel]		Indentificador de la cartel
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_cartel,$inmueble)
    {
		// Insertamos las fotos asociadas si las hay
		$this->AsociarFotografias($id_cartel,$inmueble,$datos['fotos_selec']);
		// Se realiza actualización
		$sql = "SELECT * FROM carteles_inmueble WHERE id_cartel = ".$id_cartel." AND inmueble = ".$inmueble;
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
	 * Elimina una cartel de un inmueble de la base de datos
	 *
	 * @param [id_cartel]		Indentificador de la cartel
	 * @param [inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_cartel, $inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM carteles_inmueble WHERE id_cartel=%s AND inmueble=%s",
							GetSQLValueString($id_cartel, "int"),
							GetSQLValueString($inmueble, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/carteles/cartel_".$id_cartel.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/carteles/cartel_".$id_cartel.".pdf");
		}
		// Borramos fichero qr asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/carteles/qr_code_cartel_".$id_cartel.".png"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/carteles/qr_code_cartel_".$id_cartel.".png");
		}
    }
	
	/**
	 * Obtiene todos los carteles realizados de un determinado inmueble
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas carteles encontrados
	 *
	 */
	
	function ObtenerCartelesInmueble($inmueble)
    {  
		$sql = "SELECT * FROM carteles_inmueble WHERE inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
	
	/**
	 * Determina si una fotografía está asociada a un cartel
	 *
	 * @param [cartel]			Indentificador del cartel
	 * @param [foto]			Indentificador de la fotografía
	 * @param [inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve 1 si está asociada, 0 en caso contrario
	 *
	 */
	
	function FotografiaEstaAsociada($cartel,$foto,$inmueble)
    {  
		$sql = "SELECT * FROM fotos_carteles_inmueble WHERE cartel = ".$cartel." AND foto = ".$foto." AND inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs->RecordCount();
    }
	
	/**
	 * Determina si una fotografía está asociada a algún cartel
	 *
	 * @param [foto]			Indentificador de la fotografía
	 * @param [inmueble]		Indentificador del inmueble
	 *
	 * @return Devuelve 1 si está asociada, 0 en caso contrario
	 *
	 */
	
	function FotografiaEstaAsociadaCartel($foto,$inmueble)
    {  
		$sql = "SELECT * FROM fotos_carteles_inmueble WHERE foto = ".$foto." AND inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs->RecordCount();
    }
}
?>