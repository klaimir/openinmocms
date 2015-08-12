<?php
/*
PresupuestosInmueble.class.php, v 2.4 2013/05/13

ModelPresupuestosInmueble - Clase gestionar todas las peticiones y operaciones relacionadas con los presupuestos de los inmuebles registrados

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
* ModelPresupuestosInmueble
*
* Clase gestionar todas las peticiones y operaciones relacionadas con los presupuestos de los inmuebles registrados
*
* @author   Angel Luis Berasuain Ruiz <klaimir@hotmail.com>
* @version  PresupuestosInmueble.class.php, v 2.4 2013/05/13
* @access   public
*/

class ModelPresupuestosInmueble extends Model
{
    public $id_presupuesto;
	public $inmueble;
	public $tipo_presupuesto;	
	public $iajd;
	public $importe_solicitado;
	public $comunidad_autonoma;
	public $comision_apertura_hipoteca;
	public $tasacion_hipoteca;
	public $iajd_hipoteca;
	public $notaria_hipoteca;
	public $gestoria_hipoteca;
	public $registro_hipoteca;
	public $iva_hipoteca;
	public $seguro_hipoteca;
	public $iva_nueva_vivienda;
	public $iajd_nueva_vivienda;
	public $itp;
	public $notaria;
	public $gestoria;
	public $registro;
	public $iva_gastos_comunes;
	public $provincia_vivienda;
	public $poblacion_vivienda;
	public $direccion_vivienda;		
	public $observaciones;
	public $fecha;
	public $precio_vivienda;
	
	/**
	 * Constructor
	 *
	 */
	
	function ModelPresupuestosInmueble()
    {  
		parent::Model();
		$this->id_presupuesto=NULL;
		$this->inmueble=NULL;
		$this->tipo_presupuesto=NULL;
		$this->iajd=NULL;
		$this->importe_solicitado=NULL;
		$this->comunidad_autonoma=NULL;
		$this->comision_apertura_hipoteca=NULL;
		$this->tasacion_hipoteca=NULL;
		$this->iajd_hipoteca=NULL;
		$this->notaria_hipoteca=NULL;
		$this->gestoria_hipoteca=NULL;
		$this->registro_hipoteca=NULL;
		$this->iva_hipoteca=NULL;
		$this->seguro_hipoteca=NULL;
		$this->iva_nueva_vivienda=NULL;
		$this->iajd_nueva_vivienda=NULL;
		$this->itp=NULL;
		$this->notaria=NULL;
		$this->gestoria=NULL;
		$this->registro=NULL;
		$this->iva_gastos_comunes=NULL;
		$this->provincia_vivienda=NULL;
		$this->poblacion_vivienda=NULL;
		$this->direccion_vivienda=NULL;
		$this->precio_vivienda=NULL;	
		$this->observaciones=NULL;
		$this->fecha=NULL;
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase
	 *
	 * @param [datos]		Datos de configuración
	 *
	 */
	
	function Set($datos)
    {  
		if(isset($datos['id_presupuesto'])) $this->id_presupuesto=$datos['id_presupuesto'];
		if(isset($datos['inmueble'])) $this->inmueble=$datos['inmueble'];
		if(isset($datos['tipo_presupuesto'])) $this->tipo_presupuesto=$datos['tipo_presupuesto'];		
		if(isset($datos['iajd'])) $this->iajd=$datos['iajd'];
		if(isset($datos['importe_solicitado'])) $this->importe_solicitado=$datos['importe_solicitado'];
		if(isset($datos['comunidad_autonoma'])) $this->comunidad_autonoma=$datos['comunidad_autonoma'];
		if(isset($datos['comision_apertura_hipoteca'])) $this->comision_apertura_hipoteca=$datos['comision_apertura_hipoteca'];
		if(isset($datos['tasacion_hipoteca'])) $this->tasacion_hipoteca=$datos['tasacion_hipoteca'];
		if(isset($datos['iajd_hipoteca'])) $this->iajd_hipoteca=$datos['iajd_hipoteca'];
		if(isset($datos['notaria_hipoteca'])) $this->notaria_hipoteca=$datos['notaria_hipoteca'];
		if(isset($datos['gestoria_hipoteca'])) $this->gestoria_hipoteca=$datos['gestoria_hipoteca'];
		if(isset($datos['registro_hipoteca'])) $this->registro_hipoteca=$datos['registro_hipoteca'];
		if(isset($datos['iva_hipoteca'])) $this->iva_hipoteca=$datos['iva_hipoteca'];
		if(isset($datos['seguro_hipoteca'])) $this->seguro_hipoteca=$datos['seguro_hipoteca'];
		if(isset($datos['iva_nueva_vivienda'])) $this->iva_nueva_vivienda=$datos['iva_nueva_vivienda'];
		if(isset($datos['iajd_nueva_vivienda'])) $this->iajd_nueva_vivienda=$datos['iajd_nueva_vivienda'];
		if(isset($datos['itp'])) $this->itp=$datos['itp'];
		if(isset($datos['notaria'])) $this->notaria=$datos['notaria'];
		if(isset($datos['gestoria'])) $this->gestoria=$datos['gestoria'];
		if(isset($datos['registro'])) $this->registro=$datos['registro'];
		if(isset($datos['iva_gastos_comunes'])) $this->iva_gastos_comunes=$datos['iva_gastos_comunes'];
		if(isset($datos['precio_vivienda'])) $this->precio_vivienda=$datos['precio_vivienda'];
		if(isset($datos['provincia_vivienda'])) $this->provincia_vivienda=$datos['provincia_vivienda'];
		if(isset($datos['poblacion_vivienda'])) $this->poblacion_vivienda=$datos['poblacion_vivienda'];
		if(isset($datos['direccion_vivienda'])) $this->direccion_vivienda=$datos['direccion_vivienda'];		
		if(isset($datos['observaciones'])) $this->observaciones=$datos['observaciones'];
		if(isset($datos['fecha'])) $this->fecha=$datos['fecha'];
    }
	
	/**
	 * Establecen los datos de los distintos atributos de la clase según los valores del identificador suministrado
	 *
	 * @param [id_presupuesto]		Identificador del presupuesto
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 */
	
	function SetDataObject($id_presupuesto,$inmueble)
    {  
		$sql = "SELECT * FROM presupuestos_inmueble WHERE id_presupuesto = ".$id_presupuesto." AND inmueble = ".$inmueble;
		$rs = $this->Execute($sql);
		$rs_row = $rs->FetchRow();
		$this->Set($rs_row);
    }
	
	/**
	 * Inserta un presupuesto en la base de datos
	 *
	 * @param [importe_solicitado]		Importe solicitado para hipoteca
	 * @param [precio_vivienda]			Precio del inmueble
	 * @param [iajd]					Impuesto sobre actos jurídicos documentados
	 * @param [tipo_presupuesto]		Tipo de presupuesto a calcular: inmueble_usado o nuevo_inmueble
	 * @param [comunidad_autonoma]		Identificador de la comunidad autónoma
	 *
	 * @return Devuelve el presupuesto con los porcentajes aplicados
	 */
	 
	function CalcularValores($importe_solicitado,$precio_vivienda,$iajd,$tipo_presupuesto,$comunidad_autonoma)
    {
		require_once(PATHINCLUDE_FRAMEWORK_MODELOS.'PresupuestosComunidadesAutonomas.class.php');
		// Datos del presupuesto de una comunidad
		$presupuesto_comunidad = new ModelPresupuestosComunidadesAutonomas();
		$presupuesto_comunidad->SetDataObject($comunidad_autonoma);
		// Aplicación de porcentajes
		// Gastos de hipoteca
		$datos['comision_apertura_hipoteca']=($importe_solicitado*$presupuesto_comunidad->porcentaje_comision_apertura_hipoteca)/100;
		$datos['tasacion_hipoteca']=$presupuesto_comunidad->valor_tasacion_hipoteca;
		$datos['iajd_hipoteca']=($importe_solicitado*$iajd)/100;
		$datos['notaria_hipoteca']=($importe_solicitado*$presupuesto_comunidad->porcentaje_notaria_hipoteca)/100;
		$datos['gestoria_hipoteca']=($importe_solicitado*$presupuesto_comunidad->porcentaje_gestoria_hipoteca)/100;
		$datos['registro_hipoteca']=($importe_solicitado*$presupuesto_comunidad->porcentaje_registro_hipoteca)/100;
		$datos['iva_hipoteca']=(($datos['notaria_hipoteca']+$datos['gestoria_hipoteca']+$datos['registro_hipoteca'])*$presupuesto_comunidad->porcentaje_iva_hipoteca)/100;
		$datos['seguro_hipoteca']=$presupuesto_comunidad->valor_seguro_hipoteca;
		// totales
		$datos['total_gastos_hipoteca']=$datos['comision_apertura_hipoteca']+$datos['tasacion_hipoteca']+$datos['iajd_hipoteca']+$datos['notaria_hipoteca']+$datos['gestoria_hipoteca']+$datos['registro_hipoteca']+$datos['iva_hipoteca']+$datos['seguro_hipoteca'];
		// Gastos de compra
		if($tipo_presupuesto=='nuevo_inmueble')
		{
			$datos['iva_nueva_vivienda']=($precio_vivienda*$presupuesto_comunidad->porcentaje_iva_nueva_vivienda)/100;
			$datos['iajd_nueva_vivienda']=($precio_vivienda*$iajd)/100;
			$datos['itp']=0;
			$gasto_compra_inmueble=$datos['iva_nueva_vivienda']+$datos['iajd_nueva_vivienda'];
		}
		if($tipo_presupuesto=='inmueble_usado')
		{
			$datos['iva_nueva_vivienda']=0;
			$datos['iajd_nueva_vivienda']=0;
			$datos['itp']=($precio_vivienda*$presupuesto_comunidad->porcentaje_itp)/100;
			$gasto_compra_inmueble=$datos['itp'];
		}
		$datos['notaria']=($importe_solicitado*$presupuesto_comunidad->porcentaje_notaria)/100;
		$datos['gestoria']=($importe_solicitado*$presupuesto_comunidad->porcentaje_gestoria)/100;
		$datos['registro']=($importe_solicitado*$presupuesto_comunidad->porcentaje_registro)/100;
		$datos['iva_gastos_comunes']=(($datos['notaria']+$datos['gestoria']+$datos['registro'])*$presupuesto_comunidad->porcentaje_iva_hipoteca)/100;
		// totales
		$datos['total_gastos_compra']=$datos['notaria']+$datos['gestoria']+$datos['registro']+$datos['iva_gastos_comunes']+$gasto_compra_inmueble;
		// total de gastos
		$datos['total_gastos']=$datos['total_gastos_hipoteca']+$datos['total_gastos_compra'];
		// Devolvemos el presupuesto calculado
		return $datos;	
    }
	
	/**
	 * Inserta un presupuesto en la base de datos
	 *
	 * @param [datos]		Datos a insertar
	 *
	 * @return El último identificador calculado
	 */
	 
	function Insert($datos)
    {
		// Se calculan los valores del presupuesto
		$valores_presupuesto=$this->CalcularValores($datos['importe_solicitado'],$datos['precio_vivienda'],$datos['iajd'],$datos['tipo_presupuesto'],$datos['comunidad_autonoma']);
		$result = array_merge($datos, $valores_presupuesto);
		// Se obtiene el último id insertado
		$sql_atribs = "SELECT max(id_presupuesto) as ultimo_id FROM presupuestos_inmueble WHERE inmueble=".$result['inmueble'];
		$atribs = $this->Execute($sql_atribs) or die($this->ErrorMsg());
		$num_atribs = $atribs->RecordCount();
		$atrib = $atribs->FetchRow();
		// Asignación de identificador
		if(is_null($atrib['ultimo_id']))
		{
			$id_presupuesto=1;
		}
		else
		{
			$id_presupuesto = $atrib['ultimo_id']+1;
		}
		$result['id_presupuesto']=$id_presupuesto;
		// Insertamos los valores con el identificador calculado
		$this->InsertBD($result);
		// Devolvemos el identificador
		return $id_presupuesto;	
    }
	
	/**
	 * Inserta un presupuesto en la base de datos
	 *
	 * @param [datos]		Array con los diferentes valores a insertar
	 *
	 * @return Devuelve true o false
	 */
	 
	function InsertBD($datos)
    {  
		$sql = "SELECT * FROM presupuestos_inmueble WHERE id_presupuesto = -1";
		$rs = $this->Execute($sql);
		$insertSQL = $this->GetInsertSQL($rs,$datos);
		return $this->Execute($insertSQL) or die($this->ErrorMsg());
    }
	
	/**
	 * Realiza el proceso de actualización de una presupuesto
	 *
	 * @param [datos]				Array con los diferentes valores a editar
	 * @param [id_presupuesto]		Indentificador de la presupuesto
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Update($datos,$id_presupuesto,$inmueble)
    {
		$sql = "SELECT * FROM presupuestos_inmueble WHERE id_presupuesto = ".$id_presupuesto." AND inmueble = ".$inmueble;
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
	 * Elimina una presupuesto de un inmueble de la base de datos
	 *
	 * @param [id_presupuesto]		Indentificador de la presupuesto
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve true o false
	 */
	 
	function Delete($id_presupuesto, $inmueble)
    {  
		// Finalmente borrado
		$sql = sprintf("DELETE FROM presupuestos_inmueble WHERE id_presupuesto=%s AND inmueble=%s",
							GetSQLValueString($id_presupuesto, "int"),
							GetSQLValueString($inmueble, "int"));
		$this->Execute($sql) or die($this->ErrorMsg());
		// Borramos fichero asociado
		if(file_exists(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/presupuestos/presupuesto_".$id_presupuesto.".pdf"))
		{
			unlink(PATHINCLUDE_FRAMEWORK_DOC. "inmuebles/inmueble_".$inmueble."/presupuestos/presupuesto_".$id_presupuesto.".pdf");
		}
    }
	
	/**
	 * Obtiene todos los presupuestos realizados de un determinado inmueble
	 *
	 * @param [inmueble]			Indentificador del inmueble
	 *
	 * @return Devuelve un objeto con todas presupuestos encontrados
	 *
	 */
	
	function ObtenerPresupuestosInmueble($inmueble)
    {  
		$sql = "SELECT * FROM presupuestos_inmueble WHERE inmueble = ".$inmueble;		
		$rs = $this->Execute($sql);
		return $rs;
    }
}
?>