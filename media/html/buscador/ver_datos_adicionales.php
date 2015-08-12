		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php"><?php echo  $textos['buscador']; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace"><?php echo  $textos['titulo_seccion']; ?></span></div>
		<p align="justify" class="titulo_seccion"><?php echo  $textos['titulo_seccion']; ?></p>
		<?php
		// Certificación
		if(!is_null($inmueble['certificacion_energetica']) && $inmueble['certificacion_energetica']!=0)
		{
		?>
			<img src="<?php echo  $_SESSION['rutaimg'];?>certificacion_energetica/IDAE.jpg" width="660px;" height="115px;" style="float:left; margin-left:110px;"/>
			<img src="<?php echo  $_SESSION['rutaimg'];?>certificacion_energetica/logo.jpg" width="65px;" height="115px;" style="float:left"/>
			<img src="<?php echo $_SESSION['rutaimg'];?>/certificacion_energetica/<?php echo  obtener_logo_certificacion_energetica($inmueble['certificacion_energetica']);?>" style="float:left;  margin-left:15px;" width="65px;" height="20px;" title="Tipo de certificación energética" >
			<br clear="all" />
		<?php
		}
		?>
		<p  align="justify"><?php echo  $textos['frase_campos'];?>:</p>
		<p class="titulo_seccion_datos" align="left"><?php echo  $textos['informacion_general'];?></p>	
		<span style="float:left"><strong><?php echo  $campos['tipologia']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  $inmueble['tipo'];?></span>
		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['precio_compra']; ?>:</strong></span>
		<span style="float:left; margin-left:15px;">
		<?php if($inmueble['precio_compra']==0) echo "--"; else echo number_format($inmueble['precio_compra'], 2, ',', '.'); ?> €
		</span>
		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['precio_alquiler']; ?>:</strong></span>
		<span style="float:left; margin-left:15px;"><?php if($inmueble['precio_alquiler']==0) echo "--"; else echo number_format($inmueble['precio_alquiler'], 2, ',', '.'); ?> €</span>
		<br /><br />
		<span style="float:left">
		<strong><?php echo  $campos['observaciones']; ?>:</strong>
		<?php
		if(is_null($inmueble['observaciones']))
		{
		?>
		<img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;El inmueble no contiene observaciones adicionales.
		<?php
		}
		else
		{
		?>
		&nbsp;&nbsp;<?php echo  nl2br($inmueble['observaciones']);?>
		<?php
		}
		?>
		</span>
		<br clear="all" /><br  />
		<p class="titulo_seccion_datos"><?php echo  $textos['caracteristicas'];?></p>
		<span style="float:left;"><strong><?php echo  $campos['metros']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  number_format($inmueble['metros'], 2, ',', '.'); ?></span>		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['metros_utiles']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  number_format($inmueble['metros_utiles'], 2, ',', '.'); ?></span>
		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['habitaciones']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  $inmueble['habitaciones']; ?></span>
		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['banios']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  $inmueble['banios']; ?></span>
		<br clear="all" /><br  />
		<p class="titulo_seccion_datos"><?php echo  $textos['ubicacion'];?></p>
		<span style="float:left"><strong><?php echo  $campos['provincia']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  formatear_provincia($inmueble['provincia_inmueble']);?></span>
		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['region']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  formatear_region($inmueble['region']);?></span>
		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['poblacion']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  formatear_poblacion($inmueble['poblacion_inmueble']);?></span>		
		<span style="float:left; margin-left:15px;"><strong><?php echo  $campos['zona']; ?>:</strong></span><span style="float:left; margin-left:15px;"><?php echo  formatear_zona($inmueble['zona']);?></span>
		<?php
		if($num_enlaces!=0)
		{
		?>
		<br  /><br  />
		<!-- Enlaces de publicidad -->
		<p class="titulo_seccion_datos"><?php echo  $textos['enlaces_asociados']; ?></p>
		<ul style="float:left">
		<?php
		do
		{
	?>
			<li>
				<a target="_blank" href="<?php echo  $enlace['url'];?>"><?php echo  $enlace['texto_enlace']; ?></a>
			</li>
	<?php
		} while ($enlace = $enlaces->FetchRow());
	?>		
		</ul>
		<?php
		}
		?>
		<br clear="all" /><br  />
		<?php
		if($inmueble['direccion_aprox']!="")
		{
		?>
			<!-- Google maps -->
			<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
				<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;<?php echo  $textos['google_maps']; ?></span>
				<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>pic.gif" align="absmiddle" />&nbsp;<a href="<?php echo  $_SESSION['rutaraiz'];?>librerias/GoogleMaps/streetview.php" target="_blank"><?php echo  $textos['direccion_street_view'];?></a></span>
				<br clear="all" />
			</p>
			<center>
			<?php echo $gm->GmapsKey(); ?>
			<?php echo $gm->MapHolder(); ?>
			<?php echo $gm->InitJs(); ?>
			<?php echo $gm->UnloadMap(); ?>
			</center>
		<?php
		}
		?>
		<br clear="all" /><br  />
		<!-- Listado de fotografías -->
		<a name="listado"></a>
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:40%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;<?php echo  $textos['fotografias_asociadas']; ?>
			</div>
			<div style="width:60%; float:right; text-align:right">
				<img src="<?php echo  $_SESSION['rutaimg'];?>mail.png" align="absmiddle" />&nbsp;&nbsp;<a href="solicitar_informacion.php?id=<?php echo  $_GET['id'];?>"><?php echo  $textos['solicitar_informacion']; ?></a>
				&nbsp;&nbsp;&nbsp;&nbsp;
				<img src="<?php echo  $_SESSION['rutaimg'];?>mail.png" align="absmiddle" />&nbsp;&nbsp;<a href="recomendar_amigo.php?id=<?php echo  $_GET['id'];?>"><?php echo  $textos['recomendar_amigo']; ?></a>
				&nbsp;&nbsp;
				<img width="18px;" height="18px;" src="<?php echo  $_SESSION['rutaimg'];?>ok.jpg" align="absmiddle" />
				(<?php echo  $num_recomendados; ?>)
			</div>
			<br clear="all" />
		</div>	
		<br clear="all" />
<?php
		if ($num_todos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $display_pages_fotos;
			?>
			<br /><br />
<?php
			do
			{
				$ruta_foto=$_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/fotos/".$todo['fichero'];
				// Se calcula redimensión de tamaño
				$dimensiones_foto=redimensionar_fotografia($ruta_foto,700,700);
?>
				<p align="center"><img src="<?php echo  $ruta_foto;?>" width="<?php echo  $dimensiones_foto['anchura'];?>px" height="<?php echo  $dimensiones_foto['altura'];?>px" align="center" ></p>
<?php
			} while ($todo = $todos->FetchRow());
?>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;<?php echo  $textos['no_fotografias_asociadas']; ?></p>
<?php
		}
?>
	<br  />
	<div style="float:left; width:50%">
		<!-- Listado de planos -->
		<a name="listado"></a>
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:40%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;<?php echo  $textos['planos_asociados']; ?>
			</div>
			<br clear="all" />
		</div>	
		<br clear="all" />
<?php
		if ($num_planos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $display_pages_planos;
			?>
			<br /><br />
<?php
			do
			{
?>
				<p align="center"><img width="500px;" height="340px;" src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/planos/".$plano['fichero'];?>" align="center" ></p>
<?php
			} while ($plano = $planos->FetchRow());
?>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;<?php echo  $textos['no_planos_asociados']; ?></p>
<?php
		}
?>
	</div>
	<div style="float:left; margin-left:10px; width:48%">
		<!-- Listado de videos -->
		<a name="listado"></a>
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:40%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;<?php echo  $textos['videos_asociados']; ?>
			</div>
			<br clear="all" />
		</div>	
		<br clear="all" />
<?php
		if ($num_videos != 0)
		{			
?>
			<?php
			// Datos de paginación
			echo $display_pages_videos;
			?>
			<br /><br  />
<?php
			do
			{
?>
				<?php
				if($navegador['name']=="msie")
				{
				?>
					<a href="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>"><img style="margin-top:40px;" width="300px;" height="300px;" src="<?php echo $_SESSION['rutaimg'];?>video.jpg" align="absmiddle"></a>
				<?php
				}
				else
				{
				?>
					<video width="470" height="350" controls>
						<source src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" type="video/mp4">
						<source src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" type="video/avi">
						<object data="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" width="470" height="350">
						<embed src="<?php echo  $_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/videos/".$video['fichero'];?>" width="470" height="350">
						</object> 
					</video>
				<?php
				}
				?>
<?php
			} while ($video = $videos->FetchRow());
?>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;<?php echo  $textos['no_videos_asociados']; ?></p>
<?php
		}
?>
	</div>
	<br clear="all" /><br  />
		<!--  Navegacion -->	
		<p align="right">
			<a href="index.php"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="index.php">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>