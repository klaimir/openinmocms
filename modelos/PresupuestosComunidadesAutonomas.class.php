<?php
/*
PresupuestosComunidadesAutonomas.class.php, v 2.4 2013/05/13

ModelPresupuestosComunidadesAutonomas - Clase gestionar todas las peticiones y operaciones relacionadas con los comunidad autónomas de las comunidades autonomas registrados

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
* ModelPresupuestosComunidadesAutonomas
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los comunidad autónomas de las comunidades autonomas registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  PresupuestosComunidadesAutonomas.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelPresupuestosComunidadesAutonomas extends Model
{
    public $comunidad_autonoma;
	public $porcentaje_iajd_vivienda_usada;
	public $porcentaje_iajd_nueva_vivienda;
	public $porcentaje_comision_apertura_hipoteca;
	public $valor_tasacion_hipoteca;
	public $porcentaje_notaria_hipoteca;
	public $porcentaje_gestoria_hipoteca;
	public $porcentaje_registro_hipoteca;
	public $porcentaje_iva_hipoteca;
	public $valor_seguro_hipoteca;
	public $porcentaje_iva_nueva_vivienda;
	public $porcentaje_itp;
	public $porcentaje_notaria;
	public $porcentaje_gestoria;
	public $porcentaje_registro;
	public $porcentaje_iva_gastos_comunes;	
	public $observaciones;
	public $fecha_actualizacion;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelPresupuestosComunidadesAutonomas()
    {  
		parent::Model();
		$this->comunidad_autonoma=NULL;
		$this->porcentaje_iajd_vivienda_usada=NULL;
		$this->porcentaje_iajd_nueva_vivienda=NULL;
		$this->porcentaje_comision_apertura_hipoteca=NULL;
		$this->valor_tasacion_hipoteca=NULL;
		$this->porcentaje_notaria_hipoteca=NULL;
		$this->porcentaje_gestoria_hipoteca=NULL;
		$this->porcentaje_registro_hipoteca=NULL;
		$this->porcentaje_iva_hipoteca=NULL;
		$this->valor_seguro_hipoteca=NULL;
		$this->porcentaje_iva_nueva_vivienda=NULL;
		$this->porcentaje_itp=NULL;
		$this->porcentaje_notaria=NULL;
		$this->porcentaje_gestoria=NULL;
		$this->porcentaje_registro=NULL;
		$this->porcentaje_iva_gastos_comunes=NULL;
		$this->observaciones=NULL;
		$this->fecha_actualizacion=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['comunidad_autonoma'])) $this->comunidad_autonoma=$datos['comunidad_autonoma'];
		if(isset($datos['porcentaje_iajd_vivienda_usada'])) $porcentaje_iajd_vivienda_usada->iajd=$datos['porcentaje_iajd_vivienda_usada'];
		if(isset($datos['porcentaje_iajd_nueva_vivienda'])) $this->porcentaje_iajd_nueva_vivienda=$datos['porcentaje_iajd_nueva_vivienda'];
		if(isset($datos['porcentaje_comision_apertura_hipoteca'])) $this->porcentaje_comision_apertura_hipoteca=$datos['porcentaje_comision_apertura_hipoteca'];
		if(isset($datos['valor_tasacion_hipoteca'])) $this->valor_tasacion_hipoteca=$datos['valor_tasacion_hipoteca'];
		if(isset($datos['porcentaje_notaria_hipoteca'])) $this->porcentaje_notaria_hipoteca=$datos['porcentaje_notaria_hipoteca'];
		if(isset($datos['porcentaje_gestoria_hipoteca'])) $this->porcentaje_gestoria_hipoteca=$datos['porcentaje_gestoria_hipoteca'];
		if(isset($datos['porcentaje_registro_hipoteca'])) $this->porcentaje_registro_hipoteca=$datos['porcentaje_registro_hipoteca'];
		if(isset($datos['porcentaje_iva_hipoteca'])) $this->porcentaje_iva_hipoteca=$datos['porcentaje_iva_hipoteca'];
		if(isset($datos['valor_seguro_hipoteca'])) $this->valor_seguro_hipoteca=$datos['valor_seguro_hipoteca'];
		if(isset($datos['porcentaje_iva_nueva_vivienda'])) $this->porcentaje_iva_nueva_vivienda=$datos['porcentaje_iva_nueva_vivienda'];
		if(isset($datos['porcentaje_itp'])) $this->porcentaje_itp=$datos['porcentaje_itp'];
		if(isset($datos['porcentaje_notaria'])) $this->porcentaje_notaria=$datos['porcentaje_notaria'];
		if(isset($datos['porcentaje_gestoria'])) $this->porcentaje_gestoria=$datos['porcentaje_gestoria'];
		if(isset($datos['porcentaje_registro'])) $this->porcentaje_registro=$datos['porcentaje_registro'];
		if(isset($datos['porcentaje_iva_gastos_comunes'])) $this->porcentaje_iva_gastos_comunes=$datos['porcentaje_iva_gastos_comunes'];	
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha_actualizacion'])) $this->fecha_actualizacion=$datos['fecha_actualizacion'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [comunidad_autonoma]		Identificador
	 *
	 */
	
	function SetDataObject($comunidad_autonoma)
    {  
		$sql = "SELECT * FROM presupuestos_comunidades WHERE comunidad_autonoma = ".$comunidad_autonoma;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta un comunidad autónoma de comunidad autónoma en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function Insert($datos)
    {  
		$sql = "SELECT * FROM presupuestos_comunidades WHERE comunidad_autonoma = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de una comunidad autónoma
	 *
	 * @param [datos]				Array con los diferentes valores a editar
	 * @param [comunidad_autonoma]	Indentificador de la comunidad autónoma
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$comunidad_autonoma)
    {
		$sql = "SELECT * FROM presupuestos_comunidades WHERE comunidad_autonoma = ".$comunidad_autonoma;
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
	 * Elimina una comunidad autónoma de un inmueble de la base de datos
	 *
	 * @param [comunidad_autonoma]		Indentificador de la comunidad autónoma
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($comunidad_autonoma)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM presupuestos_comunidades WHERE comunidad_autonoma=%s",
							GetSQLValueString($comunidad_autonoma, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
    }
	
	/**
	 * Obtiene el porcentaje iajd en función del tipo de vivienda
	 *
	 * @param [comunidad_autonoma]			Indentificador de la comunidad autónoma
	 * @param [antiguedad_vivienda]			Indica la antigüedad de la vivienda
	 *
	 * @return Devuelve el porcentaje de iajd del tipo de vivienda indicado
	 *
	 */
	
	function ObtenerPorcentajeIAJD($comunidad_autonoma,$antiguedad_vivienda)
    {
		$sql = "SELECT * FROM presupuestos_comunidades WHERE comunidad_autonoma = ".$comunidad_autonoma;		
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		if($antiguedad_vivienda=="nuevo_inmueble")
			return $rs_row['porcentaje_iajd_nueva_vivienda'];
		if($antiguedad_vivienda=="inmueble_usado")
			return $rs_row['porcentaje_iajd_vivienda_usada'];
    }
}
?>