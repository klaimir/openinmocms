		<?php include('form/datos_cartel.php'); ?>
		<br clear="all" /><br  />
		<?php include('form/datos_vivienda.php'); ?>
		<br clear="all"  /><br  />
		<!-- Fotografías asociadas -->
		<a name="listado"></a>
		<p align="justify" style="padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<span style="float:left"><img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Fotografías asociadas</span>
			<?php
			if($row_consulta['estado']=="activo")
			{
			?>
			<span style="float:right"><img src="<?php echo  $_SESSION['rutaimg'];?>nueva_noticia.gif" align="absmiddle" /><a href="fotos/insertar.php?id=<?php echo  $_GET['id'];?>">Insertar fotografía</a></span>
			<?php
			}
			?>
			<br clear="all" />
		</p>
<?php
		if ($num_todos != 0)
		{
			do
			{
				// Ruta foto
				$ruta_foto=$_SESSION['rutadocs']."/inmuebles/inmueble_".$_GET['id']."/fotos/".$todo['fichero'];
				// Se calcula redimensión de tamaño
				$dimensiones_foto=redimensionar_fotografia($ruta_foto,230,230);
				// Nombre del check
				$nombre_check="foto_".$todo['id_fichero'];
?>
				<span style="margin-left:10px; float:left">
				<p align="center">
				<input name="<?php echo  $nombre_check; ?>" value="1" type="checkbox" <?php if ($_POST[$nombre_check]) echo "checked"; else { if(isset($_GET['id_cartel'])) if($cartel->FotografiaEstaAsociada($_GET['id_cartel'],$todo['id_fichero'],$_GET['id'])) echo "checked"; } ?>>
				</p>
				<img src="<?php echo  $ruta_foto;?>" width="<?php echo  $dimensiones_foto['anchura'];?>px" height="<?php echo  $dimensiones_foto['altura'];?>px" align="center" >
				</span>
<?php
			} while ($todo = $todos->FetchRow());
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrada ninguna fotografía asociada al inmueble.</p>
<?php
		}
?>		
		<?php include('form/hidden.php'); ?>	