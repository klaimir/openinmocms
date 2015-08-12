		<a name="top"></a>
		<div class="breadcrumbs_publico"><img src="<?php echo  $_SESSION['rutaimg'];?>flecha1.png" align="absmiddle" />&nbsp;<a href="<?php echo  URL_EMPRESA; ?>"><?php echo  NOMBRE_EMPRESA; ?></a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="<?php echo $_SESSION['rutaraiz']; ?>/app/acceso/index.php">Acceso</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../index.php">Inmuebles</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<a href="../editar.php?id=<?php echo  $_GET['id']; ?>">Editar</a>&nbsp;&nbsp;<img src="<?php echo  $_SESSION['rutaimg'];?>flecha2.png" align="absmiddle" />&nbsp;&nbsp;<span class="sin_enlace">Asignar cliente</span></div>
        <p align="justify" class="titulo_seccion">Inmuebles</p>	
		<?php
		if ($num_clientes!=0)
		{			
		?>
		<?php
			// Control de errores
			if ($_POST)
			{
				if($_SESSION['hayerroresasignarclientes'])
				{
		?>
					<div class="titulo_errores"><strong>Informe de errores</strong> &nbsp;| &nbsp;<?php echo  count($_SESSION['erroresasignarclientes']); ?> error(es) encontrado(s)</div>
					<div class="detalle_errores">
					<ul class="lista_errores">
		<?php
					foreach($_SESSION['erroresasignarclientes'] as $error)
					{
		?>		
						<li><?php echo  $error; ?></li>
		<?php
					}
		?>
					</ul>
					</div>
					<br />
		<?php
				}
			}
		?>               
		<form action="" name="asignar_cliente" id="asignar_cliente" method="post" enctype="application/x-www-form-urlencoded">	
			<!-- Opciones -->
			<select id="cliente" name="cliente" onchange="modificado=true" class="campo_texto">
				<option value="" <?php if ($_POST['cliente'] == "") echo "selected"; ?>>Seleccione cliente...</option>
				<?php
					do
					{
				?>
						<option value="<?php echo  $cliente['id_cliente'];?>" <?php if ($_POST) { if ($_POST['cliente'] == $cliente['id_cliente']) echo "selected"; } ?>><?php echo  $cliente['apellidos'].", ".$cliente['nombre'];?></option>
				<?php
					} while ($cliente = $clientes->FetchRow());
				?>
		    </select>
			<br />
		<p align="center">
			<!-- Botón Insertar BD -->		
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('asignar_cliente').submit();return false"><img src="<?php echo  $_SESSION['rutaimg'];?>insertar.gif" border="0" align="absmiddle" /></a>&nbsp;&nbsp;
			<a href="<?php echo obtenerURLactual();?>" onclick="document.getElementById('asignar_cliente').submit();return false">Insertar en BD</a>			
		</p>
		</form>
		<?php
		}
		else
		{		
		?>
			<p align="justify"><img src="<?php echo $_SESSION['rutaimg'];?>info.gif" align="absmiddle">&nbsp;&nbsp;Actualmente no hay clientes para ser asignados a este inmueble.</p>
		<?php
		}	
		?>
		<!--  Navegacion -->
		<p align="right">
			<a href="<?php echo  enlace_volver_general(); ?>"><img border="0" src="<?php echo  $_SESSION['rutaimg'];?>volver.gif" align="absmiddle"></a>&nbsp;&nbsp;<a href="<?php echo  enlace_volver_general(); ?>">Volver</a>
		</p>