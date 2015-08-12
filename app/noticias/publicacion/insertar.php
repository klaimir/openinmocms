<?php include("../../../config/config.php");?>
<?php include("modulopublicacion.php");?>
<?php include("ControlPublicacionNoticias.class.php");?>
<?php include("../../../general/funcionesauxiliares.php");?>
<?php require_once("../../../modelos/Noticias.class.php");?>
<?php $session=new Session(); $session->ComprobarRestriccionAcceso();?>
<?php
	if ($_POST) 
	{
		// Inicialización de variables de error
		$i=0; 
		unset($errores); 
		$hayerrores=false;
		
		// Validamos los datos generales de la noticia
		$datos=ControlPublicacionNoticias::Validar($i,$hayerrores,$errores);	
		
		$_SESSION['hayerroresinsertarnoticia'] = $hayerrores;
		$_SESSION['erroresinsertarnoticia'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de Noticia
			$noticia = new ModelNoticias();
			$ultimo_id=$noticia->Insert($datos);
			// Crea el fichero RSS en la ruta especificada
			ModelNoticias::GenerarFicherosRSS();
			// Volvemos a editar para añadir cualquier dato
			header("Location: editar.php?id=".$ultimo_id );
		}
	}
?>
<?php Interfaz::PlantillaGenerica("noticias","insertar"); ?>