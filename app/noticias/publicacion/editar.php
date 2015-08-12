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

		$_SESSION['hayerroresmodificarnoticia'] = $hayerrores;
		$_SESSION['erroresmodificarnoticia'] = $errores;
		
		// Si no hay errores
		if(!$hayerrores)
		{
			// Datos de Noticia
			$noticia = new ModelNoticias();
			$noticia->Update($datos,$datos['id']);
			// Crear RSS
			header("Location: crear_rss.php");
		}
	}
?>
<?php Interfaz::PlantillaGenerica("noticias","editar"); ?>