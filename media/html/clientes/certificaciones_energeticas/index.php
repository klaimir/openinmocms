		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Clientes</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Avisos de certificación energética</span></div>
		<p align="justify" class="titulo_seccion">Clientes</p>			
		<!-- Resultados de Búsqueda -->
		<a name="listado"></a>				
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Listado de avisos de certificación energética
			</div>
			<div style="width:50%; float:right; text-align:right">
			<?php
			if($generar>0)
			{
			?>
				<a href="insertar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" /></a>&nbsp;&nbsp;<a href="insertar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>">Generar aviso de certificación energética</a>
			<?php
			}
			?>
			</div>
			<br clear="all" />
		</div>	
		<br clear="all" />
<?php
		if ($num_todos != 0)
		{			
?>
			<br /><br />
			<table style="border:1px solid #004000" width="80%" cellpadding="1" cellspacing="1" align="center">
			<tr class="cabecera_tabla">
				<td>Municipio</td>
				<td>Cliente</td>
				<td>Dirección</td>
				<td>Agente</td>
				<td>Fecha</td>
				<td>Ver</td>
				<td>Editar</td>
				<td>Borrar</td>
			</tr>
<?php
			$j = 0;
			$k = 0;
			do
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
				<td><?php echo  formatear_poblacion($todo['poblacion_vivienda']);?></td>
				<td><?php echo  $todo['nombre']." ".$todo['apellidos'];?></td>
				<td><?php echo  $todo['direccion_vivienda'];?></td>
				<td><?php echo  $todo['nif_agente'];?></td>
				<td><?php echo  cambiafecha_bd($todo['fecha']);?></td>
				<td><a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$_GET['id']."/inmueble_".$_GET['inmueble']."/certificacion_energetica.pdf";?>"><img src="<?php echo $_SESSION['rutaimg'];?>pdf.gif" title="Ver" border="0" align="absmiddle"></a></td>
				<td><a href="editar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a></td>
				<?php
				$acceso_borrar=ControlCertificacionesEnergeticas::ComprobarAccesoBorrarContrato($todo['inmueble'],$todo['cliente']);
				if($acceso_borrar>0)
				{
				?>
				<td><a href="estas_seguro.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Borrar" border="0" align="absmiddle"></a></td>
				<?php
				}
				else
				{
				?>
				<td>--</td>
				<?php
				}
				?>
				</tr>
<?php
			} while ($todo = $todos->FetchRow());
?>
			</table>
<?php
		}
		else
		{
?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrada ningún aviso de certificación energética en el sistema para el inmueble actual.</p>
<?php
		}
?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="../editar.php?id=<?php echo $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../editar.php?id=<?php echo $_GET['id']; ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>