		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Clientes</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Fichas de encargo</span></div>
		<p align="justify" class="titulo_seccion">Clientes</p>			
		<!-- Resultados de B�squeda -->
		<a name="listado"></a>				
		<div style="width:100%; padding-bottom:2px; border-bottom:1px solid #666666; color:#003366">
			<div style="width:30%; float:left; text-align:left">
				<img src="<?php echo  $_SESSION['rutaimg'];?>oficina.gif" align="absmiddle" />&nbsp;Listado de fichas de encargo
			</div>
			<div style="width:50%; float:right; text-align:right">
				<a href="insertar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>"><img src="<?php echo  $_SESSION['rutaimg'];?>pdf.gif" align="absmiddle" /></a>&nbsp;&nbsp;<a href="insertar.php?id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>">Generar ficha de encargo</a>
			</div>
			<br clear="all" />
		</div>	
		<br clear="all" />
<?php
		if ($num_todos != 0)
		{			
?>
			<br /><br />
			<table style="border:1px solid #004000" width="100%" cellpadding="1" cellspacing="1" align="center">
			<tr class="cabecera_tabla">
				<td>Id.</td>
				<td>Municipio</td>
				<td>Nombre</td>
				<td>Precio</td>
				<td>Metros</td>
				<td>Direcci�n</td>
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
				<td><?php echo  $todo['id_ficha_encargo'];?></td>
				<td><?php echo  formatear_poblacion($todo['poblacion']);?></td>
				<td><?php echo  $todo['nombre']." ".$todo['apellidos'];?></td>
				<td><?php echo  number_format($todo['precio'], 2, ',', '.'); ?> �</td>
				<td><?php echo  number_format($todo['metros'], 2, ',', '.'); ?></td>
				<td><?php echo  $todo['domicilio'];?></td>
				<td><?php echo  $todo['nif_agente'];?></td>
				<td><?php echo  cambiafecha_bd($todo['fecha']);?></td>
				<td><a target="_blank" href="<?php echo  $_SESSION['rutadocs']."clientes/cliente_".$_GET['id']."/inmueble_".$_GET['inmueble']."/ficha_encargo_".$todo['id_ficha_encargo'].".pdf";?>"><img src="<?php echo $_SESSION['rutaimg'];?>pdf.gif" title="Ver" border="0" align="absmiddle"></a></td>
				<td><a href="editar.php?id_ficha_encargo=<?php echo  $todo['id_ficha_encargo'];?>&id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>editar.gif" title="Editar" border="0" align="absmiddle"></a></td>
				<?php
				$acceso_borrar=ControlFichasEncargoClientes::ComprobarAccesoBorrar($todo['id_ficha_encargo'],$_GET['inmueble'],$_GET['id']);
				if($acceso_borrar>0)
				{
				?>
				<td><a href="estas_seguro.php?id_ficha_encargo=<?php echo  $todo['id_ficha_encargo'];?>&id=<?php echo  $_GET['id'];?>&inmueble=<?php echo  $_GET['inmueble'];?>"><img src="<?php echo $_SESSION['rutaimg'];?>borrar.gif" title="Asignar" border="0" align="absmiddle"></a></td>
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
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay registrada ninguna ficha de encargo en el sistema para el inmueble actual.</p>
<?php
		}
?>
		<!--  Navegacion -->	
		<p align="right">
			<a href="../editar.php?id=<?php echo $_GET['id']; ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="../editar.php?id=<?php echo $_GET['id']; ?>">Volver</a>
			&nbsp;&nbsp;&nbsp;
			<a href="#top" title="Subir"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>subir.png"></a>&nbsp;&nbsp;<a href="#top" title="Subir">Subir</a>
		</p>