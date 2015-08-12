<?php include("../../../config/config.php");?>
<?php include("modulosubscripcion.php");?>
<?php include("ControlSubscripcionNoticias.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/CanalNoticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales del canal de noticias
		$datos=ControlSubscripcionNoticias::Validar($i,$hayerrores,$errores);	
		
		$_SESSION['hayerroresinsertarnoticia'] = $hayerrores;
		$_SESSION['erroresinsertarnoticia'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de Canal de Noticia
			$canal_noticia = new ModelCanalNoticias();
			$ultimo_id=$canal_noticia->Insert($datos);
			// Volvemos a editar para añadir cualquier dato
			header("Location: editar.php?id=".$ultimo_id );
		}
	}
?>
<?php Interfaz::PlantillaGenerica("noticias","insertar"); ?>