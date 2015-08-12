		<a name="top"></a>
		<div class="breadcrumbs_publico">
		<img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="index.php">Inmuebles</a>
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>		
		&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Recomendaciones amigos/as</span>
		</div>
		<p align="justify" class="titulo_seccion">Inmuebles</p>			
		<!-- Resultados de Búsqueda -->	
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Recomendaciones amigos/as
			</div>
			<br  />
		</div>	
		<br clear="all" />
<?php
		if ($num_recomendaciones != 0)
		{			
?>
			<br />
			<table style="border:1px solid #004000" width="80%" cellpadding="1" cellspacing="1" align="center">
			<tr class="titulo_tabla"><td colspan="4">RECOMENDACIONES AMIGO/AS</td></tr>
			<tr class="cabecera_tabla">
				<td>Fecha</td>
				<td>Correo</td>
				<td>Correo amigo/a</td>
				<td>Mensaje</td>
			</tr>
<?php
			$j = 0;
			$k = 0;
			foreach($recomendaciones as $recomendacion)
			{
				if($j==0)
				{
					$color='datos_tabla_impar'; $j=1;
				}
				else
				{
					$color='datos_tabla_par"'; $j=0;
				}
?>
				<tr class="<?php echo  $color; ?>">	
				<td><?php echo  cambiafecha_bd($recomendacion['fecha']);?></td>
				<td><?php echo  $recomendacion['correo'];?></td>
				<td><?php echo  $recomendacion['correo_amigo'];?></td>
				<td><?php echo  nl2br($recomendacion['mensaje']);?></td>
				</tr>
<?php
			}
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrada ninguna recomendación para el inmueble seleccionado.</p>
<?php
		}
?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="editar.php?id=<?php echo  $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="editar.php?id=<?php echo  $_GET['id']; ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>